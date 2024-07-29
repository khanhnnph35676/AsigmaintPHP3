@extends('admin.layouts.default')

@push('styleListProducts')

@endpush

@section('content')

<div class="col-10 content-bar">
    <!-- tên trang -->
    <div class="wrapper-icon pt-2 mb-4 pb-2">
        <i class="fa-solid fa-house fa-sm" style="color: #dedede;"></i>
        <span class="ms-1 me-2">Bảng điều khiển</span>
        |
        <i class="fa-solid fa-cart-shopping fa-sm" style="color: #dedede;"></i>
        <span class="ms-1 me-2">Danh sách sản phẩm</span>
    </div>
    <!-- phẩn danh sách sản phẩm -->

    <div class="d-flex justify-content-end mb-3">
        <a href="" class="add-product-admin btn btn-success text-left me-5">
            Thêm mới
        </a>
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
                    <th style=" width:2%; height: 60px;">STT</th>
                    <th style=" width:8%;">Tên sản phẩm</th>

                    <th style=" width:5%;">Giá</th>
                    <th style=" width:20%;">Đánh giá</th>
                    <th style=" width:5%;">Loại</th>
                    <th style=" width:7%;">Lượt xem</th>
                    <th style=" width:7%;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProduct as $key => $value)
                <tr style="height: 50px;">
                    <td> {{ $key+1 }} </td>
                    <td> {{ $value->name }} </td>
                    <td> {{ $value->price }} Vnđ </td>
                    <td> {{ $value->description }} </td>
                    <td> {{ $value->category_id  }} </td>
                    <td> </td>
                    <td>
                        <a class="btn btn-warning" href="">Sửa</a>
                        <button class="btn btn-danger">Xoá</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{ $listProduct->links('pagination::bootstrap-5') }}
    <!-- end phẩn danh sách sản phẩm -->

    <!-- footer -->
    <p>footer</p>
    <!-- end footer -->
</div>

@endsection

@push('scriptListProducts')

@endpush
