
    <h1 class="ms-2"> <a href="">Admin</a> </h1>
    <hr>
    <ul class="p-0">
        <li class="menu">
            <div class="wrapepr-icon pt-2 pb-2">
                <i class="fa-solid fa-house fa-lg" style="color: #dedede;"></i>
                <span class="ms-2">Bảng điều khiển </span>
            </div>
            <i class="fa-solid fa-angle-left fa-sm rotate" style="color: #dedede;"></i>
        </li>
        <ul class="menu-content fs-4 mt-1">
            <li class="fs-6 p-1"> <a href=" {{ route('admin.') }} "> <i class="fa-solid fa-cart-shopping fa-lg me-2"
                        style="color: #dedede;"></i>
                    Thương mại điện tử </a></li>
            <li class="fs-6 p-1"> <a href=""> <i class="fa-solid fa-chart-simple fa-lg me-2"
                        style="color: #dedede;"></i>
                    Analytics </a></li>
        </ul>
        <li class="menu">
            <div class="wraper-icon pt-2 pb-2">
                <i class="fa-solid fa-qrcode fa-xl" style="color: #dedede;"></i>
                <span class="ms-2">Ứng dụng</span>
            </div>
            <i class="fa-solid fa-angle-left fa-sm rotate" style="color: #dedede;"></i>
        </li>
        <ul class="menu-content fs-4 mt-1">
            <li class="fs-6 p-1"> <a href=""> <i class="fa-regular fa-envelope fa-lg me-2"
                        style="color: #dedede;"></i>Email </a></li>
            <li class="fs-6 p-1"> <a href=""> <i class="fa-regular fa-comment fa-lg me-2"
                        style="color: #dedede;"></i>
                    Chat Box </a></li>
            <li class="fs-6 p-1"> <a href=""> <i class="fa-regular fa-id-badge fa-lg me-2"
                        style="color: #dedede;"></i>
                    Contact List </a> </li>
        </ul>
    </ul>
    <h6 class="ms-2">THAO TÁC</h6>
    <ul class="p-0">
        <li class="menu">
            <div class="wraper-icon pt-2 pb-2">
                <i class="fa-solid fa-shop fa-lg" style="color: #dedede;"></i>
                <span class="ms-2">Sản phẩm</span>
            </div>
            <i class="fa-solid fa-angle-left fa-sm rotate" style="color: #dedede;"></i>
        </li>
        <ul class="menu-content fs-4 mt-1">
            <li class="fs-6 p-1"> <a href="{{ route('admin.products.listProducts') }}"> <i class="fa-solid fa-layer-group fa-lg me-2"
                        style="color: #dedede;"></i>Danh sách sản phẩm </a></li>
            <li class="fs-6 p-1"> <a href=""> <i class="fa-brands fa-product-hunt fa-lg me-2"
                        style="color: #dedede;"></i>
                    Chi tiết sản phẩm </a></li>
            <li class="fs-6 p-1"> <a href="{{ route('admin.categories.listCategories') }}"> <i class="fa-solid fa-folder-open fa-lg me-2"
                        style="color: #dedede;"></i>
                    Danh mục sản phẩm</a></li>
        </ul>
        <li class="menu">
            <div class="wraper-icon pt-2 pb-2">
                <i class="fa-solid fa-qrcode fa-xl" style="color: #dedede;"></i>
                <span class="ms-2">Quản lý tài khoản</span>
            </div>
            <i class="fa-solid fa-angle-left fa-sm rotate" style="color: #dedede;"></i>
        </li>
        <ul class="menu-content fs-4 mt-1">
            <li class="fs-6 p-1"> <a href=""> Thành viên</a></li>
            <li class="fs-6 p-1"> <a href=""> Khách hàng</a></li>
            <li class="fs-6 p-1"> <a href="{{ route('admin.users.listUsers') }}"> Tổng tài khoản </a></li>
        </ul>
    </ul>

    <h6 class="ms-2">BIỂU ĐỒ & BẢNG</h6>
