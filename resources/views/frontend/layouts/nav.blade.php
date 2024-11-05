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
                                    {{-- <a class="nav-link" href="{{ route('trainers.index') }}">Trainers</a> --}}
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    @if (Auth::check())
                                        <span class=" nav-link account">
                                            <img src="{{ asset('assets/backend/img/profile-img.jpg') }}" alt="Profile"
                                                class="rounded-circle">&nbsp;
                                            {{ Auth::user()->user_name }}</span> <!-- Hiển thị tên đăng nhập -->
                                        <ul class="dropdown-menu" aria-labelledby="username">
                                            <p class="text-center text-white"><i class="bi bi-wallet-fill"></i>&nbsp;<i
                                                    id="money"></i> <i class="underline">đ</i> </p>
                                            <hr>
                                            <li class="text">
                                                <a href="{{ route('wallets.addmoney') }}"
                                                    class="dropdown-item text-white">Nạp Tiền</a>
                                            </li>
                                            <li class="text">
                                                <a href="{{ route('profile.index') }}"
                                                    class="dropdown-item text-white">Thông
                                                    Tin Tài Khoản</a>
                                            </li>
                                            <li class="text">
                                                <form action="{{ route('logout.index') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-white">Đăng
                                                        Xuất</button>
                                                </form>
                                            </li>
                                        </ul>
                                    @else
                                        <a id="btn-login" class="nav-link btn">Đăng nhập</a>
                                    @endif
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#btn-login").click(function() {
            var currentUrl = window.location.href;

            // Chuyển hướng người dùng đến trang đăng nhập, truyền URL hiện tại
            window.location.href = "/login?redirect_url=" + encodeURIComponent(currentUrl);
        });



        @if (Auth::check())
            var userId = @json(Auth::user()->id); // Truyền id người dùng từ PHP sang JavaScript

            $.get('http://127.0.0.1:8000/api/web/wallets/' + userId, function(res) {
                let data = res;
                var formattedBalance = data.balance.toLocaleString('vi-VN'); // Định dạng theo ngôn ngữ Việt Nam
                $('#money').html(formattedBalance);
            });
        @endif
    </script>
</header>
