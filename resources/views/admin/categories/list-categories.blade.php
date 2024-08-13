@extends('admin.layouts.default')

@section('content')
    <!-- tên trang -->
    <div class="wrapper-icon pt-2 mb-4 pb-2">
        <i class="fa-solid fa-house fa-sm icon"></i>
        <span class="ms-1 me-2">Bảng điều khiển</span>
        |
        <i class="fa-solid fa-folder-open fa-sm"></i>
        {{-- <i class="fa-solid fa-cart-shopping fa-sm"></i> --}}
        <span class="ms-1 me-2">Danh sách danh mục</span>
    </div>
    @if (session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row ms-5" style="max-height:800px;">
        <div class="col-4 add-caegory">
             {{-- thêm mới --}}
            <form action="{{ route('admin.categories.addPostCategory') }}" method="POST">
                @csrf
                <h3>Thêm danh mục</h3>
                <hr>
                <label for="category-name">Tên danh mục</label>
                <input type="text" id="category-name" name='name' placeholder="Nhập danh mục"
                    class="form-control mt-2">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <button type="submit" class="btn btn-dark mt-3">Thêm mới</button>
            </form>
        </div>
        {{-- Danh sách danh mục --}}
        @include('admin.categories.layout.home')
    </div>
@endsection

