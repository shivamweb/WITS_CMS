<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\SchoolLoginController;
use App\Http\Controllers\AdminDetailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/admin-signin', [AdminDetailController::class, 'Adminsignin'])->name('Admin-signin');
Route::get('/', [AdminDetailController::class, 'showAdminLoginForm']);
