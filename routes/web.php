<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\SchoolLoginController;
use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\OrderClothController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::post('/add-size', [SizeController::class, 'addNewSize'])->name('add-new-size');
Route::get('/viewsize', [SupplierController::class, 'viewSize'])->name('viewSize');
Route::get('/size', [SizeController::class, 'listSize'])->name('size');
Route::get('/delete-Size/{id}', [SizeController::class, 'deleteSize'])->name('deleteSize');

Route::get('/profile', [AdminDetailController::class, 'showAdminProfile']);
Route::post('/storeAdminProfile', [AdminDetailController::class, 'storeAdminProfile'])->name('storeAdminProfile');

Route::get('/view-order', [OrderClothController::class, 'addorder'])->name('addorder');

Route::get('/view-product', [ProductController::class, 'addproduct'])->name('addproduct');
Route::get('/list-product', [ProductController::class, 'fetchProductListforAdmin'])->name('Product-list');
Route::post('/book-detail', [BookDetailController::class, 'addbookDetails'])->name('Book Detail');

Route::post('/add-supplier', [SupplierController::class, 'addsupplier'])->name('addsupplier');
Route::get('/viewsupplier', [SupplierController::class, 'viewSupplier'])->name('viewSupplier');
Route::get('/listsupplierforadmin', [SupplierController::class, 'listsupplierforadmin'])->name('listsupplierforadmin');
Route::get('/delete-Supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('deleteSupplier');

Route::post('/add-user', [UserController::class, 'addNewUser'])->name('addNewUser');
Route::get('/viewUser', [UserController::class, 'viewUser'])->name('viewUser');
Route::get('/listuser', [UserController::class, 'listuser'])->name('listuser');
Route::get('/delete-User/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/view-userdetail/{uuid}', [UserController::class, 'viewUserDetails'])->name('UserDetail');

Route::get('/view-order', [OrderClothController::class, 'addorder'])->name('addorder');

Route::get('/view-product', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('/add-product', [UserController::class, 'addNewProduct'])->name('addNewProduct');
Route::get('/list-product', [ProductController::class, 'fetchProductListforAdmin'])->name('Product-list');

Route::get('/admin-logout', [AdminDetailController::class, 'Adminlogout'])->name('admin-logout');

Route::get('/Schoolview', [SchoolDetailController::class, 'viewSchool'])->name('ViewSchool');
Route::get('/list-school', [SchoolDetailController::class, 'fetchschoolListforAdmin'])->name('School-list');
Route::get('/view-schooldetail/{uuid}', [SchoolDetailController::class, 'viewSchoolDetails'])->name('schoolDetail');
Route::post('/view-school', [SchoolDetailController::class, 'addschoolforAdmin'])->name('School');
Route::delete('/delete-school/{uuid}', [SchoolDetailController::class, 'deleteSchool'])->name('Delete');
Route::get('/editSchool/{uuid}', [SchoolDetailController::class, 'editSchool'])->name('editSchool');
Route::post('/updateSchool/{uuid}', [SchoolDetailController::class, 'updateSchool'])->name('updateSchool');
Route::post('/addBookToSchool', [SchoolDetailController::class, 'addBookToSchool'])->name('addBookToSchool');
Route::post('/removeBookFromSchool', [SchoolDetailController::class, 'removeBookFromSchool'])->name('removeBookFromSchool');
Route::get('/isBookAssociatedWithSchool/{bookId}', [SchoolDetailController::class, 'isBookAssociatedWithSchool'])->name('isBookAssociatedWithSchool');


