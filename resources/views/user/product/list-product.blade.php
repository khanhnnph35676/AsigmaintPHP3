@extends('user.layouts.default')

@push('styleProduct')

@endpush
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
    .form-search{
        position: relative;
    }
    .btn-search{
        position: absolute;
        right: 0;
        top: 0;
        margin-top:30px;
    }
</style>

@section('content')
    <div class="prds-home ms-5 me-5">
        <div class="heading-products mb-2">
          <span class="fs-2"><a href="{{route('user.homeProducts')}}">Trang chủ |</a></span>
          <span class="fs-5">Trang sản phẩm</span>

        </div>
        <div class="row">
            <div class="col-2 border pt-3">
                <h3>Lọc sản phẩm</h3>
                <hr>
                <form action="{{route('user.product.searchCategory')}}" class="mt-3" method="POST">
                    @csrf
                    <label for="">Tìm theo danh mục</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn border mt-2">Tìm kiếm</button>
                </form>
                <form action="{{route('user.product.searchProduct')}}" class="mt-3 form-search" method="POST">
                    @csrf
                    <label for="">Tìm theo tên:</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" name='name_search' class="form-control">
                    <button type="submit" class="btn btn btn-search"><i class="pointer fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i></button>
                </form>
            </div>
            <div class="content-products col-10 border-top pt-3">
                <div class="row d-flex">
                    @foreach ($listProduct as $value)
                    <div class="col-3 mt-4">
                        <!-- ảnh sp -->
                        <div class="image-product--content-products product-home">
                            @foreach ($value->images as $image)
                                @if ($image->image_type == 'main')
                                <a href="{{route('user.product.detaiProduct',$value->id)}}"><img src="{{ asset($image->image_url) }} " alt="" width="100%"
                                    height="80%"></a>
                                @endif
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
                        <h5 class=" ms-2 name-product--content-products mt-3">
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
    </div>
@endsection

@push('scriptProduct')
@endpush
