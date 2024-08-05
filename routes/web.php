<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProuductController;
use App\Http\Controllers\CartController;

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
        Route::get('list-users',[UserController::class, 'listUsers'])->name('listUsers');
        // add
        Route::post('add-user',[UserController::class, 'addUser'])->name('addUser');
        // update CHÚ Ý
        /*
            1.Người quản lý cũng không có quyền biết mật khẩu của khách
            2.Email phải cố định không sửa được
            3.V à chỉ đc đổi tên, thay quyền
         */
        Route::get('update-user/{idUser}',[UserController::class, 'updateUser'])->name('updateUser');
        Route::post('update-user/{idUser}',[UserController::class, 'updatePostUser'])->name('updatePostUser');
        // delete
        Route::delete('delete-user',[UserController::class, 'deleteUser'])->name('deleteUser');
    });
    Route::group(['prefix'=> 'categories', 'as'=>'categories.'], function(){
        // list
        Route::get('list-categories',[CategoryController::class,'listCategories'])->name('listCategories');
        // add
        Route::post('add-category',[CategoryController::class,'addPostCategory'])->name('addPostCategory');
        //update
        Route::get('update-category/{id}',[CategoryController::class,'updateCategory'])->name('updateCategory');
        Route::post('update-category/{id}',[CategoryController::class,'updatePostCategory'])->name('updatePostCategory');
        // delete
        Route::delete('delete-category',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
    });
});

// -----------------------------user------------------------------------------

// đăng nhập
Route::get('login-user',[AuthenController::class, 'loginUser'])->name('loginUser');
Route::post('login-user',[AuthenController::class, 'postLoginUser'])->name('postLoginUser');
//đăng xuất
Route::get('logout-user',[AuthenController::class, 'logoutUser'])->name('logoutUser');
// đăng kí
Route::get('register-user',[AuthenController::class, 'registerUser'])->name('registerUser');
Route::post('register-user',[AuthenController::class, 'postRegisterUser'])->name('postRegisterUser');
// thông báo phần đăng kí mới có tài khoản mới thành công
Route::get('succes-register', [MailController::class, 'SuccesRegister'])->name('SuccesRegister');


// quên mật khẩu
Route::get('quen-mat-khau',[MailController::class,'quenMatKhau'])->name('quenMatKhau');
Route::post('recover-pass',[MailController::class,'recoverPass'])->name('recoverPass');
Route::get('update-new-pass',[MailController::class,'updateNewPass'])->name('updateNewPass');
Route::post('update-new-pass', [MailController::class, 'updatePostPass'])->name('updatePostPass');

//,'middleware'=>'checkUser'
Route::group(['prefix' => 'user', 'as'=>'user.'], function(){
    // sản phẩm trang chủ
    Route::get('/',[App\Http\Controllers\User\ProuductController::class,'homeProducts'])->name('homeProducts');

    Route::group(['prefix'=>'product','as'=>'product.'],function(){
        Route::get('list-product',[App\Http\Controllers\User\ProuductController::class,'listProductsUser'])->name('listProductsUser');

        Route::post('search-product',[App\Http\Controllers\User\ProuductController::class,'searchProduct'])->name('searchProduct');
        Route::post('search-category',[App\Http\Controllers\User\ProuductController::class,'searchCategory'])->name('searchCategory');

        Route::get('detail-product/{idProduct}',[App\Http\Controllers\User\ProuductController::class,'detaiProduct'])->name('detaiProduct');
    });
    Route::group(['middleware'=>'checkUser'],function(){
        Route::post('add-to-cart',[CartController::class,'addToCart'])->name('addToCart');
        // Route::get('cart-header',[CartController::class,'cartHeader'])->name('cartHeader');
        Route::get('view-cart',[CartController::class,'viewCart'])->name('viewCart');
        Route::patch('update-cart',[CartController::class,'updateCart'])->name('updateCart');
        Route::delete('delete-cart',[CartController::class,'deleteCart'])->name('deleteCart');


    });
});


