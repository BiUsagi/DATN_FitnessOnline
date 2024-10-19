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
    <script src="assets/frontend/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

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

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                        
                    </div>
                    <!-- password -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="login-icon-password"></i>
                        </span>
                        <input type="password" name="password" id="password-input-login" placeholder=" ">
                        
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
                    <div id="ketqua"></div>
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
                        <!-- <p class="errors">
                            @error('name')
                                {{$message}}
                            @enderror
                        </p> -->
                        <label>Họ và tên</label>
                    </div>
                    <!-- Email -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email1" id="email1" placeholder=" ">
                        
                        <label>Email</label>
                    </div>
                    <!-- Mật khẩu -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="register-icon-password"></i>
                        </span>
                        <input type="password" name="password1" id="password-input-register" placeholder=" ">
                        
                        <label>Mật khẩu</label>
                    </div>
                    <!-- Nhập lại mật khẩu -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-eye-fill" id="register-icon-password2"></i>
                        </span>
                        <input type="password" name="password1_confirmation" id="password-input-register2" placeholder=" ">
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
                <div id="ketqua1"></div>
                </div>
            </div>
        </div>


        <script>
    $(document).ready(function(){
    $("#loginForm").submit(function(event){
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        var email = $("#email").val();
        var password = $("#password-input-login").val(); // Đảm bảo ID chính xác cho trường mật khẩu
        var token = $('meta[name="csrf-token"]').attr('content');

        $.post("{{ route('login_.index') }}", {
            _token: token,
            email: email,
            password: password
        }, function(data) {
            $("#ketqua").html('<div class="alert alert-success">' + data.message + '</div>');
        }).fail(function(xhr) {
            var message = xhr.responseJSON ? xhr.responseJSON.message : 'Đã xảy ra lỗi. Vui lòng thử lại.';
            $("#ketqua").html('<div class="alert alert-danger">' + message + '</div>');
        });
    });

    $("#registerForm").submit(function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        var name = $("#name").val();
        var email = $("#email1").val(); // Đảm bảo ID chính xác cho trường email
        var password = $("#password-input-register").val();
        var password_confirmation = $("#password-input-register2").val();
        var token = $('meta[name="csrf-token"]').attr('content');

        // Kiểm tra xem điều khoản có được chấp nhận không
        if (!$('input[name="terms"]').is(':checked')) {
            $("#ketqua1").html('<div class="alert alert-danger">Bạn phải đồng ý với các điều khoản và điều kiện.</div>');
            return;
        }


        $.post("{{ route('register.index') }}", {
            _token: token,
            email1: email,
            user_name: name,
            password1: password,
            password1_confirmation: password_confirmation
        }, function(data) {
            $("#ketqua1").html('<div class="alert alert-success">' + data.message + '</div>'); // Hiển thị thông báo từ server
        }).fail(function(xhr) {
            var message;

            // Kiểm tra xem xhr.responseJSON có tồn tại và chứa errors không
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                message = xhr.responseJSON.errors;
            } else {
                message = 'Đã xảy ra lỗi. Vui lòng thử lại.';
            }

            // Hiển thị thông báo lỗi
            var errorHtml = '<div class="alert alert-danger">';
            if (typeof message === 'string') {
                errorHtml += message; // Nếu message là chuỗi
            } else {
                // Nếu message là một đối tượng, hãy nối lại các thông báo lỗi
                $.each(message, function(key, value) {
                    errorHtml += value.join('<br>'); // Gộp các lỗi cùng loại thành một chuỗi
                });
            }
            errorHtml += '</div>';

            $("#ketqua1").html(errorHtml);
        });
    });
});



    </script>
</body>

</html>
