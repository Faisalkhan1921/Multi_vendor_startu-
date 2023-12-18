<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin route 
Route::prefix('vendor')->group(function() {
Route::get('/login',[AdminController::class,'index'])->name('login_form');
Route::post('/login/ownser',[AdminController::class,'login'])->name('login.form');
Route::get('/dashboard',[AdminController::class,'dashbaord'])->name('admin.dashboard')->middleware('admin');
Route::get('/register',[AdminController::class,'register'])->name('admin.register');
Route::post('/register/create',[AdminController::class,'register_store'])->name('admin.register.create');
Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');

});


Route::prefix('vendor')->group(function() {
    Route::get('/seller/email',[VendorEmailController::class,'index'])->name('vendor.seller.email');
    Route::post('/seller/email.store',[VendorEmailController::class,'store'])->name('vendor.email.store');
    Route::post('/seller/email.update/{id}',[VendorEmailController::class,'update'])->name('vendor.email.update');
   
    Route::get('/email/send',[VendorEmailController::class,'sendview'])->name('vendor.seller.send');
    Route::post('/send/email/customer',[VendorEmailController::class,'sendemail'])->name('vendor.send.email');
    });
// end admin routes 

// customer route 
Route::prefix('customer')->group(function() {

    Route::get('/login',[CustomerController::class,'index'])->name('customer_login_form');
    Route::post('/login/ownser',[CustomerController::class,'login'])->name('customer.login.form');
    Route::get('/dashboard',[CustomerController::class,'dashbaord'])->name('customer.dashboard')->middleware('customer');
    Route::get('/register',[CustomerController::class,'register'])->name('customer.register');
    Route::post('/register/create',[CustomerController::class,'register_store'])->name('customer.register.create');
    Route::get('/logout',[CustomerController::class,'AdminLogout'])->name('customer.logout')->middleware('customer');
    
    });
 // end customer routes 


Route::get('/', function () {
    return view('customer.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
