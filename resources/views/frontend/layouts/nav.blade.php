<script src="assets/frontend/js/login.js"></script>

<header>
    <div class="navigation-wrap start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg ">
                        <a class="navbar-brand" href="index.html">
                            <img loading='lazy' src="assets/frontend/images/logo.svg" alt="logo" width="139"
                                height="30">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse tabActive" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">TRANG CHỦ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about.index') }}">GIỚI THIỆU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#courses">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="schedule.html">schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="team.html">Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('login.index') }}" id="btn-login" class="nav-link btn">Đăng
                                        nhập</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- form login register -->
    <div class="container-custom">
        <div class="wrapper-login">
            <div class="modal-login">
                <div class="box-login">
                    <span class="icon-close">
                        <i class="bi bi-x" id="icon-close"></i>
                    </span>
                    <!-- đăng nhập -->
                    <div class="form-box login">
                        <h2>Đăng Nhập</h2>
                        <form action="" method="POST">
                            <!-- email -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="text" required>
                                <label>Email</label>
                                {{-- <p class="errors">123</p> --}}
                            </div>
                            <!-- password -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-eye-fill" id="login-icon-password"></i>
                                </span>
                                <input type="password" id="password-input-login" required>
                                {{-- <p class="errors">123</p> --}}
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
                                <p>Bạn chưa có tài khoản ? <a  class="register-link" id="btn-register"> Đăng Ký</a></p>
                            </div>
                        </form>
                    <div>
                </div>
            </div>
        </div>

        <!-- form đăng ký -->
        <div class="wrapper-register">
            <div class="modal-register">
                <!-- đăng ký -->
                <div class="box-register">
                    <div class="form-box register">
                        <h2>Đăng Ký</h2>
                        <form action="">
                            <!-- Họ tên -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" required>
                                {{-- <p class="errors">123</p> --}}
                                <label>Họ và tên</label>
                            </div>
                            <!-- Email -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="text" required>
                                {{-- <p class="errors">123</p> --}}
                                <label>Email</label>
                            </div>
                            <!-- Mật khẩu -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-eye-fill" id="register-icon-password"></i>
                                </span>
                                <input type="password" id="password-input-register" required>
                                {{-- <p class="errors">123</p> --}}
                                <label>Mật khẩu</label>
                            </div>
                            <!-- Nhập lại mật khẩu -->
                            <div class="input-box">
                                <span class="icon">
                                    <i class="bi bi-eye-fill" id="register-icon-password2"></i>
                                </span>
                                <input type="password" id="password-input-register2" required>
                                {{-- <p class="errors">123</p> --}}
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
        </div>
    </div>
</header>
