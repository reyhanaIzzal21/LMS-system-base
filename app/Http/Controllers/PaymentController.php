<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use App\Services\MidtransService;
use App\Contracts\Interfaces\TransactionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    protected MidtransService $midtransService;
    protected TransactionInterface $transactionRepository;

    public function __construct(
        MidtransService $midtransService,
        TransactionInterface $transactionRepository
    ) {
        $this->midtransService = $midtransService;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Initiate checkout for a premium course.
     */
    public function checkout(Request $request, string $slug)
    {
        $user = Auth::user();
        $course = Course::where('slug', $slug)
            ->where('is_ready', true)
            ->where('is_premium', true)
            ->firstOrFail();

        // Check if already enrolled
        if ($user->isEnrolledIn($course->id)) {
            return redirect()->route('learn.index', $course->slug)
                ->with('success', 'Anda sudah terdaftar di kursus ini.');
        }

        // Check for existing pending transaction with snap token
        $existingTransaction = $this->transactionRepository->getPendingByUserAndCourse(
            $user->id,
            $course->id
        );

        if ($existingTransaction && $existingTransaction->snap_token) {
            // Reuse existing snap token
            return view('user.pages.payment.checkout', [
                'course' => $course,
                'transaction' => $existingTransaction,
                'snapToken' => $existingTransaction->snap_token,
                'clientKey' => $this->midtransService->getClientKey(),
            ]);
        }

        // Create new transaction
        $amount = $this->midtransService->getEffectivePrice($course);
        $orderId = $this->midtransService->generateOrderId($user->id, $course->id);

        try {
            $transaction = $this->transactionRepository->create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'order_id' => $orderId,
                'amount' => $amount,
                'status' => 'pending',
            ]);

            // Create Snap token
            $snapToken = $this->midtransService->createSnapToken($transaction, $user, $course);

            return view('user.pages.payment.checkout', [
                'course' => $course,
                'transaction' => $transaction,
                'snapToken' => $snapToken,
                'clientKey' => $this->midtransService->getClientKey(),
            ]);
        } catch (Exception $e) {
            Log::error('Payment checkout error: ' . $e->getMessage());

            return redirect()->route('courses.detail', $course->slug)
                ->with('error', 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
        }
    }

    /**
     * Handle Midtrans notification webhook.
     */
    public function notification(Request $request)
    {
        try {
            $payload = $request->all();

            Log::info('Midtrans Notification Received', $payload);

            $result = $this->midtransService->handleNotification($payload);

            return response()->json(['status' => 'ok', 'message' => 'Notification processed']);
        } catch (Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Handle payment finish redirect.
     */
    public function finish(Request $request)
    {
        $orderId = $request->get('order_id');
        $statusCode = $request->get('status_code');
        $transactionStatus = $request->get('transaction_status');

        if (!$orderId) {
            return redirect()->route('courses')
                ->with('error', 'Order tidak ditemukan.');
        }

        $transaction = $this->transactionRepository->findByOrderId($orderId);

        if (!$transaction) {
            return redirect()->route('courses')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        $course = $transaction->course;

        return view('user.pages.payment.finish', [
            'transaction' => $transaction,
            'course' => $course,
        ]);
    }
}
