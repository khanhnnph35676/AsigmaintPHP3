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
            <a href="{{ route('user.homeProducts') }}"><img src="{{asset('img/icon/image 40.png')}}" width="300" height=""></a>
        </div>
    </div>
    <form action="{{ route('postLoginUser') }}" method="POST" style="width:600px;" id="form-login">
        <div class="headline d-flex align-items-center gap-2 justify-content-center mb-4">
            <h4>Đăng nhập </h4>
            <img src="{{asset('img/icon/image 40.png')}}" width="130" height="">
        </div>
        @csrf
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
        <div class="pt-3">

            <input type="checkbox" name="remember">
            <label for="">Remember me</label>
        </div>
        <br>
        <div class="wrapper--login-user">
            <div>
                <button type="submit" class="btn btn-danger">Đăng nhập</button>
                <a href=" {{ route('registerUser') }} " class="btn btn border ms-3">Đăng ký</a>
            </div>
            <a href="{{route('quenMatKhau')}}">Quên mật khẩu</a>
        </div>

        <br><br>

    @if(session('mesErr'))
        <span class="text-danger"> {{ session('mesErr') }}</span>
    @endif
    </form>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>

</html>

