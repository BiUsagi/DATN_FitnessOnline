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
                    <input type="submit" class="btn btn-primary btn-add-exercise col-lg-12 mt-4 w-25" value="Kiểm tra">
                </div>

            </div>
        </div>
    </form>


</div>