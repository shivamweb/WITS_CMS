<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class AgreementDocument extends Model
{
    protected $fillable = [
        'school_doc_image','school_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function school()
    {
        return $this->belongsTo(SchoolDetail::class, 'school_id');
    }

}
