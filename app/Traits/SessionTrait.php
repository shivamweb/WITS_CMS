<?php

namespace App\Traits;

use App\Models\AdminDetail;
use App\Models\SchoolDetail;
use Illuminate\Support\Facades\Session;

trait SessionTrait
{
  
    public function storeAdminSession(AdminDetail $adminDetails)
    {
        // Set cookies for user data
        session(['uuid' => $adminDetails->uuid]);
        
    }
    public function getAdminSession()
    {
        $uuid = Session::get('uuid');
    
        
        return 
        ['uuid' => $uuid ,
        ];
        
    }
    public function storeSchoolSession(SchoolDetail $schooldetail)
    {
        session(['uuid' => $schooldetail->uuid]);
        session(['user_type' => $schooldetail->user_type]);
    }

    public function getSchoolSession()
    {
        $uuid = Session::get('uuid');
        $userType=Session::get('user_type');
       
        return [
            'uuid' => $uuid,
            'user_type' => $userType,
        
        ];
    }
  
}
