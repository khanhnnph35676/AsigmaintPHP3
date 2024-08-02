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
            <a href="{{ route('user.') }}"><img src="{{asset('img/icon/image 40.png')}}" width="300" height=""></a>
        </div>
    </div>
    <form action="{{ route('recoverPass') }}" method="POST" style="width:600px;" id="form-login">
        <div class="headline text-center mb-4">
            <img src="{{asset('img/icon/image 40.png')}}" width="130" height="">
            <h2>Lấy lại mật khẩu </h2>
            <h5>Điền email để lất lại mật khẩu</h5>
        </div>
        @csrf
        <div class="pt-3">
            <input type="text" name="email" placeholder="Nhập email" class="form-control mt-2 mb-3">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="wrapper--login-user">
            <div>
                <button type="submit" class="btn btn-danger">Gửi</button>
                <a href=" {{ route('loginUser') }} " class="btn btn border ms-3">Quay lại</a>
            </div>
        </div>
        <br><br>
        @if(session('mes'))
        <span class="text-danger"> {{session('mes')}}</span>
         @endif
    </form>

    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>

</html>

