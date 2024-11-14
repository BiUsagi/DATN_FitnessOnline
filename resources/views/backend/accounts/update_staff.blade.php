@extends('frontend/layouts/app-user')


@section('custom_css')
    <link rel="stylesheet" href="assets/frontend/css/info.css">
@endsection


@section('main')

   
<section>
     <!-- BREADCRUMB START HERE -->
     <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1>thông tin<span> tài khoản</span></h1>
                        <div class="trackPage">
                                    <a href="{{ route('index') }}">Trang Chủ</a>
                        <span>Thông tin tài khoản</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB END'S HERE -->
       
        <div class="col-9 bd-left ctiet-thongtin">
            <div class="row">
                <div class="col-12 ctiet-title">
                    <p>THAY ĐỔI MẬT KHẨU</p>
                    Quản lý thông tin hồ sơ để bảo mật tài khoản
                </div>
                <!-- thongtin -->
                <form action="index.php?tkh=thaydoimatkhau" method="post" enctype="multipart/form-data" class="row">
                    <div class="col-8">
                        <div class="mg-top row">
                            <label for="pass" class=" col-4 justify-content-end d-flex">Mật khẩu cũ:</label>
                            <input type="password" class="col-8 ctiet-input" name="pass" id="newpass" placeholder="Nhập mật khẩu hiện tại của bạn"
                                required>
                        </div>
                        <div class="mg-top row">
                            <label for="newpass" class=" col-4 justify-content-end d-flex">Mật khẩu mới:</label>
                            <input type="password" class="col-8 ctiet-input" name="newpass" id="newpass" placeholder="Nhập mật khẩu muốn đổi"
                                required>
                        </div>
                        <div class="mg-top row">
                            <label for="cfpass" class=" col-4 justify-content-end d-flex">Nhập lại mật khẩu:</label>
                            <input type="password" class="col-8 ctiet-input" name="cfpass" id="cfpass" placeholder="Nhập lại mật khẩu mới"
                                required>
                        </div>

                    </div>
                    <!-- END thong tin -->
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <div class="product__price-ranger-filter mg-top">
                                <input type="submit" name="doimatkhau" class="ctiet-button" value="Đổi mật khẩu">
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
        
</section>


@endsection