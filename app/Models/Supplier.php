<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact_number',
        'address',
    ];

    public function supplier()
    {
        return $this->belongsTo(Classes::class, 'supplier_id');
    }

    public function AddSupplierDetail(array $addsupplier)
    {
        try {
            return $this->create([
                'name'      => $addsupplier['name'],
                'contact_number'          => $addsupplier['contact_number'],
                'address'       => $addsupplier['address'],
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
