@extends('backend/layouts/app-admin')

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
        <div class="">
            <p>Số tiền dư ví: <strong class="text-info">2.000.000 đ</strong></p>
        </div>

        <!-- Form gửi thông báo rút tiền -->
        <div class="withdraw-form">
            <form action="/withdraw" method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <label for="amount">Nhập số tiền muốn rút:</label>
                <input type="number" id="amount" name="amount" placeholder="Nhập số tiền" required>

                <label for="content">Nội dung:</label>
                <input type="text" id="content" name="content" placeholder="Nhập lý do rút tiền" required>

                <button type="submit" class="btn-submit">Gửi Yêu Cầu</button>
            </form>
        </div>

        <!-- Lưu ý về giao dịch -->
        <div class="note">
            <p><strong>Lưu ý:</strong> Giao dịch sẽ được thực hiện qua Zalo. Vui lòng liên hệ với chúng tôi qua Zalo để hoàn tất giao dịch.</p>
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
    </section>

</main>
<!-- End #main -->

@endsection