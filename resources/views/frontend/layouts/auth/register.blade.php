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
        <h2>ĐĂNG KÝ</h2>
        <form>
            <div class="mb-4">
                <div class="d-flex">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control1" placeholder="Email">
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control1" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control1" placeholder="Nhập lại mật khẩu">
                </div>
            </div>

            <button type="submit" class="button">Đăng Ký</button>

        </form>
        <div class="register-link">
            Bạn đã có tài khoản → <a href="{{route(name: 'login.index')}}">Đăng nhập</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

</body>
</html>
