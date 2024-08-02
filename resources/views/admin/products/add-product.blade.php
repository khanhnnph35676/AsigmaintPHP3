@extends('admin.layouts.default')

@section('content')
    <!-- tên trang -->
    <div class="wrapper-icon pt-2 mb-4 pb-2">
        <i class="fa-solid fa-house fa-sm icon"></i>
        <span class="ms-1 me-2">Bảng điều khiển</span>
        |
        <i class="fa-solid fa-cart-shopping fa-sm"></i>
        <span class="ms-1 me-2">Thêm sản phẩm </span>
    </div>
    <!-- phẩn danh sách sản phẩm -->

    <form action="{{ route('admin.products.addPostProduct') }}" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-8">
                @csrf
                <input type="hidden" name='id'>
                <div class="mt-3">
                    <label for="nameAddProduct">Tên sản phẩm</label>
                    <input type="text" name='name' id="nameAddProduct" class="form-control">
                    @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="priceAddProduct">Giá sản phẩm</label>
                    <input type="text" name='price' id="priceAddProduct" class="form-control">
                    @error('price')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="contentAddProduct" >Nội dung sản phẩm</label>
                    <textarea name="description" id="contentAddProduct" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-3 me-3">
                <div class="mt-3">
                    <label for="category_id">Danh mục sản phẩm</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($listCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="nameAddProduct">Ảnh</label>
                    <input type="file" accept="image/*" name="image_url" class="form-control">
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Thêm mới sản phẩm</button>
            <a href="{{route('admin.products.listProducts')}}" type="button" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
    <!-- end phẩn danh sách sản phẩm -->
@endsection


