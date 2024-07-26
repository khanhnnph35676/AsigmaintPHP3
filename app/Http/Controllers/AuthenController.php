<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\Session;

class AuthenController extends Controller
{
    // đăng nhập
    public function login(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' =>['required', 'email'],
            'password' =>'required'
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống'
        ]);
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
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
    public function postRegister(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=> 'required',
            'name'=>'required',
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'name.required'=>'Bạn chưa nhập tên'
        ]);
        $check = User::where('email', $request->email)->exists();
        if($check){
            return redirect()->back()->with([
                'mesErr' => 'Email đã tồn tại'
            ]);
        }else {
            $data= [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password)
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
    public function postLoginUser(Request $request){
        $request->validate([
            'email' =>['required', 'email'],
            'password' =>'required'
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống'
        ]);
        $data =[
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = $request->has('remember');
        $idUser = Auth::id();
        $minutes = 60; // Thời gian sống của cookie tính bằng phút

        if(Auth::attempt($data,$remember)){
            session()->put('mes', 'Đăng nhập thành công');
            return redirect()->route('user.');
        }else{

            return redirect()->back()->with([
                'mesErr' =>'Bạn đăng nhập sai tài khoản hoặc mật khẩu'
            ]);

        };
    }
// đăng xuất
    public function logoutUser(){
        Auth::logout();
        return redirect()->route('loginUser')->with([
            'mesErr' => 'Đăng xuất thành công'
        ]);
    }
}
