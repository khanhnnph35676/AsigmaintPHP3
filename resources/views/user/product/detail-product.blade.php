@extends('user.layouts.default')

@push('style')
@endpush


@section('content')
    <div class="container mt-5">
        <div class="d-flex align-items-end">
            <h4><a href="{{route('user.product.listProductsUser')}}">Danh sách sản phẩm |</a></h4>
            <h5>Thông tin sản phẩm</h5>
        </div>

        @if (session('message'))
           <span class="text-danger"> {{ session('message') }}</span>
        @endif
        <div class="row mt-4">
            <div class="col-5 border-end">
                <div class="d-flex">
                    {{-- do có nhiều ảnh  --}}
                    <div class="image-primary">
                        @foreach ($product->images as $image)
                            @if ($image->image_type == 'main')
                                <img src="{{ asset($image->image_url) }}" alt="Ảnh chính">
                            @endif
                        @endforeach
                    </div>
                    <div class="image-secondary ms-2">
                        {{-- do có nhiều ảnh  --}}
                        @foreach ($product->images as $image)
                            @if ($image->image_type == 'secondary')
                                <img src="{{ asset($image->image_url) }}" alt="Ảnh phụ" width="100" height="100"
                                    style="object-fit: cover;">
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-6">
                <form action="{{ route('user.addToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name='idProduct' value="{{ $product->id }}">
                    <p>Tên sản phẩm: {{ $product->name }} </p>
                    <p>Danh mục:{{ $product->category->name }} </p>
                    <p>Mô tả: {{ $product->description }}</p>
                    <p>Số lượng: <input type="number" value="1" name="quantity"> </p>
                    <p>Giá: <strong>{{ number_format($product->price, 0, '.', '.') }} VNĐ</strong> </p>

                    <div class="wrapper-btn">
                        <button type="submit" class="btn btn-dark"> Thêm vào giỏ hàng </button>
                        <a class="btn btn-danger">Mua hàng </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
