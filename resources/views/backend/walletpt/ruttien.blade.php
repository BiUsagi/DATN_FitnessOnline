@extends('backend/layouts/app-admin')
@section('custom_css')
<link rel="stylesheet" href="assets/frontend/css/ruttien.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('main')
<main id="main" class="main">

    <!-- <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div> -->

    <section class="section dashboard">
        <div class="withdraw-container">
            <div class="withdraw-box">
                <!-- Tiêu đề trang -->
                <h1 class="withdraw-title">Rút Tiền</h1>

                <!-- Thông tin số tiền rút -->
                <div class="money">
                    <p>Số dư của bạn: <strong class="text-info" id="sodu1"></strong></p>
                </div>

                <!-- input so du -->
                <input type="hidden" id="sodu" value="">

                <!-- Form gửi thông báo rút tiền -->
                <div class="withdraw-form">
                    <form action="" method="POST" id="form">
                        @csrf
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="wallet_id" value="<?php echo $wallet ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                        <label for="amount">Nhập số tiền muốn rút:</label>
                        <input type="number" id="amount" name="amount" placeholder="Nhập số tiền" value="" required>

                        <label for="description">Nội dung:</label>
                        <input type="text" id="description" name="description" placeholder="Nhập lý do rút tiền"
                            value="<?php echo $user_name ?> yêu cầu rút tiền." disabled>
                        <input type="hidden" id="description" name="description" placeholder="Nhập lý do rút tiền"
                            value="<?php echo $user_name ?> yêu cầu rút tiền.">

                        <div class="text-danger mt-0 mb-3"><strong id="thongbao"></strong></div>

                        <button type="submit" class="btn-submit" id="input-sm">Gửi Yêu Cầu</button>
                    </form>
                </div>

                <!-- Lưu ý về giao dịch -->
                <div class="note">
                    <p><strong>Lưu ý(*):</strong> Giao dịch sẽ được thực hiện qua Zalo. Vui lòng liên hệ với chúng tôi
                        qua
                        Zalo để hoàn tất giao dịch.</p>
                </div>

                <!-- Liên hệ Zalo -->
                <div class="contact-zalo">
                    <a href="https://zalo.me/0123456789" target="_blank">
                        <i class="bi bi-chat"></i>
                        <span>Liên hệ Zalo: <strong>0123456789</strong></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="zaloModal" tabindex="-1" aria-labelledby="zaloModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="zaloModalLabel">Thông Báo Quan Trọng</h5>
                    </div> -->
                    <div class="modal-body d-flex">
                        <!-- Bên trái: Mã QR Zalo -->
                        <div class="qr-code-container" style="width: 50%; padding-right: 20px;">
                            <img src="assets/frontend/images/qr/zalo.png" alt="QR Zalo" class="img-fluid">
                            <p class="text-center mt-2"><strong>Quét mã QR để liên hệ với Admin qua Zalo</strong></p>
                            <div>Mã Giao Dịch: <strong class="text-danger" id="magiaodich"></strong></div>

                        </div>

                        <!-- Bên phải: Lưu ý -->
                        <div class="note-container" style="width: 50%; padding-left: 20px;">
                            <p><strong>Vui lòng chú ý:</strong></p>
                            <p>
                                Để thực hiện giao dịch, chúng tôi yêu cầu bạn phải <span class="text-danger">liên hệ trực tiếp với admin qua Zalo</span>.
                                Đây là bước <span class="text-danger"> bắt buộc </span> nhằm đảm bảo mọi giao dịch được thực hiện một cách nhanh chóng và
                                chính xác.
                            </p>
                            <p>
                                Khi nhắn tin cho admin, vui lòng cung cấp <span class="text-danger"> mã giao dịch </span> của bạn và đợi
                                phản hồi. Chúng tôi sẽ hướng dẫn bạn tiếp theo để hoàn tất giao dịch một cách thuận lợi
                                nhất. Cảm ơn bạn đã hợp tác!
                            </p>
                            <p><strong>Chú ý:</strong> Nếu bạn không thể liên hệ qua Zalo, vui lòng kiểm tra lại thông
                                tin hoặc thử lại sau.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</main>
<!-- End #main -->

<script>


    const sotienInput = document.getElementById('amount');
    const soduInput = document.getElementById('sodu');
    const thongbao = document.getElementById('thongbao');
    const inputsm = document.getElementById('input-sm');
    const zaloModal = new bootstrap.Modal(document.getElementById('zaloModal'));



    capnhatsodu();



    // Lắng nghe sự kiện input
    sotienInput.addEventListener('input', function () {

        const sotien = parseFloat(sotienInput.value) || 0; // Giá trị nhập vào (0 nếu rỗng)
        const sodu = parseFloat(soduInput.value);

        if (sotien > sodu) {
            thongbao.textContent = 'Số dư không đủ.';
            inputsm.disabled = true;
        } else if (sotien < 5000) {
            thongbao.textContent = 'Yêu cầu rút tối thiểu 5.000 VNĐ';
            inputsm.disabled = true;
        } else {
            thongbao.textContent = '';
            inputsm.disabled = false;
        }
    });

    inputsm.addEventListener('click', function (event) {
    })


    $(document).ready(function () {
        $('#form').on('submit', function (ev) {
            ev.preventDefault();
            let addform = $(this).serialize();

            $.post('http://127.0.0.1:8000/api/web/requestbill', addform, function (re) {

                let data = re;
                // alert('Thành công. Mã giao dịch của bạn là: ' + data.transaction_id);
                $('#magiaodich').text(data.transaction_id);
                capnhatsodu();
                zaloModal.show();

            });
        })
    });

    function capnhatsodu() {
        var userId = @json(Auth::user()->id);
        $.get('http://127.0.0.1:8000/api/web/walletsbyuser/' + userId, function (re) {
            let data = re;
            let formattedBalance = Number(data.balance).toLocaleString('vi-VN') + ' VNĐ';
            $('#amount').val(data.balance);
            $('#sodu').val(data.balance);
            $('#sodu1').text(formattedBalance);

            let inputNT = $('#amount').val();
            if (inputNT < 5000) {
                thongbao.textContent = 'Yêu cầu rút tối thiểu 5.000 VNĐ';
                inputsm.disabled = true;
            };
        });
    }


</script>

@endsection