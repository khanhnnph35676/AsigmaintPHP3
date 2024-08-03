<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Session;

class AuthenController extends Controller
{
    // đăng nhập
    public function login(){
        return view('admin.login');
    }
    public function postLogin(LoginAdminRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = $request->has('remember');
        if(Auth::attempt($data,$remember)){
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.');
            }
        }else{
            return redirect()->back()->with([
                'mesErr' => 'Tài khoản này không tồn tại'
            ]);
        };
    }
// đăng xuất
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
             'mesErr' => 'Đăng xuất thành công'
        ]);
    }
// đăng kí
    public function register(){
        return view('admin.register');
    }
    public function postRegister(RegisterAdminRequest $request){
        $check = User::where('email', $request->email)->exists();
        if($check){
            return redirect()->back()->with([
                'mesErr' => 'Email đã tồn tại'
            ]);
        }else {
            $data= [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
                'role' => '1'
            ];
            User::create($data);
            return redirect()->route('login')->with([
                'mesErr' => 'Đăng kí thành công'
            ]);
        }
    }

// Đăng nhập bên mua hàng
    public function loginUser(){
        return view('user.login');
    }
    public function postLoginUser(LoginAdminRequest $request){
        $data =[
            'email' => $request->email,
            'password' => $request->password,
            'role' => '2'
        ];
        $remember = $request->has('remember');
        if(Auth::attempt($data,$remember)){
            return redirect()->route('user.')->with([
                'mes'=> 'Đăng nhập thành công'
            ]);
        }else{
            return redirect()->back()->with([
                'mesErr' =>'Bạn đăng nhập sai tài khoản hoặc mật khẩu'
            ]);
        };
    }
// đăng xuất
    public function logoutUser(){
        $idUser = Auth::id();
        // Session::where('user_id',$idUser)->delete();
        /*
        Tôi sẽ logout Đúng cái tài khoản mình cần thôi
        */
        $user = User::find($idUser);
        dd($user);
        Auth::logoutOtherDevice($user->id);
        Auth::logout();
        return redirect()->back()->with([
            'mes' => 'Đăng xuất thành công'
        ]);
    }
// đăng kí
    public function registerUser(){
        return view('user.register');
    }
    public function postRegisterUser(RegisterAdminRequest $request){
        // check email không được trùng
        $check = User::where('email', $request->email)->exists();
        if($check){
            return redirect()->back()->with([
                'mesErr' => 'Email đã tồn tại'
            ]);
        }else {
            $data= [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
                'role' => '2'
            ];
            User::create($data);
            return redirect()->route('loginUser')->with([
                'mesErr' => 'Đăng kí thành công'
            ]);
        }
    }
}
