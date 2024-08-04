@extends('user.layouts.default')

@push('style')
    <style>
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
    @include('user.layouts.banner')
    <!-- 2.1, Service of shop -->
    <div class="container">
        <div class="service-shop row mt-5">
            <div class="col-3 d-flex align-items-center gap-3">
                <i class="fa-solid fa-truck-fast fa-2xl" style="color: #a2a4a5;"></i>
                <div class="wrapper-sv">
                    <h5>FREE SHIPPING</h5>
                    <span class="text-secondary">On All Orders</span>
                </div>
            </div>
            <div class="col-3 d-flex align-items-center gap-3">
                <i class="fa-regular fa-thumbs-up fa-2xl" style="color: #a2a4a5;"></i>
                <div class="wrapper-sv">
                    <h5>100% MONEY BACK</h5>
                    <span class="text-secondary">Within 30 Days Guaranted</span>
                </div>
            </div>
            <div class="col-3 d-flex align-items-center gap-3">
                <i class="fa-regular fa-credit-card fa-2xl" style="color: #a2a4a5;"></i>
                <div class="wrapper-sv">
                    <h5>SECURE PAYMENT</h5>
                    <span class="text-secondary">100% Secure Payment</span>
                </div>
            </div>
            <div class="col-3 d-flex align-items-center gap-3">
                <i class="fa-solid fa-headset fa-2xl" style="color: #a2a4a5;"></i>
                <div class="wrapper-sv">
                    <h5>24/7 LIVE SUPPORT</h5>
                    <span class="text-secondary">Get help When Your Need</span>
                </div>
            </div>
        </div>

    </div>
    <!-- 2.2, Directory image -->
    <div class="row directory-image m-5">
        <div class="col-8">
            <div class="wrapper__directory-img">
                <img src=" {{ asset('img/prd/chudesp1.png') }} " alt="Ảnh danh mục áo khoác nam" width="100%">
            </div>
        </div>
        <div class="col-4">
            <div class="wrapper__directory-img ">
                <img src=" {{ asset('img/prd/chudesp2.png') }} " class="mb-4" alt="Ảnh danh mục túi sách" width="100%">
                <img src=" {{ asset('img/prd/chudesp3.png') }} " alt="Ảnh danh mục giày" width="100%">
            </div>
        </div>
    </div>
    <!-- 2.3,List Host products  -->
    <div class="prds-home ms-5 me-5">
        <div class="heading-products mb-5">
            <div class="row">
                <div class="col-4">
                    <h3>Lựa chọn tuyệt vời</h3>
                    <span>Xu hướng phổ biến và vật phẩm độc quền từ cửa hàng</span>
                </div>
                <div class="col-8 categories--prds-home ">
                    <a href="" class="me-4">
                        <h5>Sản phẩm mới về </h5>
                    </a>
                    <a href="" class="me-4">
                        <h5>Bán chạy nhất </h5>
                    </a>
                    <a href="" class="me-4">
                        <h5>Giảm giá</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-products">
            <div class="row d-flex justify-content-around">
                @foreach ($listProduct as $value)
                <div class="col-2 product-home">
                    <!-- ảnh sp -->
                    <div class="image-product--content-products">
                        @foreach ($value->images as $image)
                            <a href="{{route('user.product.detaiProduct',$value->id)}}"><img src="{{ asset($image->image_url) }} " alt="" width="100%"
                                height="100%"></a>
                        @endforeach
                        <div class="wrapper-action">
                            <div class="action--content-products d-flex align-items-center justify-content-between p-1">
                                <a class="icon__action btn btn-dark"><i class="fa-solid fa-magnifying-glass fa-xs"
                                        style="color: #dbdada;"></i></a>
                                <a class="add-to-car__actiont btn btn-danger me-2 ms-2" href="">Thêm vào giỏ</a>
                                <a class="icon__action btn btn-dark"><i class="fa-solid fa-share-nodes fa-xs"
                                        style="color: #cdc9c9;"></i></a>
                            </div>
                        </div>
                        <div class="d-flex text-white position">
                            <span class="discount bg-danger pe-2 ps-2 me-2">
                                -20%
                            </span>
                            <span class="new bg-success pe-2 ps-2">
                                New
                            </span>

                        </div>
                    </div>
                    <!-- tên -->
                    <h5 class="ms-2 name-product--content-products mt-3">
                       {{ $value->name }}
                    </h5>
                    <!-- giá, màu -->
                    <div class=" ms-2 info-prodcut--content-products">
                        <div class="price__info-prodcut me-2">
                            <strong class='text-danger'>  {{  number_format($value->price, 0, '.', '.') }} Vnđ</strong>
                            <del class='text-secondary'>{{  number_format($value->price, 0, '.', '.')  }} Vnđ</del>
                        </div>
                        <div class="color-product--content-products">
                            <div class="box__color-product me-2"></div>
                            <div class="box__color-product me-2"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{$listProduct->links('pagination::bootstrap-5')}}
            </div>

        </div>
    </div>
@endsection

@push('script')
@endpush
