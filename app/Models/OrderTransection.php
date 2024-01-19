<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class OrderTransection extends Model
{
    protected $fillable = [
        'order_id','transection_id','amount'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
