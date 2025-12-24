<?php

namespace App\Contracts\Repositories;

use App\Models\Transaction;
use App\Contracts\Interfaces\TransactionInterface;

class TransactionRepository implements TransactionInterface
{
    /**
     * Create a new transaction.
     */
    public function create(array $data): Transaction
    {
        return Transaction::create($data);
    }

    /**
     * Find transaction by order ID.
     */
    public function findByOrderId(string $orderId): ?Transaction
    {
        return Transaction::where('order_id', $orderId)->first();
    }

    /**
     * Update transaction status.
     */
    public function updateStatus(string $orderId, string $status, ?string $paymentType = null, ?array $paymentResponse = null): bool
    {
        $transaction = $this->findByOrderId($orderId);

        if (!$transaction) {
            return false;
        }

        $data = ['status' => $status];

        if ($paymentType) {
            $data['payment_type'] = $paymentType;
        }

        if ($paymentResponse) {
            $data['payment_response'] = $paymentResponse;
        }

        if ($status === 'success') {
            $data['paid_at'] = now();
        }

        return $transaction->update($data);
    }

    /**
     * Get transaction by user and course.
     */
    public function getByUserAndCourse(string $userId, string $courseId): ?Transaction
    {
        return Transaction::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->latest()
            ->first();
    }

    /**
     * Get pending transaction by user and course.
     */
    public function getPendingByUserAndCourse(string $userId, string $courseId): ?Transaction
    {
        return Transaction::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('status', 'pending')
            ->whereNotNull('snap_token')
            ->latest()
            ->first();
    }
}
