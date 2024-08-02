<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\MailController;
//---------------------------admin------------------------------------------------
// đăng nhập
Route::get('login',[AuthenController::class, 'login'])->name('login');
Route::post('login',[AuthenController::class, 'postLogin'])->name('postLogin');
// đăng xuất
Route::get('logout',[AuthenController::class, 'logout'])->name('logout');
// đăng kí
Route::get('register',[AuthenController::class, 'register'])->name('register');
Route::post('register',[AuthenController::class, 'postRegister'])->name('postRegister');
// nội dung trong amdin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' =>'checkAdmin'],function(){
    Route::get('/',function(){
        return view('admin.home');
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'],  function(){
        // list
        Route::get('/',[ProductController :: class, 'listProducts'])->name('listProducts');
        // adđ
        Route::get('add-product',[ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product',[ProductController::class, 'addPostProduct'])->name('addPostProduct');
        // delete
        Route::delete('delete-product',[ProductController::class,'deleteProduct']) ->name('deleteProduct');
        // update
        Route::get('update-product/{idProduct}',[ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::post('update-product/{idProduct}',[ProductController::class, 'updatePostProduct'])->name('updatePostProduct');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
    });
});

// -----------------------------user----------------------------------------------------

// đăng nhập
Route::get('login-user',[AuthenController::class, 'loginUser'])->name('loginUser');
Route::post('login-user',[AuthenController::class, 'postLoginUser'])->name('postLoginUser');
//đăng xuất
Route::get('logout-user',[AuthenController::class, 'logoutUser'])->name('logoutUser');
// đăng kí
Route::get('register-user',[AuthenController::class, 'registerUser'])->name('registerUser');
Route::post('register-user',[AuthenController::class, 'postRegisterUser'])->name('postRegisterUser');
// quên mật khẩu
Route::get('quen-mat-khau',[MailController::class,'quenMatKhau'])->name('quenMatKhau');
Route::post('recover-pass',[MailController::class,'recoverPass'])->name('recoverPass');
Route::get('update-new-pass',[MailController::class,'updateNewPass'])->name('updateNewPass');
Route::post('update-new-pass', [MailController::class, 'updatePostPass'])->name('updatePostPass');


Route::group(['prefix' => 'user', 'as'=>'user.'], function(){
    Route::get('/',function(){
        return view('user.home');
    });

});


