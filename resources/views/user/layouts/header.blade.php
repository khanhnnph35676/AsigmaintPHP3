<div class="container-full wrapper--top-header border-bottom">
    <div class="container">
        <div class="row top-header" style="height: 40px; align-items: center;">
            <div class="col-5">
                <div class="row" style="height: 40px;">
                    <div class="col-4 icon--top-header d-flex justify-content-around  pt-2">
                        <i class="fa-brands fa-facebook-f fa-lg" style="color: #000000;"></i>
                        <i class="fa-brands fa-twitter fa-lg" style="color: #000000;"></i>
                        <i class="fa-brands fa-youtube fa-lg" style="color: #000000;"></i>
                        <i class="fa-brands fa-instagram fa-lg" style="color: #000000;"></i>
                    </div>
                    <div class="col-4 phone--top-header border-start  pt-2">
                        <span>0961746082</span>
                    </div>
                    <div class="col-4 email-top--top-header border-start pt-2">
                        <span class="">khanhnnph35676@fpt.edu.vn</span>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-3">
                <div class="row" style="height: 40px;">
                    <div class="col-6 languages pt-2">
                        Vietnamese <i class="fa-solid fa-caret-up fa-rotate-180 fa-sm" style="color: #000000;"></i>
                    </div>
                    <div class="col-6 money border-start pt-2">
                        VNĐ <i class="fa-solid fa-caret-up fa-rotate-180 fa-sm" style="color: #000000;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row content-header mt-5">
        <div class="row" style="height: 50px;">
            <div class="col-3 d-flex justify-content-between">
                <a href="" class="pointer"> <i class="fa-solid fa-bars fa-lg" style="color: #000000;"></i>
                    Menu</a>
                <a href="" class="pointer">Women</a>
                <a href="" class="pointer"> Men</a>
            </div>
            <div class="col-2"></div>
            <a href="{{ route('user.homeProducts') }}" class="col-2" style="height: 50px;">
                <img class="mb-5 pointer" src="{{ asset('img/icon/image 40.png') }} "
                    alt="Ảnh logo trang web bán quần áo" width="230px">
            </a>
            <div class="col-3"></div>
            <div class="col-2 d-flex justify-content-around action">
                <i class="pointer fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                @if (session('mes'))
                    <div class="alert alert-dark alert-dismissible fade show message" role="alert">
                        {{ session('mes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="d-inline-flex gap-1">
                    <a data-bs-toggle="collapse" data-bs-target="#info" aria-expanded="false" aria-controls="info">
                        <i class="pointer fa-regular fa-user fa-lg" style="color: #000000;"></i>
                    </a>
                </p>
                <div class="collapse" id="info">
                    {{-- khi chưa đăng nhập thành công --}}
                    @if (empty(Auth::user()->name))
                        <div class="card card-body p-1 ps-0">
                            <ul class="p-2">
                                <li class="mt-3 ms-2 pe-5"><a href="{{ route('loginUser') }}">Đăng nhập
                                    </a></li>
                                <li class="mt-3 ms-2 pe-5"><a href="{{ route('registerUser') }}">
                                        Đăng ký
                                    </a></li>
                            </ul>
                        </div>
                    @endif
                    {{-- khi  đăng nhập thành công --}}
                    @if (isset(Auth::user()->name))
                        <div class="card card-body p-1 ps-0">
                            <ul class="p-2">
                                <li class="mt-2 pe-5"><a href="">
                                        <a href="#" class="wrapper-img-user d-flex gap-1">
                                            <img src="{{ asset('img/user/1722559877.png') }}"
                                                style=" object-fit: cover;" class="radius-50" alt="acount"
                                                width="70px" height="70px">
                                            <h5> {{ Auth::user()->name }}</h5>
                                        </a>

                                    </a></li>
                                <li class="mt-3 pe-5"><a href="#"><i class="fa-regular fa-circle-user fa-lg me-2"
                                            style="color: #000000;"></i>
                                        Hồ sơ
                                    </a></li>
                                <li class="mt-3 pe-5"><a href="#"><i class="fa-solid fa-gear fa-lg me-2"
                                            style="color: #000000;"></i></i>
                                        Cài đặt
                                    </a></li>
                                <li class="mt-3 pe-5"><a href="{{ route('logoutUser') }}"><i
                                            class="fa-solid fa-right-from-bracket fa-lg me-2"
                                            style="color: #000000;"></i>
                                        Đăng xuất
                                    </a></li>
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- khi đăng nhập thành công mới hiện cái dưới --}}
                {{-- những sản phẩm được yêu thích --}}
                <i class="pointer fa-regular fa-heart fa-lg" style="color: #000000;"></i>
                <!-- giỏ -->
                <a id="cart-btn">
                    <i class="pointer fa-solid fa-cart-shopping fa-lg" style="color: #000000;"></i>
                    <span>7</span>
                </a>
                <div class="cart-container" id="cart-container">
                    <div class="cart-header">
                        <h2>Giỏ hàng</h2>
                        <span class="close-btn" id="close-cart-btn">&times;</span>
                    </div>
                    <div class="cart-items">
                        <div class="cart-item">
                            <div class="item-info">
                                <img src="path/to/product-image.jpg" alt="Product Image">
                                <span>Product Name</span>
                            </div>
                            <span>$30.00</span>
                        </div>
                        <div class="cart-item">
                            <div class="item-info">
                                <img src="path/to/product-image.jpg" alt="Product Image">
                                <span>Product Name</span>
                            </div>
                            <span>$30.00</span>
                        </div>
                        <div class="cart-item">
                            <div class="item-info">
                                <img src="path/to/product-image.jpg" alt="Product Image">
                                <span>Product Name</span>
                            </div>
                            <span>$30.00</span>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <div class="total">
                            <span>Total:</span>
                            <span>$90.00</span>
                        </div>
                        <button class="btnth" id="thanhtoan">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
