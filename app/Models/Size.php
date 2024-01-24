<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
    ];


    // public function product()
    // {
    //     return $this->belongsTo(Supplier::class);
    // }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function addNewSize(array $addsize)
    {
        try {
            return $this->create([
                'size'      => $addsize['size'],
                
            ]);
        } catch (\Throwable $e) {
            Log::error('[SizeDetail][addNewSize] Error creating size detail: ' . $e->getMessage());
        }
    }
    public function product()
    {
        return $this->belongsTo(Size::class);
    }
}
