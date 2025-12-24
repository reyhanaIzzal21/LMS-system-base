<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Models\Transaction;
use App\Contracts\Interfaces\TransactionInterface;
use App\Contracts\Interfaces\EnrolledCourseInterface;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Exception;
use Illuminate\Support\Facades\Log;

class MidtransService
{
    protected TransactionInterface $transactionRepository;
    protected EnrolledCourseInterface $enrolledCourseRepository;

    public function __construct(
        TransactionInterface $transactionRepository,
        EnrolledCourseInterface $enrolledCourseRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->enrolledCourseRepository = $enrolledCourseRepository;

        // Configure Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Get the effective price for a course (promotional or regular).
     */
    public function getEffectivePrice(Course $course): int
    {
        if ($course->promotional_price && $course->promotional_price < $course->price) {
            return (int) $course->promotional_price;
        }

        return (int) $course->price;
    }

    /**
     * Create a Midtrans Snap token for a transaction.
     */
    public function createSnapToken(Transaction $transaction, User $user, Course $course): string
    {
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => $course->id,
                    'price' => $transaction->amount,
                    'quantity' => 1,
                    'name' => substr($course->title, 0, 50), // Midtrans has 50 char limit
                ],
            ],
            'callbacks' => [
                'finish' => route('payment.finish'),
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Update transaction with snap token
            $transaction->update(['snap_token' => $snapToken]);

            return $snapToken;
        } catch (Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
            throw new Exception('Gagal membuat token pembayaran. Silakan coba lagi.');
        }
    }

    /**
     * Handle notification from Midtrans.
     */
    public function handleNotification(array $payload): array
    {
        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;
        $fraudStatus = $payload['fraud_status'] ?? null;
        $paymentType = $payload['payment_type'] ?? null;

        if (!$orderId) {
            throw new Exception('Order ID not found in notification');
        }

        // Verify signature
        if (!$this->verifySignature($payload)) {
            throw new Exception('Invalid signature');
        }

        $transaction = $this->transactionRepository->findByOrderId($orderId);

        if (!$transaction) {
            throw new Exception('Transaction not found');
        }

        // Determine status based on Midtrans response
        $status = $this->mapTransactionStatus($transactionStatus, $fraudStatus);

        // Update transaction
        $this->transactionRepository->updateStatus(
            $orderId,
            $status,
            $paymentType,
            $payload
        );

        // If successful, create enrollment
        if ($status === 'success') {
            $this->createEnrollment($transaction);
        }

        Log::info('Midtrans Notification Processed', [
            'order_id' => $orderId,
            'status' => $status,
            'payment_type' => $paymentType,
        ]);

        return [
            'success' => true,
            'status' => $status,
            'order_id' => $orderId,
        ];
    }

    /**
     * Verify Midtrans signature.
     */
    protected function verifySignature(array $payload): bool
    {
        $orderId = $payload['order_id'] ?? '';
        $statusCode = $payload['status_code'] ?? '';
        $grossAmount = $payload['gross_amount'] ?? '';
        $signatureKey = $payload['signature_key'] ?? '';
        $serverKey = config('midtrans.server_key');

        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        return $signatureKey === $expectedSignature;
    }

    /**
     * Map Midtrans transaction status to our status.
     */
    protected function mapTransactionStatus(string $transactionStatus, ?string $fraudStatus): string
    {
        if ($transactionStatus === 'capture') {
            if ($fraudStatus === 'accept') {
                return 'success';
            } elseif ($fraudStatus === 'challenge') {
                return 'pending';
            } else {
                return 'failed';
            }
        } elseif ($transactionStatus === 'settlement') {
            return 'success';
        } elseif ($transactionStatus === 'pending') {
            return 'pending';
        } elseif ($transactionStatus === 'deny') {
            return 'failed';
        } elseif ($transactionStatus === 'expire') {
            return 'expired';
        } elseif ($transactionStatus === 'cancel') {
            return 'cancelled';
        }

        return 'pending';
    }

    /**
     * Create enrollment after successful payment.
     */
    protected function createEnrollment(Transaction $transaction): void
    {
        // Check if already enrolled
        $existingEnrollment = $this->enrolledCourseRepository->getEnrollment(
            $transaction->user_id,
            $transaction->course_id
        );

        if (!$existingEnrollment) {
            $this->enrolledCourseRepository->createEnrollment(
                $transaction->user_id,
                $transaction->course_id
            );

            Log::info('Enrollment created after payment', [
                'user_id' => $transaction->user_id,
                'course_id' => $transaction->course_id,
                'order_id' => $transaction->order_id,
            ]);
        }
    }

    /**
     * Generate unique order ID.
     */
    public function generateOrderId(string $userId, string $courseId): string
    {
        return 'LMS-' . substr($userId, 0, 8) . '-' . substr($courseId, 0, 8) . '-' . time();
    }

    /**
     * Get client key for frontend.
     */
    public function getClientKey(): string
    {
        return config('midtrans.client_key');
    }
}
