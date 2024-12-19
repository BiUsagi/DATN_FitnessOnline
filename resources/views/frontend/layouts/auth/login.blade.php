<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/frontend/css/login.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="logo/icon_title-removebg.png">

    <link rel="stylesheet" href="assets/frontend/css/style.css">
    {{-- <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/app.css'> --}}

    <script src="assets/frontend/js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='assets/frontend/js/main.js'></script>
</head>

<body>
    {{-- <div class="page_loader">
        <img loading='lazy' src="assets/frontend/images/loader.svg" alt="img">
    </div> --}}

    <div class="container-custom">
        <div class="wrapper">
            <span class="icon-close">
                <a href="/"><i class="bi bi-x"></i></a>
            </span>
            <!-- đăng nhập -->
            <div class="form-box login">
                <h2>Đăng Nhập</h2>
                <form id="loginForm" action="{{ route('login_.index') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="redirect_url" value="{{ request()->query('redirect_url') }}">


                    <!-- email -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="text" name="email" id="email" placeholder=" ">
                        <label>Email</label>
                        <p class="errors email-error1" id="ketqua"></p>
                    </div>
                    <!-- password -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="login-icon-password"></i>
                        </span>
                        <input type="password" name="password" id="password-input-login" placeholder=" ">
                        <label>Password</label>
                        <p class="errors password-error1"></p>
                    </div>
                    <!-- nhớ pass -->
                    <div class="remember-forgot">
                        <a href="">Quên mật khẩu</a>
                    </div>
                    <button type="submit" class="btn">Đăng Nhập</button>
                    <div class="login-register">
                        <p>Bạn chưa có tài khoản ? <a class="register-link"> Đăng Ký</a></p>
                    </div>

                </form>
            </div>

            <!-- đăng ký -->
            <div class="form-box register">
                <h2>Đăng Ký</h2>
                <form id="registerForm" action="{{ route('register.index') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- Họ tên -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="user_name" id="name" placeholder=" ">
                        <p class="errors1 user-name-error"></p>
                        <label>Họ và tên</label>
                    </div>
                    <!-- Email -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email1" id="email1" placeholder=" ">
                        <p class="errors1 email-error"></p>
                        <label>Email</label>
                    </div>
                    <!-- Mật khẩu -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="register-icon-password"></i>
                        </span>
                        <input type="password" name="password1" id="password-input-register" placeholder=" ">
                        <p class="errors1 password-error"></p>
                        <label>Mật khẩu</label>
                    </div>
                    <!-- Nhập lại mật khẩu -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="register-icon-password2"></i>
                        </span>
                        <input type="password" name="password1_confirmation" id="password-input-register2"
                            placeholder=" ">
                        <p class="errors1 password-confirmation-error"></p>
                        <label>Nhập lại mật khẩu</label>
                    </div>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản ? <a class="login-link"> Đăng nhập</a></p>
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                    <div id="ketqua1"></div>

                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $("#loginForm").submit(function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của form

                var email = $("#email").val();
                var password = $("#password-input-login").val(); // Đảm bảo ID chính xác cho trường mật khẩu
                var token = $('meta[name="csrf-token"]').attr('content');
                var currentUrl = $("input[name='redirect_url']").val();

                // console.log('Current URL:', currentUrl);

                $.post("{{ route('login_.index') }}", {
                    _token: token,
                    email: email,
                    password: password,
                    redirect_url: currentUrl // Gửi URL hiện tại
                }, function(data) {
                    // window.location.href = "";
                    if (data.success) {
                        // Điều hướng người dùng về trang ban đầu
                        window.location.href = data.redirect_url;
                        console.log('Current URL:', currentUrl);

                    } else {
                        // Xử lý thông báo lỗi nếu có
                        $("#ketqua").text(data.message);
                    }

                    // Xóa các thông báo lỗi trước đó
                    $(".errors").text('');
                    $("#ketqua").html(data.message);
                }).fail(function(xhr) {
                    // Xóa các thông báo lỗi trước đó
                    $(".email-error").text('');
                    $(".password-error").text('');
                    $(".errors").text(''); // Xóa lỗi tổng quát
                    var message = xhr.responseJSON ? xhr.responseJSON.message :
                        'Đã xảy ra lỗi. Vui lòng thử lại.';
                    var errors = xhr.responseJSON ? xhr.responseJSON.errors : {};

                    // Kiểm tra xem xhr.responseJSON có tồn tại và chứa errors không
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;

                        if (errors.email) {
                            $(".email-error1").text(errors.email[0]);
                        }
                        if (errors.password) {
                            $(".password-error1").text(errors.password[0]);
                        }
                    } else {
                        $("#ketqua").text(message);
                    }
                });
            });

            $("#registerForm").submit(function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của form

                var name = $("#name").val();
                var email = $("#email1").val();
                var password = $("#password-input-register").val();
                var password_confirmation = $("#password-input-register2").val();
                var token = $('meta[name="csrf-token"]').attr('content');


                $.post("{{ route('register.index') }}", {
                    _token: token,
                    email1: email,
                    user_name: name,
                    password1: password,
                    password1_confirmation: password_confirmation
                }, function(data) {
                    window.location.href = "{{ route('otp.index') }}";
                    $(".errors1").text('');
                    $("#ketqua1").html(data.message); // Hiển thị thông báo từ server
                }).fail(function(xhr) {
                    $(".errors1").text('');
                    var message = xhr.responseJSON ? xhr.responseJSON.message :
                        'Đã xảy ra lỗi. Vui lòng thử lại.';
                    var errors = xhr.responseJSON ? xhr.responseJSON.errors : {};


                    // Kiểm tra xem xhr.responseJSON có tồn tại và chứa errors không
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;

                        if (errors.user_name) {
                            $(".user-name-error").text(errors.user_name[0]);
                        }
                        if (errors.email1) {
                            $(".email-error").text(errors.email1[0]);
                        }
                        if (errors.password1) {
                            $(".password-error").text(errors.password1[0]);
                        }
                        if (errors.password1_confirmation) {
                            $(".password-confirmation-error").text(errors.password1_confirmation[
                            0]);
                        }
                    } else {
                        $(".errors1").text('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            });
        });
    </script>
</body>

</html>
