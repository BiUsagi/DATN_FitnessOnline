<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="assets/frontend/css/style.css">
</head>

<body>

    <!-- form login register -->
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

                <!-- email -->
                <div class="input-box">
                    <span class="icon">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="text" name="email" id="email" placeholder=" ">
                    <label>Email</label>
                    <p class="errors" id="email-error">
                        @error('email')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <!-- password -->
                <div class="input-box">
                    <span class="icon">
                        <i class="bi bi-eye-fill" id="login-icon-password"></i>
                    </span>
                    <input type="password" name="password" id="password-input-login" placeholder=" ">
                    <p class="errors" id="password-error">
                        @error('password')
                            {{$message}}
                        @enderror
                    </p>
                    <label>Password</label>
                </div>
                <!-- nhớ pass -->
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Nhớ mật khẩu</label>
                    <a href="">Quên mật khẩu</a>
                </div>
                <button type="submit" class="btn">Đăng Nhập</button>
                <div class="login-register">
                    <p>Bạn chưa có tài khoản? <a class="register-link"> Đăng Ký</a></p>
                </div>
            </form>

            <div id="message"></div>
                        </div>
            <!-- đăng ký -->
            <div class="form-box register">
                <h2>Đăng Ký</h2>
            <form id="registerForm" action="{{ route('register.index') }}" method="POST">
            @csrf
            <!-- Họ tên -->
            <div class="input-box">
                <span class="icon">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input type="text" name="name" placeholder=" ">
                <p class="errors">
                    @error('name')
                        {{$message}}
                    @enderror
                </p>
                <label>Họ và tên</label>
            </div>
            <!-- Email -->
            <div class="input-box">
                <span class="icon">
                    <i class="bi bi-envelope-fill"></i>
                </span>
                <input type="email" name="email" placeholder=" ">
                <p class="errors">
                    @error('email')
                        {{$message}}
                    @enderror
                </p>
                <label>Email</label>
            </div>
            <!-- Mật khẩu -->
            <div class="input-box">
                <span class="icon">
                    <i class="bi bi-eye-fill" id="register-icon-password"></i>
                </span>
                <input type="password" name="password" id="password-input-register" placeholder=" ">
                <p class="errors">
                    @error('password')
                        {{$message}}
                    @enderror
                </p>
                <label>Mật khẩu</label>
            </div>
            <!-- Nhập lại mật khẩu -->
            <div class="input-box">
                <span class="icon">
                    <i class="bi bi-eye-fill" id="register-icon-password2"></i>
                </span>
                <input type="password" name="password_confirmation" id="password-input-register2" placeholder=" ">
                <p class="errors">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </p>
                <label>Nhập lại mật khẩu</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="terms"> Đồng ý với các điều khoản và điều kiện</label>
            </div>
            <button type="submit" class="btn">Đăng ký</button>
            <div class="login-register">
                <p>Bạn đã có tài khoản? <a class="login-link"> Đăng nhập</a></p>
            </div>
        </form>

                    </div>
                </div>
            </div>


    <script src="assets/frontend/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn việc tải lại trang

                // Lấy dữ liệu từ form
                var email = $('#email').val();
                var password = $('#password-input-login').val(); // Đúng ID
                var _token = $('meta[name="csrf-token"]').attr('content'); // Lấy CSRF token

                // Gửi yêu cầu AJAX
                $.ajax({
                    url: $(this).attr('action'), // Đường dẫn đến file xử lý đăng nhập
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        _token: _token
                    },
                    success: function(response) {
                        $('#message').html(response.message); // Hiển thị thông báo từ server
                        if (response.success) {
                            window.location.href = response.redirect; // Chuyển hướng
                        }
                    },
                    error: function(xhr) {
                        // Xử lý lỗi từ server
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $('#email-error').text(errors.email ? errors.email[0] : '');
                            $('#password-error').text(errors.password ? errors.password[0] : '');
                        } else {
                            $('#message').html('Đã có lỗi xảy ra!');
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>
