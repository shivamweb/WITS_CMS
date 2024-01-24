<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'supplier_name',
        'description',
        'category_id',
        'subcategory_id',

    ];

    public function supplier()
    {
        return $this->belongsTo(Classes::class, 'product_id');
    }

    public function AddProductDetail(array $addproduct)
    {
        try {
            return $this->create([
                'name'      => $addproduct['name'],
                'supplier_name'          => $addproduct['supplier_name'],
                'description'       => $addproduct['description'],
                'category_id'       => $addproduct['category_id'],
                'category_id'       => $addproduct['category_id'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[ProductDetails][AddProductDetail] Error creating supplier detail: ' . $e->getMessage());
        }
    }
    public function product()
    {
        return $this->belongsTo(ProductDetails::class);
    }
}
