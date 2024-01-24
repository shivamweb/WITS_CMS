<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Classes extends Model
{
    protected $fillable = [
        'size',
    ];

    public function AddSizeDetail(array $addsize)
    {
        try {
            return $this->create([
                'size'      => $addsize['name'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[SupplierDetail][AddSupplierDetail] Error creating supplier detail: ' . $e->getMessage());
        }
    }
    public function product()
    {
        return $this->belongsTo(Supplier::class);
    }
}
