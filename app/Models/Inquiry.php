<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Inquiry extends Model
{
    protected $table = 'inquirys';

    protected $fillable = ['created_by','to','description',];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
    public function addInquiry($to, $description): self
    {
        $this->to = $to;
        $this->description = $description;
        $this->save();
        return $this;
    }
    public function createdByUser()
    {
        return $this->belongsTo(SchoolDetail::class, 'created_by');
    }
}

