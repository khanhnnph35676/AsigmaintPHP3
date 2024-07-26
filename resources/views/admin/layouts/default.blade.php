<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href=" {{ asset('acssets/bootstrap.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('acssets/all.min.css') }}  ">
  <link rel="stylesheet" href=" {{ asset('acssets/main.css') }}  ">
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
        <a href="#" class="box-dark"></a>
        <a href="#" class="box-white"></a>
      </div>
    </div>
  </div>
<!-- header -->
  @include('admin.layouts.header')
  <!-- main-content -->
  <div class="row main-content">
    <!-- left-bar -->
    @include('admin.layouts.left-bar')
    <!-- content-bar -->
    <div class="col-2 left"></div>
    @yield('content')
  </div>


  <script src=" {{ asset('acssets/bootstrap.bundle.min.js') }} "></script>
  <script src=" {{ asset('acssets/all.min.js') }} "></script>
  <script src=" {{ asset('acssets/main.js') }} "></script>
  <script src=" {{ asset('acssets/mainChart.js') }} "></script>
  @stack('scriptHome')
  @stack('scriptListProducts')
</body>

</html>


<!-- <script>
  document.querySelector('.box-dark').addEventListener('click', function (event) {
    eve nt.preventDefault();
    document.body.classList.add('bg-dark-mode');
    document.body.classList.remove('bg-light-mode');
  });

  document.querySelector('.box-white').addEventListener('click', function (event)   {
    event.preventDefault();
    document.body.classList.add('bg-light-mode');
    document.body.classList.remove('bg-dark-mode');
  });
</script> -->
