<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
class AdminDetail extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'image',
        'user_type',
        'firstname',
        'lastname',
        'email',
        'password',
        
    ];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function completeAdminProfile(array $adminProfileData, $imagePath, $uuid)
    {
        try {
            $profileUpdated = $this->where('uuid', $uuid)->update([
                "image"          => $imagePath,
                "firstname"      => $adminProfileData['firstname'],
                "email"          => $adminProfileData['email'],
                "lastname"       => $adminProfileData['lastname'],
                "mobile_number"  => $adminProfileData['mobile_number'],
                

            ]);
        } catch (\Throwable $e) {
            Log::error('[AdminDetail][completeAdminProfile] Error creating user: '  .  ', Exception=' . $e->getMessage());
        }
    }

}
