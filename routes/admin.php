<?php

use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OrderClothController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    
    Route::get('/profile', [AdminDetailController::class, 'showAdminProfile']);
    Route::post('/storeAdminProfile', [AdminDetailController::class, 'storeAdminProfile'])->name('storeAdminProfile');
    Route::get('/admin-logout', [AdminDetailController::class, 'Adminlogout'])->name('admin-logout');
    Route::get('/Schoolview', [SchoolDetailController::class, 'viewSchool'])->name('ViewSchool');
    Route::get('/list-school', [SchoolDetailController::class, 'fetchschoolListforAdmin'])->name('School-list');
    Route::get('/view-schooldetail/{uuid}', [SchoolDetailController::class, 'viewSchoolDetails'])->name('schoolDetail');
    Route::post('/view-school', [SchoolDetailController::class, 'addschoolforAdmin'])->name('School');
    Route::delete('/delete-school/{uuid}', [SchoolDetailController::class, 'deleteSchool'])->name('Delete');

    Route::get('/notification', [NotificationController::class, 'showNotificationsAdmin']);
    Route::get('/notificationAddView', [NotificationController::class, 'viewNotification']);
    Route::post('/notificationAdd', [NotificationController::class, 'sendNotification'])->name('sendNotification');
    Route::post('/book-detail', [BookDetailController::class, 'addbookDetails'])->name('Book Detail');
    Route::get('/view-book', [BookDetailController::class, 'viewBook'])->name('ViewBook');
    Route::get('/list-book', [BookDetailController::class, 'listbookforadmin'])->name('Book-list');
    Route::post('/add-class', [ClassesController::class, 'addClassforadmin'])->name('addClass');
    Route::get('/delete-class/{id}', [ClassesController::class, 'deleteClass'])->name('deleteClass'); 
    Route::get('/class', [ClassesController::class, 'listClassforadmin'])->name('class');
    Route::get('/editSchool/{uuid}', [SchoolDetailController::class, 'editSchool'])->name('editSchool');
    Route::post('/updateSchool/{uuid}', [SchoolDetailController::class, 'updateSchool'])->name('updateSchool');
    Route::post('/addBookToSchool', [SchoolDetailController::class, 'addBookToSchool'])->name('addBookToSchool');
    Route::get('/order', [OrderController::class, 'orderListToAdmin']);
    Route::post('/removeBookFromSchool', [SchoolDetailController::class, 'removeBookFromSchool'])->name('removeBookFromSchool');
    Route::get('/isBookAssociatedWithSchool/{bookId}', [SchoolDetailController::class, 'isBookAssociatedWithSchool'])->name('isBookAssociatedWithSchool');
    Route::post('/update-status', [OrderController::class, 'updateStatus'])->name('update-status');
    Route::get('/invoiceToAdmin/{orderId}', [OrderController::class, 'viewInvoiceToAdmin']);

    Route::get('/transactions', [OrderController::class, 'viewTransectionToAdmin'])->name('viewTransectionToAdmin');
    
    
    Route::get('/getinquiry',  [InquiryController::class, 'getinquiry']);
    Route::get('/list-inquiry', [InquiryController::class, 'showInquiryforadmin']);
    Route::post('/addtransaction', [OrderController::class, 'storeTransactionforadmin'])->name('addTransaction');
    
    Route::get('/getTotalCounts',  [AdminDetailController::class,'getTotalCount']);
    Route::post('/add-user', [ExpensesController::class, 'adduser'])->name('adduser');
    Route::get('/viewexpense', [ExpensesController::class, 'viewexpense'])->name('viewexpense');
    Route::get('/expense', [ClassesController::class, 'listexpenseforadmin'])->name('expense');
    Route::get('/delete-expense/{id}', [ExpensesController::class, 'deleteExpense'])->name('deleteExpense');
   
    Route::get('/datewise-stock', function () {
        return view('admin.datewise-stock');
    });
    Route::get('/monthly-stock', function () {
        return view('admin.monthly-stock');
    });
    Route::get('/getChartData', [BookDetailController::class, 'getChartData'])->name('getChartData');
    Route::get('/getSalesReportData', [OrderController::class, 'getSalesReportData']);
    Route::get('/getexpensereport',  [ExpensesController::class, 'getexpensereport']);
    Route::get('/fetchAdminPhotos', [AdminDetailController::class, 'fetchAdminPhotos'])->name('fetchAdminPhotos');
    
    Route::get('/manage-stock', [BookDetailController::class, 'managestockforadmin'])->name('Manage-stock');
    Route::get('/fetchDataByDate', [BookDetailController::class, 'fetchDataByDate'])->name('fetchDataByDate');
 
    Route::get('/view-order', [OrderClothController::class, 'addorder'])->name('addorder');
    Route::get('/view-product', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::get('/list-product', [ProductController::class, 'fetchProductListforAdmin'])->name('Product-list');
    Route::post('/add-supplier', [SupplierController::class, 'addsupplier'])->name('addsupplier');
    Route::get('/viewsupplier', [SupplierController::class, 'viewSupplier'])->name('viewSupplier');
    Route::get('/listsupplierforadmin', [SupplierController::class, 'listsupplierforadmin'])->name('listsupplierforadmin');
});
