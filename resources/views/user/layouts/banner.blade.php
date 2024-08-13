<!-- 1.1, Banner -->
<div class="banner mt-3 row">
    <div class="prd-women col-6 p-0">
        <div class="name-banner">
            <h1 class="font-size-shop">NEW ARRIVAL</h1>
            <h1 class="font-size-women">WOMEN</h1>
            <form action="{{ route('user.product.listProductsUser') }}">
                <button type="submit" class="btn-show-shop women-btn"><span></span>SHOP THIS LOOK</button>
            </form>
        </div>
        <a href="{{ route('user.product.listProductsUser') }}" class="wapper-img">
            <img src=" {{ asset('img/banner/banner1.png') }}" alt="Ảnh hàng mới về của nữ" class="img-shop-women"
                style="width: 100%;height: 100%;object-fit: cover">
        </a>
    </div>
    <div class="prd-men text-white p-0 col-6">
        <div class="name-banner">
            <h1 class="font-size-shop">NEW ARRIVAL</h1>
            <h1 class="font-size-men">MEN'S</h1>
            <form action="{{ route('user.product.listProductsUser') }}">
                <button type="submit" class="btn-show-shop men-btn"><span></span> SHOP THIS LOOK</button>
            </form>
        </div>
        <a href="{{ route('user.product.listProductsUser') }}" class="wapper-img">
            <img src=" {{ asset('img/banner/banner2.png') }}" alt="Ảnh hàng mới về của nữ" class="img-shop-men"
                style="width: 100%;height: 100%; object-fit: cover">
        </a>
    </div>
</div>
