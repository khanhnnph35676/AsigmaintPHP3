<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPassWordMail;

class MailController extends Controller
{
    public function quenMatKhau(){
        return view('emails.forget_pass');
    }

    public function recoverPass(Request $request){
        $request->validate([
            'email' =>['required', 'email'],
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ]);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $titleMail = 'Lấy lại mật khẩu'.$now;
        $check = User::where('email', '=', $request->email)->exists();
        if($check){
            $to_email = $request->email;
            // $url = 'http://127.0.0.1:8000/';
            $link_reset_pass =url('update-new-pass?email='.$to_email);
            $data= array(
                'name'=>$titleMail,
                'body'=>$link_reset_pass,
                'email'=>$to_email
            );
            Mail::send('emails.reset-pass',['data'=>$data], function($message) use ($titleMail,$data){
                $message->to($data['email'])->subject($titleMail);
                $message->from($data['email'],$titleMail);
            });
            return redirect()->back()->with(
                'mes', 'Gửi thành công, vui lòng bạn vào kiểm tra lại email của mình'
            );
        }else{
            return redirect()->back()->with(
                'mes', 'Không tìm thấy email bạn nhập'
            );
        }
    }
    public function updateNewPass(){
        return view('emails.update-pass');
    }
    public function updatePostPass(Request $request){
        $request->validate([
            'password' =>'required|confirmed'
        ],
        [
            'password.required' => 'Password không được để trống',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('loginUser')->with('mesErr', 'Đổi mật khẩu thành công');
        }
        return redirect()->back()->withErrors(['email' => 'Email này của bạn không tồn tại']);
    }
    // làm thêm phần khi đăng kí sẽ gửi lên mail là thành công
    public function SuccesRegister(Request $request){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $titleMail = 'Đăng ký thành công'.$now;
        $check = User::where('email', '=', $request->email)->exists();
        if($check){
            $to_email = $request->email;
            // $url = 'http://127.0.0.1:8000/';
            $link =url('user');
            $data= [
                'name'=>$titleMail,
                'body'=>$link,
                'email'=>$to_email
            ];
            Mail::send('emails.succes-register',['data'=>$data], function($message) use ($titleMail,$data){
                $message->to($data['email'])->subject($titleMail);
                $message->from($data['email'],$titleMail);
            });
            return redirect()->route('loginUser')->with(
               'mesErr', 'Đăng kí thành công'
            );
        }else{
            return redirect()->back()->with(
                'mes', 'Không tìm thấy email bạn nhập'
            );
        }
    }
}
