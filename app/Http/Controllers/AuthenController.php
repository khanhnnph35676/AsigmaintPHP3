<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        if(Auth::attempt($data)){
            // hệ thống đăng nhập tranh cho người dùng
            // role 1 và 2 đều đăng nhập vào được nên không cần if
            // dd(Auth::id());
            session()->put('user_id',Auth::id());

            return redirect()->route('user.')->with([
                "mes"=>"Đăng nhập thành công"
            ]);

        }else{
            return redirect()->back()->with([
                'mesErr' => 'Bạn đăng nhập sai tài khoản hoặc mật khẩu'
            ]);
        };
    }
// đăng xuất
    public function logoutUser(){
        // Session::where('user_id',Auth::id())->delete();

        // return redirect()->route('user.')->with([
        //     'mesLogout' => 'Đăng xuất thành công'
        // ]);
    }
}
