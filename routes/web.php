<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;


//---------------------------admin------------------------------------------------
// đăng nhập
Route::get('login',[AuthenController::class, 'login'])->name('login');
Route::post('login',[AuthenController::class, 'postLogin'])->name('postLogin');
// đăng xuất
Route::get('logout',[AuthenController::class, 'logout'])->name('logout');

// đăng kí
Route::get('register',[AuthenController::class, 'register'])->name('register');
Route::post('register',[AuthenController::class, 'postRegister'])->name('postRegister');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' =>'checkAdmin'],function(){
    Route::get('/',function(){
        return view('admin.home');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'],  function(){
        Route::get('/',[ProductController :: class, 'listProducts'])->name('listProducts');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function(){

    });
});

// -----------------------------user----------------------------------------------------

Route::get('login-user',[AuthenController::class, 'loginUser'])->name('loginUser');
Route::post('login-user',[AuthenController::class, 'postLoginUser'])->name('postLoginUser');

Route::get('logout-user',[AuthenController::class, 'logoutUser'])->name('logoutUser');

Route::group(['prefix' => 'user', 'as'=>'user.'], function(){
    Route::get('/',function(){
        return view('user.home');
    });

});


