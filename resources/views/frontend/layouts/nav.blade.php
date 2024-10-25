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
                                    <a class="nav-link" href="#courses">GÓI TẬP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="schedule.html">PT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                @if(Auth::check())
                                    <span class="nav-link btn">{{ Auth::user()->user_name }}</span> <!-- Hiển thị tên đăng nhập -->
                                    <!-- <a href="{{ route('logout.index') }}" class="nav-link btn">Đăng xuất</a> -->
                                    <ul class="dropdown-menu" aria-labelledby="username">
                                        <li>
                                            <form action="{{ route('logout.index') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{ route('info.index') }}">Thông tin</a>
                                        </li>
                                    </ul>
                                @else
                                    <a href="{{ route('login.index') }}" id="btn-login" class="nav-link btn">Đăng nhập</a> <!-- Hiển thị nút đăng nhập -->
                                @endif
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    
</header>
