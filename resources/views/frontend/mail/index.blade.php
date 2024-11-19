<!DOCTYPE html>
<html>
<head>
    <title>Thank You Email</title>
</head>
<body>
    <h1>Xin chào {{ $m_user_name }},</h1>
    <p>Chúng tôi xin cảm ơn bạn đã mua gói tập <strong>{{ $m_workout_package_name }}</strong>.</p>
    <p>Thông tin chi tiết:</p>
    <ul>
        <li><strong>Tên gói tập:</strong> {{ $m_workout_package_name }}</li>
        <li><strong>Số tiền:</strong> {{ number_format($m_amount) }} đ</li>
    </ul>
    <hr>
    <h2>Thông tin thanh toán</h2>
    <ul>
        <li><strong>Ngân hàng:</strong> {{ $vnp_BankCode }}</li>
        <li><strong>Mã giao dịch:</strong> {{ $vnp_TransactionNo }}</li>
        <li><strong>Thời gian thanh toán:</strong> {{ $vnp_PayDate }}</li>
    </ul>
    <!-- <p>Chúc bạn có những buổi tập hiệu quả!</p>
    <p>Trân trọng,<br>Đội ngũ hỗ trợ của chúng tôi</p>  -->
</body>
</html>
