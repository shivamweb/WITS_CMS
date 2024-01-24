<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'state',
        'address',
        'pin_code',
        'city',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addNewUserDetails(array $adduser)
    {
    
        try {
            return $this->create([
                'name'      => $adduser['name'],
                'email'      => $adduser['email'],
                'mobile_number'      => $adduser['mobile_number'],
                'state'      => $adduser['state'],
                'address'      => $adduser['address'],
                'pin_code'      => $adduser['pin_code'],
                'city'      => $adduser['city'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[UserDetail][addNewUser] Error creating user detail: ' . $e->getMessage());
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
    
}
