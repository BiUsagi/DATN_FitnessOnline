@extends('frontend/layouts/app-user')

@section('main')
<section>
    <!-- Template Main CSS File -->
    <link href="assets/backend/css/style.css" rel="stylesheet">
    <link href="assets/frontend/css/money.css" rel="stylesheet">


    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block min-vh-100 pt-5" style="z-index: 10;" id="list-form">

                <div class="col-12 col-md-7">
                    <div class="mt-5 mb-5">
                        <h2 class="text-warning text-center"><strong>NẠP TÀI KHOẢN</strong></h2>
                    </div>

                    <div class="row">
                        <!-- form1 -->
                        <form action="" id="form1" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header text-uppercase">Bước 1: Chọn mệnh giá</div>

                                <div class="card-body mt-3">
                                    <div class="row">
                                        <label for="code" class="form-label-customize">Chọn mệnh giá:</label>
                                        <div class="col-lg-3 col-sm-6 col-md-4 ">
                                            <div class="form-check">
                                                <input value="10000" class="form-check-input" type="radio" name="money"
                                                    id="money1" checked>
                                                <label class="form-check-label" for="money1">
                                                    10.000 vnđ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="20000" class="form-check-input" type="radio" name="money"
                                                    id="money2">
                                                <label class="form-check-label" for="money2">
                                                    20.000 vnđ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 ">
                                            <div class="form-check">
                                                <input value="50000" class="form-check-input" type="radio" name="money"
                                                    id="money3">
                                                <label class="form-check-label" for="money3">
                                                    50.000 vnđ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="100000" class="form-check-input" type="radio" name="money"
                                                    id="money4">
                                                <label class="form-check-label" for="money4">
                                                    100.000 vnđ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 ">
                                            <div class="form-check">
                                                <input value="200000" class="form-check-input" type="radio" name="money"
                                                    id="money5">
                                                <label class="form-check-label" for="money5">
                                                    200.000 vnđ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="500000" class="form-check-input" type="radio" name="money"
                                                    id="money6">
                                                <label class="form-check-label" for="money6">
                                                    500.000 vnđ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 ">
                                            <div class="form-check">
                                                <input value="1000000" class="form-check-input" type="radio"
                                                    name="money" id="money7">
                                                <label class="form-check-label" for="money7">
                                                    1.000.000 vnđ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="2000000" class="form-check-input" type="radio"
                                                    name="money" id="money8">
                                                <label class="form-check-label" for="money8">
                                                    2.000.000 vnđ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label for="content" class="form-label-customize">Nội dung <span
                                            class="note">(*)</span>:</label>
                                    <input type="text" class="form-control-customize" id="content" name="content"
                                        data_height="100"
                                        value="{{isset(Auth::user()->user_name) ? Auth::user()->user_name . ' chuyển tiền.' : 'Vui lòng đăng nhập'}}">
                                    <input type="submit" class="btn btn-outline-primary btn-add-exercise col-lg-12 mt-4"
                                        value="Lấy mã QR">
                                </div>
                            </div>
                        </form>


                        <!-- form2 -->
                        <form action="" id="form2" method="post" style="display:none;">
                            @csrf
                            <div class="card">
                                <div class="card-header text-uppercase">Bước 2: xác nhận</div>
                                <div class="row g-0">
                                    <div class="col-md-6 col-lg-4 text-center position-relative">
                                        <img src="assets/frontend/images/qr/qr2.jpg" class="img-fluid mx-auto my-3 img-qr"
                                            alt="QR Code">
                                    </div>
                                    <div class="col-md-6 col-lg-8 p-3">
                                        <hr>

                                        <p><strong>Mệnh giá: </strong><span id="menhgia"> </span> vnđ.</p>
                                        <p><strong>Nội dung: </strong><span id="noidung"> </span></p>
                                        <p><strong>Trạng thái:</strong> Đang đợi xử lý.</p>

                                        <input type="hidden" name="wallet_id" id="wallet_id">
                                        <input type="hidden" name="description" id="description">
                                        <input type="hidden" name="amount" id="amount">
                                        <input type="hidden" name="user_id" id="user_id">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <input type="button" class="btn btn-back mt-4 me-2" id="backform"
                                                value="Quay lại">
                                            <input type="submit" class="btn btn-submit mt-4" value="Gửi yêu cầu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- form 3 -->
                    <!-- <div class="card-body" style="z-index: 10;">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">lịch sử nạp</h5>
                        </div>

                        <table class="table datatable">
                            <thead class="text-white">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Tiêu đề</th>
                                    <th>Tóm tắt</th>
                                    <th>Hình ảnh</th>
                                    <th>Nội dung</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
0205

                            <tbody class="show-data">
            
                            </tbody>
                        </table>
                    </div> -->

                </div>
            </div>
        </div>
    </div>


</section>
<script>
    get_wallet_id();


    // Khi nhấn nút submit của form1
    $('#form1').on('submit', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi submit mặc định

        // Lấy dữ liệu từ form1
        var data1 = $(this).find('input[name="content"]').val();
        var data2 = $(this).find('input[name="money"]:checked').val();
        var formattedAmount = Number(data2).toLocaleString('vi-VN');

        // console.log(data1)
        // console.log(data2)

        // Đặt giá trị vào input của form2
        $('#menhgia').html(formattedAmount);
        $('#noidung').html(data1);
        $('#description').val(data1);
        $('#amount').val(data2);

        // Ẩn form1 và hiển thị form2
        $('#form1').hide();
        $('#form2').show();
    });


    $('#backform').on('click', function (event) {
        $('#form2').hide();
        $('#form1').show();
    });



    function get_wallet_id() {
        var wid = '';
        @if (Auth::check())
            var userId = @json(Auth::user()->id);
            $.get('http://127.0.0.1:8000/api/web/wallets/' + userId, function (res) {
                wid = res.id;
                uid = res.user_id;
                $('#wallet_id').val(wid);
                $('#user_id').val(uid);
            });
        @endif
    };


    $(document).ready(function () {
        $('#form2').on('submit', function (ev) {
            ev.preventDefault();
            let addform = $(this).serialize();
            // console.log(addform);
            $.post('http://127.0.0.1:8000/api/web/requestbill', addform, function (re) {
                // Swal.fire({
                //     title: "Thành công!",
                //     text: "Thêm Voucher thành công!",
                //     icon: "success"
                // });
                let data = re;

                $('#form2').hide();
                $('#form1').show();
                alert('Thành công. Mã giao dịch của bạn là: ' + data.transaction_id);

            });
        })
    });



</script>

@endsection