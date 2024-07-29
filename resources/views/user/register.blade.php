<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('acssets/user.css') }} ">
</head>

<body>
    <div class="row" style="height: 100vh">
        <div class="col-8 bg-white"></div>
        <div class="col-4 bg-red">
            <img src="{{asset('img/icon/image 40.png')}}" width="300" height="">
        </div>
    </div>
    <form action="{{ route('postRegisterUser') }}" method="POST" style="width:600px;" id="form-login">

        <div class="headline d-flex align-items-center gap-2 justify-content-center mb-4">
            <h4>Đăng ký </h4>
            <img src="{{asset('img/icon/image 40.png')}}" width="130" height="">
        </div>
        @csrf
        <div class="pt-3">
            <label for="">Tên tài khoản:</label>
            <input type="text" name="name" placeholder="Nhập tên" class="form-control mt-2">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="pt-3">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Nhập email" class="form-control mt-2">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="pt-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" class="form-control mt-2">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-danger">Đăng ký</button>
        <a href="{{ route('loginUser') }}" class="btn btn border ms-3">Đăng nhập</a>
        <br><br>
    @if (session('mesErr'))
        <span class="text-danger"> {{ session('mesErr') }}</span>
    @endif
    {{ session()->forget('mesErr') }}
    </form>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>

</html>

