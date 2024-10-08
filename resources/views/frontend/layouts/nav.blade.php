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
                                        <a id="btn-login" class="nav-link btn">Đăng nhập</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- form đăng nhập -->
        <div class="overflow-login" id="loginPopup">
            <div class="box1">
                <div class="modal1">
                <span class="x-lg" id="x-remove">
                    <i class="bi bi-x-lg"></i>
                </span>
                    <h4>ĐĂNG NHẬP</h4>
                    <form method="POST" action="{{route('login.index')}}" id="loginForm">
                        @csrf
                        <div class="">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input name="email" type="text" class="form-control1" placeholder="Email">
                            </div>
                            <p class="errors">{{$errors->first('email')}}</p>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input name="pass" type="password" class="form-control1" placeholder="Mật khẩu">
                            </div>
                            <p class="errors">{{$errors->first('pass')}}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label>
                            </div>
                            <a href="#" id="" class="forgot-password">Quên mật khẩu?</a>
                        </div>
                        

                        <button type="submit" class="button">Đăng nhập</button>
                        
                    </form>
                    <div class="register-link">
                        <p class="text-question">Bạn chưa có tài khoản → <a id="login-rigister" class="register">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- form đăng ký -->

        <div class="overflow-rigister" id="loginPopup">
            <div class="box2">
                <div class="modal2">
                <span class="x-lg" id="x-remove">
                    <i class="bi bi-x-lg"></i>
                </span>
                    <h4>ĐĂNG KÝ</h4>
                    <form method="POST" action="{{route('rigister.index')}}" id="loginForm">
                        @csrf
                        <!-- họ tên -->
                        <div class="">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input name="name" type="text" class="form-control1" placeholder="Họ tên">
                            </div>
                            <p class="errors">{{$errors->first('email')}}</p>
                        </div>

                        <!-- Email -->
                        <div class="mt-3">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input name="email" type="text" class="form-control1" placeholder="Email">
                            </div>
                            <p class="errors">{{$errors->first('email')}}</p>
                        </div>

                        <!-- mật khẩu -->
                        <div class="mt-3">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input name="pass" type="password" class="form-control1" placeholder="Mật khẩu">
                            </div>
                            <p class="errors">{{$errors->first('pass')}}</p>
                        </div>
                        <!-- nhập lại mật khẩu -->
                        <div class="mt-3">
                            <div class="d-flex">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input name="pass" type="password" class="form-control1" placeholder=" Nhập Lại Mật khẩu">
                            </div>
                            <p class="errors">{{$errors->first('pass')}}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="button">Đăng Ký</button>
                        <div class="register-link">
                        <p class="text-question">Bạn đã có tài khoản → <a href="{{route(name: 'login.index')}}" class="register">Đăng Nhập</a></p>
                    </div>

                        
                    </form>
                    
                </div>
            </div>
        </div>
    </header>
   
    

    