<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{asset('acssets/log.css')}}">
</head>
<body>
    <div class="wrapper-login-admin">
        <form action="{{ route('postLogin') }}" method="POST" id="login-admin">
            @csrf
            <h3>Đăng nhập quản lý</h3>
            <div class="mt-3">
                <label for="">Email</label>
                <input class="form-control" type="text" name="email">
                @error('email')
                <span class="text-danger"> {{ $message }}</span>
                @enderror

            </div>
            <div class="mt-3">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password">
                @error('password')
                <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <input type="checkbox" name="remember">
                <label for="">Remember me</label>
            </div>
            <br><br>
            <div class="wrapper-btn ms-1">
                <div>
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                    <a  class="btn btn border" href="{{route('register')}}">Đăng kí</a>
                </div>
                <a href="" class="me-1">Quên mật khẩu</a>
            </div>
            <br><br>
            @if (session('mesErr'))
                <span class="text-danger"> {{ session('mesErr') }}</span>
            @endif
        </form>
    </div>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>
</html>
