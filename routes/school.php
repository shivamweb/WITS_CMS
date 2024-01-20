<?php

use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\SchoolLoginController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'school'], function () {
    Route::get('/dashboard', function () {
        return view('school.dashboard');
    });
    Route::get('/school-logout', [SchoolDetailController::class,'Schoollogout'])->name('school-logout');

    Route::get('/profile', [SchoolDetailController::class, 'showProfile']);
    Route::post('/storeSchoolProfile', [SchoolDetailController::class, 'storeSchoolProfile'])->name('storeSchoolProfile');
    Route::post('/storeSchoolFaculityDetail', [SchoolDetailController::class, 'storeSchoolFaculityDetail'])->name('storeSchoolFaculityDetail');
    
   Route::get('/place-neworder', [BookDetailController::class, 'fetchBookDetail'])->name('fetchBookDetail');
    Route::get('view-book-detail/{uuid}', [BookDetailController::class, 'viewBookDetails'])->name('BookDetail');
   Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/get-cart-products', [CartController::class, 'getCartProducts'])->name('getCartProducts');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'orderListToSchool']);
    Route::get('/invoice/{orderId}', [OrderController::class, 'viewInvoiceToSchool']);

    Route::get('/fetchSchoolDetails', [SchoolDetailController::class, 'fetchSchoolDetails'])->name('fetchSchoolDetails');
    Route::post('/storeTransaction', [OrderController::class, 'storeTransaction'])->name('storeTransaction');

 
    Route::get('/inquiryaddview', [InquiryController::class, 'viewInquiry']);
    Route::post('/inquiryadd', [InquiryController::class, 'sendInquiry'])->name('sendInquiry');
    Route::get('/transactions', [OrderController::class, 'viewTransectionToSchool'])->name('viewTransection');
    Route::get('/purchasedBooksList', [BookDetailController::class, 'purchasedBooksList']);
    
    Route::get('/approved-bookList', [BookDetailController::class, 'fetchApprovedBookDetail']);

    
    Route::get('/showNotification', [NotificationController::class, 'showNotifications']);
    
    Route::get('/getNotifications',  [NotificationController::class, 'getNotifications']);
    Route::get('/inquiry', [InquiryController::class, 'showinquiryforSchool']);
    Route::get('/getTotalOrdersCount', [OrderController::class, 'getTotalOrderCount']);
    
    
    Route::post('/addAgreement', [SchoolDetailController::class, 'addAgreement'])->name('storeSchoolDocument');

   
    Route::get('/getpurchasereport', [OrderController::class, 'getPurchaseReportData']);
    


});
