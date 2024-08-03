@extends('admin.layouts.default')

@section('content')
    <!-- tên trang -->
    <div class="wrapper-icon pt-2 mb-4 pb-2">
        <i class="fa-solid fa-house fa-sm icon"></i>
        <span class="ms-1 me-2">Bảng điều khiển</span>
        |
        <i class="fa-solid fa-folder-open fa-sm"></i>
        {{-- <i class="fa-solid fa-cart-shopping fa-sm"></i> --}}
        <span class="ms-1 me-2">Danh sách tài khoản</span>
    </div>
    @if (session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row me-2">
        <div class="col-4 add-caegory">
             {{-- thêm mới --}}
            <form action="{{ route('admin.users.updatePostUser',$user->id)}}" method="POST">
                @csrf
                <h3>Sửa tài khoản</h3>
                <hr>
                <div class="mt-3">
                    <label for="category-name">Tên tài khoản</label>
                    <input type="text" name='name' placeholder="Nhập tên"  value="{{$user->name}}"
                        class="form-control mt-2">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>Email</label>
                    <input type="text" placeholder="Nhập email" value="{{$user->email}}" disabled
                        class="form-control mt-2">
                </div>
                <div class="mt-3">
                    <label>Quyền truy cập</label>
                    <select name="role" id="" class="form-control">
                        <option value="1"  {{$user->role == '1' ? 'selected':''}}>Admin</option>
                        <option value="2"  {{$user->role == '2' ? 'selected':''}}> User</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-dark mt-3 mb-3">Cập nhật</button>
            </form>
        </div>
        {{-- Danh sách danh mục --}}
        @include('admin.users.layout.home')
    </div>
@endsection

