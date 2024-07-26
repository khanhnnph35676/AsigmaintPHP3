<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
</head>

<body>
    <form action="{{ route('postLoginUser') }}" method="POST">
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
        <button type="submit" class="btn btn-danger">Đăng nhập</button>
        <a href="" class="btn btn">Đăng ký</a>
        <br><br>
    @if (session('mesErr'))
        <span class="text-danger"> {{ session('mesErr') }}</span>
    @endif
    {{ session()->forget('mesErr') }}
    </form>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
</body>

</html>
