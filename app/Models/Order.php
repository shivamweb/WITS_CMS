<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'school_id', 'payment_status', 'payment_method', 'order_status', 'total_Amount', 'remaining_Amount'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function school()
    {
        return $this->belongsTo(SchoolDetail::class, 'school_id');
    }

    public function orderTransections()
    {
        return $this->hasMany(OrderTransection::class);
    }
    
}
