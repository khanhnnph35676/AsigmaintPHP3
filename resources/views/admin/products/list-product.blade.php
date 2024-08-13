@extends('admin.layouts.default')

@push('styleListProducts')
    <style>
        .form-addProduct,.formDeleteAdmin {
            z-index: 111111;
            color: black !important;
        }
        .form-addProduct label,
        .form-addProduct h1,
        .form-addProduct option {
            color: black;
        }
        .pagination .page-link {
            color: #000; /* Change the text color to black */
        }
        .pagination .page-link:hover {
            color: #000; /* Change the hover text color to black */
            background-color: #f8f9fa; /* Optional: Change the hover background color */
        }
        .pagination .page-item.active .page-link {
            background-color: #000000c9; /* Change the background color of the active page to black */
            border-color: #000; /* Change the border color of the active page to black */
            color: white;
        }
        [aria-live="polite"] {
            display: none;
        }
    </style>
@endpush


@section('content')
        <!-- tên trang -->
        <div class="wrapper-icon pt-2 mb-4 pb-2">
            <i class="fa-solid fa-house fa-sm icon"></i>
            <span class="ms-1 me-2">Bảng điều khiển</span>
            |
            <span class="ms-1 me-2">Danh sách sản phẩm</span>
        </div>
        <!-- phẩn danh sách sản phẩm -->
        @if (session('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('admin.products.addProduct')}}" class="add-product-admin btn btn-success text-left me-5">
                Thêm mới
            </a>
            <div class="wrapper-form-search">
                <form action="" class="d-flex">
                    <input type="text" class="form-control" placeholder="Nhập id" style="width: 70%;">
                    <button class="btn btn border">
                        <i class="fa-solid fa-magnifying-glass fa-lg iiibl"></i>
                    </button>
                </form>
            </div>
            <div class="wrapper-form-search">
                <form action="" class="d-flex">
                    <input type="text" class="form-control" placeholder="Nhập tên" style="width: 70%;">
                    <button class="btn btn border" >
                        <i class="fa-solid fa-magnifying-glass fa-lg iiibl1"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="wrapper-table p-2">
            <table>
                <thead>
                    <tr class="border-bottom">
                        <th style=" width:2%; height: 60px;">STT</th>
                        <th style=" width:8%;">Tên sản phẩm</th>
                        <th style="width:8%">Ảnh</th>
                        <th style=" width:5%;">Giá</th>
                        <th style=" width:20%;">Đánh giá</th>
                        <th style=" width:5%;">Loại</th>
                        <th style=" width:5%;">Lượt xem</th>
                        <th style=" width:7%;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listProduct as $key => $value)
                        <tr style="height: 50px;">
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $value->name }} </td>
                            <td class="d-flex">
                                @foreach ($value->images as $image)
                                     <img src="{{ asset($image->image_url)}}" class="p-2" width="80" height="80" alt="" style="object-fit: cover;">
                                @endforeach
                            </td>
                            <td>{{ number_format($value->price, 0, '.', '.') }} Vnđ </td>
                            <td> {{ $value->description }} </td>
                            <td> {{ $value->category->name }} </td>
                            <td> </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.products.updateProduct',$value->id)}}">Sửa</a>
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModel" data-bs-id="{{ $value->id }}" >Xoá</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $listProduct->links('pagination::bootstrap-5') }}
        <!-- end phẩn danh sách sản phẩm -->
    {{-- xoá sản phẩm --}}
    <div class="modal fade formDeleteAdmin" id="deleteModel" tabindex="-1" aria-labelledby="#deleteModelLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModelLabel">Cảnh báo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="formDelete">
                @method('delete')
                @csrf
                <div class="modal-body">
                    Bạn có muốn xoá không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xoá</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@push('scriptListProducts')
<script>
    var deleteModel = document.getElementById('deleteModel')
    deleteModel.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        let formDelete = document.getElementById('formDelete')
        formDelete.setAttribute('action','{{ route("admin.products.deleteProduct") }}?idProduct=' + id)
    })
</script>
@endpush
