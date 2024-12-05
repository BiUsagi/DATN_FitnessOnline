<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FITNESS ONLINE</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('assets/frontend/images/banner/bg.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Lớp đen mỏng, 0.5 là độ trong suốt */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            /* Nội dung nổi trên lớp overlay */
        }
    </style>
</head>

<body>
    <!-- Password Reset 1 - Bootstrap Brain Component --> <!-- Password Reset 8 - Bootstrap Brain Component -->
    <section class=" p-3 p-md-4 p-xl-5 d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                    src="assets/frontend/images/banner/bg.webp" alt="Welcome back you've been missed!">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img src="logo/fitness-online dark.png"
                                                                alt="BootstrapBrain Logo" width="300">
                                                        </a>
                                                    </div>
                                                    <h2 class="h4 text-center">Quên Mật Khẩu</h2>
                                                    <h3 class="fs-6 fw-normal text-secondary text-center m-0">Cung
                                                        cấp
                                                        địa chỉ email
                                                        được liên kết với tài khoản của bạn để khôi phục mật khẩu.
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="#!">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-dark btn-lg" type="submit">Thay Đổi
                                                            Mật
                                                            Khẩu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div
                                                    class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                    <a href="#!" class="link-secondary text-decoration-none">Đăng
                                                        Nhập</a>
                                                    <a href="#!" class="link-secondary text-decoration-none">Đăng
                                                        Ký</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
