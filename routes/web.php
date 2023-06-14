<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::post('/create', [AdminAuthController::class, 'create'])->name('create');

    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/register', [AdminAuthController::class, 'register'])->name('admin.auth.register');

    Route::post('/custom-register', [AdminAuthController::class, 'customRegister'])->name('register.custom');

    // Route::get('/', [AdminAuthController::class, 'index'])->name('admin.index');

    // Route::get('/', [AdminAuthController::class, 'destroy'])->name('admin.destroy');
 
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/dash', function () {
            return view('welcome');
        })->name('adminDashboard');
 
    });
});

Route::resource('/product', ProductController::class);

Route::post('/searchpr', [ProductController::class, 'search' ])->name('product.search');

Route::resource('/category', CategoryController::class);

Route::resource('/client', ClientController::class);

Route::post('/searchcl', [ClientController::class, 'search' ])->name('client.search');

Route::resource('/admin', AdminAuthController::class);