<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function listUsers(){
        $listUsers = User::paginate('5');
        return view('admin.users.list-users')->with([
            'listUsers' => $listUsers
        ]);
    }
    public function addUser(UserRequest $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];
        User::create($data);
        return redirect()->back()->with([
            'message' => 'Thêm tài khoản thành công'
        ]);
    }
    public function updateUser($idUser){
        // dd($idUser);
        $listUsers = User::paginate('5');
        $user = User::find($idUser);
        return view('admin.users.update-user')->with([
            'listUsers' => $listUsers,
            'user' => $user
        ]);
    }
    public function updatePostUser($idUser, UpdateUserRequest $request){
        // dd($idUser);
        $data = [
            'name' => $request->name,
            'role' => $request->role,
        ];
        User::where('id',$idUser)->update($data);
        return redirect()->back()->with([
            'message' => 'Sửa tài khoản thành công'
        ]);
    }
    public function deleteUser(Request $request){
        // dd($request->idUser);
        User::where('id',$request->idUser)->delete();
        return redirect()->back()->with([
            'message' => 'Xoá tài khoản thành công'
        ]);
    }
}
