<script src="assets/frontend/js/login.js"></script>

<header>
        <div class="navigation-wrap start-style">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg ">
                            <a class="navbar-brand" href="index.html">
                                <img loading='lazy' src="assets/frontend/images/logo.svg" alt="logo" width="139" height="30">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse tabActive" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('index')}}">TRANG CHỦ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('about.index')}}">GIỚI THIỆU</a>
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
                                        <a id="btn-login" class="nav-link btn" href="#">Đăng nhập</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow">
            <div class="box1">
                <div class="modal1">
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
                            <a href="#" id="" class="forgot-password">Quên mật khẩu?</a>
                        </div>

                        <button type="submit" class="button">Đăng nhập</button>

                    </form>
                    <div class="register-link">
                        Bạn chưa có tài khoản → <a href="{{route(name: 'register.index')}}">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    

    