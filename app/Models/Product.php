<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'supplier_name',
        'description',
        'category_id',
        'subcategory_id',

    ];

    public function products()
    {
        return $this->belongsTo(Classes::class, 'products_id');
    }

    public function AddProductDetail(array $addproduct)
    {
        try {
            return $this->create([
                'name'      => $addproduct['name'],
                'supplier_name'          => $addproduct['supplier_name'],
                'description'       => $addproduct['description'],
                'category_id'       => $addproduct['category_id'],
                'subcategory_id'       => $addproduct['subcategory_id'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[Product][AddProductDetail] Error creating supplier detail: ' . $e->getMessage());
        }
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
