<?php

namespace App\Contracts\Interfaces;

use App\Models\Transaction;

interface TransactionInterface
{
    /**
     * Create a new transaction.
     */
    public function create(array $data): Transaction;

    /**
     * Find transaction by order ID.
     */
    public function findByOrderId(string $orderId): ?Transaction;

    /**
     * Update transaction status.
     */
    public function updateStatus(string $orderId, string $status, ?string $paymentType = null, ?array $paymentResponse = null): bool;

    /**
     * Get transaction by user and course.
     */
    public function getByUserAndCourse(string $userId, string $courseId): ?Transaction;

    /**
     * Get pending transaction by user and course.
     */
    public function getPendingByUserAndCourse(string $userId, string $courseId): ?Transaction;
}
