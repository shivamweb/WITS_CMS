<?php

namespace App\Enums;

class OrderStatusEnum
{
    public const DELIVERED = 'delivered';
    public const APPROVED = 'approved';
    public const SHIPPED = 'shipped';
    public const PROCESSING = 'processing';
    public const CANCELLED = 'cancelled';
    public const PENDING = 'pending';
}
