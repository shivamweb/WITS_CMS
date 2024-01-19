<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSchool extends Model
{
    protected $fillable = [
        'book_id','school_id'
    ];

    public function book()
    {
        return $this->belongsTo(BookDetail::class, 'book_id');
    }

}
