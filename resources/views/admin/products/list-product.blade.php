@extends('admin.layouts.default')

@push('styleListProducts')

@endpush

@section('content')

<div class="col-10 content-bar">
    <!-- tên trang -->
    <div class="wrapper-icon pt-2 pb-2 mb-4">
        <i class="fa-solid fa-house fa-sm" style="color: #dedede;"></i>
        <span class="ms-1 me-2">Bảng điều khiển</span>
        |
        <i class="fa-solid fa-cart-shopping fa-sm" style="color: #dedede;"></i>
        <span class="ms-1 me-2">Danh sách sản phẩm</span>
    </div>
    <!-- phẩn danh sách sản phẩm -->
    <div class="d-flex justify-content-end mb-3">
        <div class="wrapper-form-search">
            <form action="" class="d-flex">
                <input type="text" class="form-control custom-input" placeholder="Nhập id" style="width: 70%;">
                <button>Tìm</button>
            </form>
        </div>
        <div class="wrapper-form-search">
            <form action="" class="d-flex">
                <input type="text" class="form-control custom-input" placeholder="Nhập tên" style="width: 70%;">
                <button>Tìm</button>
            </form>
        </div>
    </div>
    <div class="wrapper-table p-2">

        <table>
            <thead>
                <tr class="border-bottom">
                    <th style=" width:1%; height: 60px;">STT</th>
                    <th style=" width:10%;">Tên sản phẩm</th>
                    <th style=" width:8%;">Loại</th>
                    <th style=" width:10%;">Giá</th>
                    <th style=" width:8%;">Lượt xem</th>
                    <th style=" width:8%;">Đánh giá</th>
                    <th style=" width:8%;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 50px;">
                    <td>1</td>
                    <td>dưa</td>
                    <td>dưa</td>
                    <td>dă</td>
                    <td>da</td>
                    <td>ưa</td>
                    <td>Sửa Xoá</td>
                </tr>
                <tr style="height: 50px;">
                    <td>2</td>
                    <td>dưa</td>
                    <td>dưa</td>
                    <td>dă</td>
                    <td>da</td>
                    <td>ưa</td>
                    <td>Sửa Xoá</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- end phẩn danh sách sản phẩm -->

    <!-- footer -->
    <p>footer</p>
    <!-- end footer -->
</div>

@endsection

@push('scriptListProducts')

@endpush
