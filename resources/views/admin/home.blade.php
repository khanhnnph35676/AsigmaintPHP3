@extends('admin.layouts.default')

@push('styleHome')
@endpush

@section('content')
    <div class="col-10 content-bar">
        <!-- tên trang -->
        <div class="wrapper-icon pt-2 pb-2 mb-4">
            <i class="fa-solid fa-house fa-sm" style="color: #dedede;"></i>
            <span class="ms-1 me-2">Bảng điều khiển</span>
            |
            <i class="fa-solid fa-cart-shopping fa-sm" style="color: #dedede;"></i>
            <span class="ms-1 me-2">Thương mại điện tử</span>
        </div>
        <!-- Hàng 1 -->
        <div class="d-flex gap-2 mb-3">
            <div class="width30pt radius p-3 me-2">
                <span>Daonh thu</span>
                <h5>500.000 Vnđ</h5>
                <span><i class="fa-solid fa-caret-up fa-lg"></i> $34 Kể từ tuần trước</span>
                <div class="wrapper-chart">
                    <canvas id="myLineChart" class="p-2" width="100%" height="100"></canvas>
                </div>
            </div>
            <div class="width33pt radius p-3 me-2">
                <span>Tổng số khách hàng</span>
                <h5>50</h5>
                <span><i class="fa-solid fa-caret-up fa-lg"></i> $14 Kể từ tuần trước</span>
                <div class="wrapper-chart">
                    <canvas id="myLineChart1" class="p-2" width="100%" height="100"></canvas>
                </div>
            </div>
            <div class="width33pt radius p-3 me-2">
                <span>Khách hàng truy cập</span>
                <h5>10</h5>
                <span><i class="fa-solid fa-caret-up fa-rotate-180 fa-lg"></i> 12.4% Kể từ tuần trước</span>
                <div class="wrapper-chart">
                    <canvas id="myLineChart2" class="p-2" width="100%" height="100"></canvas>
                </div>
            </div>
        </div>
        <!-- Hàng 2 -->
        <div class="d-flex">
            <div class="radius width49pt me-2">
                <div class="row m-2">
                    <div class="col-12">
                        <h4>Bản đồ</h4>
                        <span><i class="fa-regular fa-calendar-days fa-sm me-2"></i>Trong 30 ngày qua</span>
                    </div>
                </div>
            </div>
            <div class="radius width49pt me-2">
                <div class="row m-2">
                    <div class="col-12">
                        <h4>Sản phẩm hàng đầu</h4>
                        <span><i class="fa-regular fa-calendar-days fa-sm me-2"></i>Trong 30 ngày qua</span>
                    </div>
                </div>
                <div class="row m-2 list-prd">
                    <div class="col-12 prd-line">
                        <a href="">
                            <div class="row p-1">
                                <div class="col-3 image-prd"> <img width="50" height="50"
                                        src="{{ asset('img/prd/sp1.png') }}" alt=""></div>
                                <div class="col-4 name-prd">
                                    <h5>Tên sản phẩm</h5> <span style="color: #dedede;">240.000 Vnđ</span>
                                </div>
                                <div class="col-3"> </div>
                                <div class="col-3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 prd-line mt-2">
                        <a href="">
                            <div class="row p-1">
                                <div class="col-3 image-prd"> <img width="50" height="50"
                                        src="{{ asset('img/prd/sp1.png') }}" alt=""></div>
                                <div class="col-4 name-prd">
                                    <h5>Tên sản phẩm</h5> <span style="color: #dedede;">240.000 Vnđ</span>
                                </div>
                                <div class="col-3"> </div>
                                <div class="col-3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 prd-line mt-2">
                        <a href="">
                            <div class="row p-1">
                                <div class="col-3 image-prd"> <img width="50" height="50"
                                        src="{{ asset('img/prd/sp1.png') }}" alt=""></div>
                                <div class="col-4 name-prd">
                                    <h5>Tên sản phẩm</h5> <span style="color: #dedede;">240.000 Vnđ</span>
                                </div>
                                <div class="col-3"> </div>
                                <div class="col-3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 prd-line mt-2">
                        <a href="">
                            <div class="row p-1">
                                <div class="col-3 image-prd"> <img width="50" height="50"
                                        src="../img/z5533290989838_3283c606f6b74265ed464db5791b7472.jpg" alt="">
                                </div>
                                <div class="col-4 name-prd">
                                    <h5>Tên sản phẩm</h5> <span style="color: #dedede;">240.000 Vnđ</span>
                                </div>
                                <div class="col-3"> </div>
                                <div class="col-3"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 prd-line mt-2">
                        <a href="">
                            <div class="row p-1">
                                <div class="col-3 image-prd"> <img width="50" height="50"
                                        src="../img/z5533290989838_3283c606f6b74265ed464db5791b7472.jpg" alt="">
                                </div>
                                <div class="col-4 name-prd">
                                    <h5>Tên sản phẩm</h5> <span style="color: #dedede;">240.000 Vnđ</span>
                                </div>
                                <div class="col-3"> </div>
                                <div class="col-3"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--  Hàng 3-->
        <div class="d-flex mt-3">
            <div class="radius width65pt me-2">
                <div class="row m-2">
                    <div class="col-7">
                        <h4>Lịch sử giao dịch</h4>
                        <span><i class="fa-regular fa-calendar-days fa-sm me-2"></i>Trong 30 ngày qua</span>
                    </div>
                    <div class="col-5 wrapper-form">
                        <form action="" class="form-search">
                            Tìm kiếm:
                            <input type="text" class="ms-2 form-control">
                        </form>
                    </div>
                </div>
                <div class="wrapper-table p-2">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 38%;">Payment Name</th>
                                <th scope="col">Date $ Time</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="name-user p-0">
                                    <div class="wrapper-img-acount me-2">
                                        <img src="../img/z5533290989838_3283c606f6b74265ed464db5791b7472.jpg"
                                            alt="">
                                    </div>
                                    <div class="wrapper-name">
                                        <span>Nguyễn Như Khánh</span> <br>
                                        <span>Email: khanh@gmail.com</span>
                                    </div>
                                </th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                    </table>
                </div>
            </div>
            <div class="radius width33pt me-2">

            </div>
        </div>
        <!-- Hàng 4 -->
        <div class="d-flex gap-2 mt-3">
            <div class="width30pt radius me-2">
                <h5 class="m-2">Top Categories</h5>
                <div class="wrapper_mychart p-3" style="width: 250px;height: 250px;">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
            <div class="width33pt radius me-2">
                <h5 class="m-2">Top Categories</h5>
                <div class="wrapper_mychart p-3" style="width: 250px;height: 250px;">

                </div>

            </div>
            <div class="width33pt radius">
                <h5 class="m-2">Top Categories</h5>
            </div>
        </div>
        <!-- footer -->
        <p>footer</p>
    </div>
@endsection

@push('scriptHome')
@endpush
