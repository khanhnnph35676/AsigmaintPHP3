 @extends('user.layouts.default')

@push('style')

@endpush


 @section('content')

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
     <div class="heading-products mb-3">
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
             <div class="col-2 product-home">
                 <!-- ảnh sp -->
                 <div class="image-product--content-products">
                     <a href=""><img src="{{ asset('img/prd/sp1.png') }} " alt="" width="100%"
                             height="100%"></a>
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
                     Áo phông nữ
                 </h5>
                 <!-- giá, màu -->
                 <div class=" ms-2 info-prodcut--content-products">
                     <div class="price__info-prodcut me-2">
                         <strong>300.000 Vnđ</strong>
                         <del>500.000 Vnđ</del>
                     </div>
                     <div class="color-product--content-products">
                         <div class="box__color-product me-2"></div>
                         <div class="box__color-product me-2"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection

 @push('script')

@endpush
