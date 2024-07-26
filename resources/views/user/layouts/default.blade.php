<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=" {{ asset('acssets/all.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('acssets/user.css') }}">
    @stack('style')
</head>
<body>
    <!-- 1,  Header -->
    @include('user.layouts.header')

    <!-- 2, Main content -->
    @yield('content')

    {{-- 3,footer --}}
    <div class="footer">
        
    </div>
    <script src=" {{ asset('acssets/all.min.js') }}"></script>
    <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
    @stack('script')
</body>
</html>
