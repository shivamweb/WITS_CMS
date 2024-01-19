<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id','book_id','quantity','price','subtotal'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function orderProduct()
    {
        return $this->belongsTo(BookDetail::class, 'book_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
   
}
