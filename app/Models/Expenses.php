<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;

class Expenses extends Model
{
    protected $fillable = [
        'book_cost',
        'travelling_cost',
        'labour_cost',
        'warehouse_cost',

    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function expenseData(array $addexpense)
    {
        try {
            return $this->create([
                'book_cost'       => $addexpense['book_cost'],
                'travelling_cost' => $addexpense['travelling_cost'],
                'labour_cost'     => $addexpense['labour_cost'],
                'warehouse_cost'  => $addexpense['warehouse_cost'],

            ]);
        } catch (\Throwable $e) {
            Log::error('[BookDetail][AddBookDetail] Error creating book detail: ' . $e->getMessage());
        }
    }
}
