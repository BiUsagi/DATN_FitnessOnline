<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/frontend/css/style.css">
    <script src="assets/frontend/js/script.js"></script>
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
                <form action="{{ route('login_.index') }}" method="POST">
                    <!-- email -->
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="text" placeholder=" ">
                        <label>Email</label>
                        <p class="errors">
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
                        <input type="password" id="password-input-login" placeholder=" ">
                        <p class="errors">
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
                        <!-- quên mật khẩu -->
                        <a href="">Quên mật khẩu</a>
                    </div>
                    <button type="submit" class="btn">Đăng Nhập</button>
                    <div class="login-register">
                        <!-- link form đăng ký -->
                        <p>Bạn chưa có tài khoản ? <a class="register-link"> Đăng Ký</a></p>
                    </div>

                </form>
            </div>
            <!-- đăng ký -->
            <div class="form-box register">
                <h2>Đăng Ký</h2>
                <form action="">
                    <!-- Họ tên -->
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" placeholder=" ">
                        <p class="errors">
                            @error('email')
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
                        <input type="text" placeholder=" ">
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
                        <input type="password" id="password-input-register" placeholder=" ">
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
                        <input type="password" id="password-input-register2" placeholder=" ">
                        <p class="errors">
                            @error('password')
                                {{$message}}
                            @enderror
                        </p>
                        <label>Nhập lại mật khẩu</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">
                            Đồng ý với các điều khoản và điều kiện</label>
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản? <a class="login-link"> Đăng nhập</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
