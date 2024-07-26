<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
</head>
<body>
    <form action="{{ route('postRegister') }}" method="POST">
        @csrf
        <h3>Đăng ký quản lý</h3>
        <div class="mt-3">
            <label for="">Tên người dùng</label>
            <input class="form-control" type="text" name="name">
            @error('name')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
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
        {{-- <div class="mt-3">
            <label for="">Nhập lại password</label>
            <input class="form-control" type="password" name="repassword">
        </div> --}}
        <button type="submit" class="btn btn-success mt-3">Đăng ký</button>
        <a href="{{route('login')}}">Đăng nhập</a>
        <br><br>
        @if (session('mesErr'))
        <span class="text-danger"> {{ session('mesErr') }}</span>
        @endif
    </form>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
    <script>

    </script>
</body>
</html>
