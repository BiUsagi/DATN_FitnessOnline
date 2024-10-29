@extends('frontend/layouts/app-user')

@section('main')
<section>
    <!-- Template Main CSS File -->
    <link href="assets/backend/css/style.css" rel="stylesheet">





    <div class="breadcrumb_wrapper">
        <div class="container">

            <div class="breadcrumb_block min-vh-100 pt-5" style="z-index: 10;">





                <!-- <div class="col-12 col-md-7">
                    <div class="mt-5 mb-5">
                        <h2 class="text-warning text-center"><strong>NẠP TÀI KHOẢN</strong></h2>
                    </div>

                    <form action="" id="addvoucher" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header text-uppercase">Thông tin nạp tài khoản</div>

                            <div class="card-body mt-3">
                                <div class="row">
                                    <label for="code" class="form-label-customize">Chọn mệnh giá:</label>
                                    <div class="col-lg-3 col-sm-6 col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money1"
                                                checked>
                                            <label class="form-check-label" for="money1">
                                                10.000 vnđ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money2">
                                            <label class="form-check-label" for="money2">
                                                20.000 vnđ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money3">
                                            <label class="form-check-label" for="money3">
                                                50.000 vnđ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money4">
                                            <label class="form-check-label" for="money4">
                                                100.000 vnđ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money5">
                                            <label class="form-check-label" for="money5">
                                                200.000 vnđ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money6">
                                            <label class="form-check-label" for="money6">
                                                500.000 vnđ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money7">
                                            <label class="form-check-label" for="money7">
                                                1.000.000 vnđ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money" id="money8">
                                            <label class="form-check-label" for="money8">
                                                2.000.000 vnđ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card-body">
                                <label for="code" class="form-label-customize">Nội dung <span
                                        class="note">(*)</span>:</label>
                                <input type="text" class="form-control-customize" id="code" name="code"
                                    data_height="100"
                                    value="{{isset(Auth::user()->user_name) ? Auth::user()->user_name . ' chuyển tiền.' : 'Vui lòng đăng nhập'}}">
                                <input type="submit" class="btn btn-outline-primary btn-add-exercise col-lg-12 mt-4"
                                    value="Lấy mã QR">
                            </div>


                        </div>
                    </form>

       
                </div> -->


                <div class="col-12 col-md-7">
                    <div class="mt-5 mb-5">
                        <h2 class="text-warning text-center"><strong>NẠP TÀI KHOẢN</strong></h2>
                    </div>

                    <form action="" id="addvoucher" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header text-uppercase">Thông tin nạp tài khoản</div>
                            <div class="row">
                                <div class="col-5 col-md-4 m-3 ms-5">
                                    <img src="assets/frontend/images/qr/qr2.jpg" class="img-fluid mx-auto d-block m-3">
                                </div>
                                <div class="col-7 mt-5">
                                    <p><strong>Mệnh giá:</strong> 500.000 vnđ.</p>
                                    <p><strong>Nội dung:</strong> Trương Quang Hữu chuyển khoản.</p>
                                    <p><strong>Trạng thái:</strong> Đang đợi xử lý.</p>
                                    <!-- <i>
                                        <small>
                                            <p class="text-info">
                                                Thời gian đợi có thể lên đến 1 giờ tới 3 giờ. <br> Cảm ơn quý khách đã sử dụng dịch vụ.
                                            </p>
                                        </small>
                                    </i> -->
                                    <input type="submit" class="btn btn-primary btn-add-exercise col-lg-12 mt-4 w-25"
                                    value="Kiểm tra">
                                </div>
                                
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>

</section>

@endsection