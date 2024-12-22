<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="assets/frontend/css/endpay.css">
</head>

<body>
    <?php
// require_once("./config.php");
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, env('vnp_HashSecret'));
        ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">HÓA ĐƠN THANH TOÁN</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi:</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate'] ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:green'>GD Thanh cong</span>";
                                echo "<script type='text/javascript'>
                                        // Đảm bảo mã JavaScript chỉ chạy sau khi tài liệu đã tải xong
                                        $(document).ready(function() {
                                            addOrder(); // Gọi hàm tạo đơn hàng
                                        });
                                    </script>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                    ?>

                </label>
            </div>
            <button id="btn-id" value="<?php
                $data = Cache::get('order_data');
                echo $data['workout_package_id'];
            ?>" onclick="back()">Quay lại</button>

            <input type="hidden" id="user_id" value="<?php
                $data = Cache::get('order_data');
                echo $data['user_id'];
            ?>">
            <input type="hidden" id="workout_package_name" value="<?php
                $data = Cache::get('order_data');
                echo $data['workout_package_name'];
            ?>">
            <input type="hidden" id="staff_name" value="<?php
                $data = Cache::get('order_data');
                echo $data['staff_name'];
            ?>">
            <input type="hidden" id="staff_uid" value="<?php
                $data = Cache::get('order_data');
                echo $data['staff_uid'];
            ?>">
            <input type="hidden" id="user_name" value="<?php
                $data = Cache::get('order_data');
                echo $data['user_name'];
            ?>">

        </div>
        <p>
            &nbsp;
        </p>
        
    </div>
</body>

</html>

<script type='text/javascript'>
    function addOrder() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/web/pay', // URL API
            type: 'POST',
            success: function (res) {
                // Kiểm tra nếu có lỗi trong phản hồi
                if (res.error) {
                    console.log(res.error);
                } else {
                    console.log(res.message);
                }

                if(res.message == 'Tạo đơn hàng thành công'){
                    //them thong bao
                
                    let w_id = $('#btn-id').val();
                    let user_id = $('#user_id').val();
                    let workout_package_name = $('#workout_package_name').val();
                    let staff_uid = $('#staff_uid').val();
                    let user_name = $('#user_name').val();


                    //them thong bao cho user

                    const notificationData = {
                        user_id: user_id,
                        message: "Bạn đã mua gói <strong class='text-primary'>" + workout_package_name + "</strong> thành công.",
                        type: 2,
                        link: "/workout_detail/" + w_id
                    };

                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/web/add-notification',
                        method: 'POST',
                        data: JSON.stringify(notificationData), // Chuyển đổi dữ liệu thành chuỗi JSON
                        contentType: 'application/json',        // Định dạng nội dung là JSON
                        dataType: 'json',                       // Kiểu dữ liệu mong đợi trả về
                    });


                    //them thong bao cho staff

                    const notificationDataStaff = {
                        user_id: staff_uid,
                        message: "<strong class='text-primary'>" + user_name + "</strong> đã mua gói <strong class='text-primary'>" + workout_package_name + "</strong> của bạn.",
                        type: 1,
                        link: "/workout_detail/" + w_id
                    };

                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/web/add-notification',
                        method: 'POST',
                        data: JSON.stringify(notificationDataStaff), // Chuyển đổi dữ liệu thành chuỗi JSON
                        contentType: 'application/json',        // Định dạng nội dung là JSON
                        dataType: 'json',                       // Kiểu dữ liệu mong đợi trả về
                    });
                }

                

            },
        });
    }

    function back() {
        let id = $('#btn-id').val();
        if (id) {
            // Điều hướng đến URL mới
            window.location.href = '/workout_detail/' + id;
        } else {
            console.log('ID không hợp lệ');
        }
    }
</script>