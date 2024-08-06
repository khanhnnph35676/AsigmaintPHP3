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
            <a href="{{ route('user.homeProducts') }}"><img src="{{ asset('img/icon/image 40.png') }}" width="300"
                    height=""></a>
        </div>
    </div>
    @php
        $email = $_GET['email'];
    @endphp
    <form action="{{ route('updatePostPass') }}" method="POST" style="width:600px;" id="form-login">
        <div class="headline d-flex align-items-center gap-2 justify-content-center mb-4">
            <h4>Dổi mật khẩu </h4>
            <img src="{{ asset('img/icon/image 40.png') }}" width="130" height="">
        </div>
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <div class="pt-3">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" class="form-control mt-2">
            @error('password')
                @if ($message === 'Password không được để trống')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name='password_confirmation' placeholder="Nhập lại mật khẩu"
                class="form-control mt-2">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div class="wrapper--login-user">
            <div>
                <button type="submit" class="btn btn-danger">Xác nhận đổi</button>
            </div>
        </div>
        <br><br>

        @if (session('mesErr'))
            <span class="text-danger"> {{ session('mesErr') }}</span>
        @endif
    </form>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>

</html>
