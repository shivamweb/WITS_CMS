<?php

namespace App\Models;

use App\Enums\BookStatusEnum;
use App\Enums\BookStockStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;

class BookDetail extends Model
{
    protected $fillable = [
        'image',
        'book_name',
        'status',
        'stock_status',
        'price',
        'class_id',
        'description',
        'part',
        'publisher',
        'quantity'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function AddBookDetail(array $addbook, $imagePath)
    {
        try {
            return $this->create([
                'uuid'           => Uuid::uuid4()->toString(),
                'image'          => $imagePath,
                'book_name'      => $addbook['book_name'],
                'status'         => BookStatusEnum::Available,
                'stock_status'   => BookStockStatusEnum::INSTOCK,
                'price'          => $addbook['price'],
                'class_id'       => $addbook['class_id'],
                'description'    => $addbook['description'],
                'part'           => $addbook['part'],
                'publisher'      => $addbook['publisher'],
                'quantity'       => $addbook['quantity'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[BookDetail][AddBookDetail] Error creating book detail: ' . $e->getMessage());
        }
    }
    public function book()
    {
        return $this->belongsTo(BookDetail::class);
    }
}
