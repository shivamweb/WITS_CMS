<?php

namespace App\Http\Middleware;

use App\Enums\UserGroupEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('uuid') || !session()->has('user_type')) {
            session()->forget('uuid');
            session()->forget('user_type');
            return redirect('/')->with('status', 'error')->with('message', 'Session expired. Please log in again.');
        }

        $uuid = session('uuid');
        $userType = session('user_type');

        $allowedUserTypeAdmin = [UserGroupEnum::ADMIN];
        $allowedUserTypeSchool = [UserGroupEnum::SCHOOL];

        // Check if the user is attempting to access an admin route and if their user type is not allowed
        if ($request->is('admin/*') && !in_array($userType, $allowedUserTypeAdmin)) {
            Session::flush();
            return redirect('/admin-login')->with('status', 'error')->with('message', 'Access denied.');
        } elseif ($request->is('school/*') && !in_array($userType, $allowedUserTypeSchool)) {
            Session::flush();
            return redirect('/school-login')->with('status', 'error')->with('message', 'Access denied.');
        }

        return $next($request);
    }
}
