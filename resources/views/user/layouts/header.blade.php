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
                    @if (isset(Auth::user()->name))
                        @if (Auth::user()->id === $cart->user_id)
                            <span>{{ count($cart->cart_details) }}</span>
                        @endif
                    @endif
                </a>
                @if (isset(Auth::user()->name))
                    @if (Auth::user()->id === $cart->user_id)
                        <div class="cart-container" id="cart-container">
                            <form action="">
                                <div class="cart-header">
                                    <h2>Giỏ hàng</h2>
                                    <span class="close-btn" id="close-cart-btn">&times;</span>
                                </div>
                                <div class="cart-items">
                                    @php
                                        $tongTien = 0;
                                    @endphp
                                    @foreach ($cart->cart_details as $key => $value)
                                        <div class="cart-item">
                                            <div class="item-info">
                                                <div class="d-flex align-items-center gap-1">
                                                    @foreach ($value->product->images as $image)
                                                        @if ($image->image_type == 'main')
                                                            <img src="{{ asset($image->image_url) }}"
                                                                alt="Product Image" width="50" height="50"
                                                                style="object-fit: cover;">
                                                        @endif
                                                    @endforeach
                                                    <div class="wrapper-input" style="width:50px;height:20px">
                                                        <input type="number" value="{{ $value->quantity }}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <span>{{ $value->product->name }} </span>
                                            </div>
                                            <span><strong>
                                                    @php
                                                        $thanhTien =
                                                            intval($value->product->price) * intval($value->quantity);
                                                        $tongTien += $thanhTien;
                                                        echo number_format($thanhTien, 0, '.', '.') . 'đ';
                                                    @endphp </strong></span>
                                            <div class="d-flex gap-1">
                                                <a href="" class="btn btn border"><i
                                                        class="fa-regular fa-pen-to-square fa-sm"
                                                        style="color: #000000;"></i></a>
                                                <a href="" class="btn btn border"><i
                                                        class="fa-regular fa-trash-can fa-sm"
                                                        style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="cart-footer">
                                    <div class="total">
                                        <span>Tổng tiền: </span>
                                        <span> @php echo number_format($tongTien, 0, '.', '.')  .'đ' @endphp</span>
                                    </div>
                                    <a href="{{ route('user.viewCart') }}" class="btn btn mt-3">Xem chi tiết</a>
                                    <button class="btnth" id="thanhtoan">Thanh toán ngay</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @if (Auth::user()->id != $cart->user_id)
                        <div class="cart-container" id="cart-container">
                            <div class="cart-header">
                                <h2>Giỏ hàng</h2>
                                <span class="close-btn" id="close-cart-btn">&times;</span>
                            </div>
                            <div class="cart-items">
                                <div class="cart-item">
                                    <div class="item-info">
                                        <div class="d-flex align-items-center gap-1">
                                            Giỏ hàng bạn trống
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-footer">
                                <div class="total">
                                    <span>Tổng tiền: </span>
                                    <span> 0đ</span>
                                </div>
                                {{-- <a href="{{ route('user.viewCart') }}" class="btn btn mt-3">Xem chi tiết</a> --}}
                                <button class="btnth" id="thanhtoan">Thanh toán ngay</button>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="cart-container" id="cart-container">
                        <div class="cart-header">
                            <h2>Giỏ hàng</h2>
                            <span class="close-btn" id="close-cart-btn">&times;</span>
                        </div>
                        <div class="cart-items">
                            <div class="cart-item">
                                <div class="item-info">
                                    <div class="d-flex align-items-center gap-1">
                                        Giỏ hàng bạn trống
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-footer">
                            <div class="total">
                                <span>Tổng tiền: </span>
                                <span> 0đ</span>
                            </div>
                            {{-- <a href="{{ route('user.viewCart') }}" class="btn btn mt-3">Xem chi tiết</a> --}}
                            <button class="btnth" id="thanhtoan">Thanh toán ngay</button>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
