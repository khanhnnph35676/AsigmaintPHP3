<div class="header row" id="bg-header">
    <div class="col-7 wrapper-input">
        <input type="text" class="form-control custom-input" placeholder="Nhập để tìm kiếm">
        <button class="search">
            <i class="fa-solid fa-magnifying-glass fa-lg iii"></i>
        </button>
    </div>

    <div class="col-2">

    </div>
    <div class="col-1 mes pointer">
        <i class="fa-solid fa-qrcode fa-xl" ></i>
        <div class="wrapper-mes">
            <i class="fa-regular fa-bell fa-xl"></i>
            <span id="message" >7</span>
        </div>
    </div>
    <div class="col-2 pointer acount pt-3 ">
        <p>
            <button class="d-flex gap-2 align-items-center" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <div class="wrapper-img-acount">
                    <img class="img" src="../img/z5533290989838_3283c606f6b74265ed464db5791b7472.jpg" width="100%"
                        height="100%" alt="">
                </div>
                <div class="wrapper-acount">
                    <span class="fw-bold">Tên admin</span> <br>
                    <span> Nhà thiết kế web</span>
                </div>
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <svg width="40" height="40" viewBox="0 0 200 200" class="polygon">
                    <polygon points="100,90 50,150 150,150" fill="rgba(0, 0, 0, 0.554)" />
                </svg>
                <div class="information">
                    <ul class="p-0">
                        <li><a href=""><i class="fa-regular fa-user fa-lg me-2" style="color: #dedede;"></i>
                                Profile</a></li>
                        <li><a href=""><i class="fa-solid fa-gear fa-lg me-2" style="color: #dedede;"></i>
                                Settings</a></li>
                        <li><a href="{{ route('logout')}}"><i class="fa-solid fa-right-from-bracket fa-lg me-2"
                                    style="color: #dedede;"></i>
                                Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
