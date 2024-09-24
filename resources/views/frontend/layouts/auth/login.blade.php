<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/frontend/css/login.css">
    <style>
        
    </style>
</head>
<body>

    <div class="login-container">
        <h2>ĐĂNG NHẬP</h2>
        <form>
            <div class="mb-4">
                <div class="d-flex">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control1" placeholder="Email">
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control1" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label>
                </div>
                <a href="#" class="forgot-password">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="button">Đăng nhập</button>

        </form>
        <div class="register-link">
            Bạn chưa có tài khoản → <a href="{{route(name: 'register.index')}}">Đăng ký</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

</body>
</html>
