<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('acssets/all.min.css') }}  ">
  <link rel="stylesheet" href=" {{ asset('acssets/main.css') }}  ">
  <link rel="stylesheet" href=" {{ asset('acssets/colobg.css') }}  ">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @stack('styleHome')
  @stack('styleListProducts')
</head>
<body>
  <!-- các nút chỉnh màu -->
  <p class="d-inline-flex gap-1 edit-bg-color">
    <a class="btn" data-bs-toggle="collapse" href="#edit-color" role="button" aria-expanded="false"
      aria-controls="collapseExample">
      <i class="fa-solid fa-gear fa-lg install-color" style="color: #ebe7ed;"></i>
    </a>
  </p>
  <div class="collapse" id="edit-color">
    <div class="card card-body bg-dark p-2">
      <div class="wrapper-box">
        <a href="#" id="dark-mode" class="box-dark"></a>
        <a href="#" id="light-mode" class="box-white"></a>
      </div>
    </div>
  </div>
<!-- header -->
  @include('admin.layouts.header')
  <!-- main-content -->
  <div class="row main-content">
    <!-- left-bar -->
    <div class="col-2 border left-bar">
        @include('admin.layouts.left-bar')
    </div>
    <!-- content-bar -->
    <div class="col-2 left"></div>
    <div class="col-10 content-bar">
        @yield('content')
        @include('admin.layouts.footer')
    </div>
    {{-- footer --}}

  </div>

  <script src=" {{ asset('acssets/main.js') }} "></script>
  <script src=" {{ asset('acssets/mainChart.js') }} "></script>
  <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
  <script src=" {{ asset('acssets/all.min.js') }} "></script>

  @stack('scriptHome')
  @stack('scriptListProducts')
</body>

</html>

