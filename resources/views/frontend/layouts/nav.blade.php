<script src="assets/frontend/js/login.js"></script>
<header>
    <div class="navigation-wrap start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg ">
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img loading='lazy' src="logo/fitness-online light.png" alt="logo" width="160"
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
                                    <a class="nav-link " href="{{ route('trainers.index') }}">Trainers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse navbar-collapse tabActive" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">

                                @if (Auth::check())
                                    <li class="nav-item nav-item-customize">
                                        <span class="nav-link account bell" tabindex="0">
                                            <i class="bi bi-bell-fill fs-6"></i>
                                            <span class="notification-count" id="notificationCount">0</span>
                                        </span>

                                        <!-- thong bao -->
                                        <ul class="notifications" id="bell"></ul>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    @if (Auth::check())
                                        <span class="nav-link account">
                                            <img src="{{ 'assets/backend/img/accounts/' . Auth::user()->avatar }}" alt="Profile"
                                                class="rounded-circle">&nbsp;


                                        </span> <!-- Hiển thị tên đăng nhập -->
                                        {{-- <ul class="dropdown-menu" aria-labelledby="username">
                                           
                                            <li class="text">
                                                <a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}"
                                                    class="dropdown-item text-white">Thông
                                                    Tin Tài Khoản</a>
                                            </li>
                                            <li class="text">
                                                <a href="{{ route('workout_bought', Auth::user()->id) }}"
                                                    class="dropdown-item text-white">Gói tập của tôi</a>
                                            </li>
                                            @if (Auth::user()->role_012 === 1 || Auth::user()->role_012 === 2)
                                                <li class="text">
                                                    <a href="{{ route('admin') }}" class="dropdown-item text-white">Trang quản
                                                        trị</a>
                                                </li>
                                            @else
                                            @endif
                                            <li class="text">
                                                <form action="{{ route('logout.index') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-white">Đăng
                                                        Xuất</button>
                                                </form>
                                            </li>
                                        </ul> --}}
                                        <div class="dropdown-account">
                                            <div class="img-name">
                                                <img src="{{ 'assets/backend/img/accounts/' . Auth::user()->avatar }}"
                                                    class="rounded-circle profile-image" alt="">
                                                <div class="nameuser">
                                                    <p>{{ Auth::user()->user_name }}</p>
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                            <div class="infor-account">
                                                <a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}">Trang
                                                    cá nhân</a>
                                            </div>
                                            <div class="line"></div>
                                            <div class="infor-account">
                                                <a href="{{ route('workout_bought', Auth::user()->id) }}">Gói tập của
                                                    tôi</a>
                                            </div>
                                            <div class="infor-account">
                                                <a href="#">Lịch sử mua hàng</a>
                                            </div>
                                            @if (Auth::user()->role_012 === 2)
                                                <div class="infor-account">
                                                    <a href="{{ route('admin') }}">Trang quản trị</a>
                                                </div>
                                            @endif
                                            @if (Auth::user()->role_012 === 1)
                                                <div class="infor-account">
                                                    <a href="{{ route('admin.walletpt') }}">Trang quản trị</a>
                                                </div>
                                            @endif
                                            <div class="line"></div>
                                            <div class="infor-account">
                                                <form action="{{ route('logout.index') }}" method="POST">
                                                    @csrf
                                                    <button type="submit">Đăng xuất</button>
                                                </form>
                                            </div>

                                        </div>
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
        loadbell();

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

        function loadbell() {

            @if (Auth::check())
                var userId = @json(Auth::user()->id); // Truyền id người dùng từ PHP sang JavaScript



                $.get('http://127.0.0.1:8000/api/web/get-notification/' + userId, function(res) {
                    let data = res;
                    let returnDb = '';
                    console.log(data);
                    data.reverse().forEach(element => {

                        const createdAt = new Date(element
                            .created_at); // Chuyển đổi chuỗi thành đối tượng Date

                        // Lấy ngày, tháng, năm, giờ, phút, giây
                        const day = createdAt.getDate();
                        const month = createdAt.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0
                        const year = createdAt.getFullYear();
                        const hours = createdAt.getHours();
                        const minutes = createdAt.getMinutes();
                        const seconds = createdAt.getSeconds();

                        // Đảm bảo định dạng số hai chữ số cho phút và giây
                        const formattedDate =
                            `${day < 10 ? '0' : ''}${day}/${month < 10 ? '0' : ''}${month}/${year} ${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;


                        returnDb += `
                            <li class="${element.is_read == 0 ? 'unread' : ''}">
                                <i class="bi bi-check-circle-fill"></i>
                                <div class="content">
                                    <a class="is_read" href="${element.link}" data-id="${element.id}">${element.message}</a>
                                    <span class="date">${formattedDate}</span>
                                </div>
                            </li>
                            `
                    });

                    if (returnDb != '') {
                        $('#bell').html(returnDb);
                        $('#bell').prepend('<h6 class="title">Thông báo</h6>');
                    } else {
                        $('#bell').html(`
                            <li class="unread !mb-2">
                                <div class="content text-white">
                                   Không có thông báo nào.
                                </div>
                            </li>
                        `);
                    }
                });
            @endif
        }

        $(document).on('click', '.is_read', function(res) {
            var id = $(this).data('id');
            $.get('http://127.0.0.1:8000/api/web/is_read/' + id, function(res) {});
        });


        $(document).ready(function() {
            @if (Auth::check())
                var userId = @json(Auth::user()->id); // Truyền id người dùng từ PHP sang JavaScript

                $.get('http://127.0.0.1:8000/api/web/count_read/' + userId, function(res) {

                    var unreadCount = res;

                    // Cập nhật số lượng vào span.notification-count
                    $('#notificationCount').text(unreadCount);

                    // Nếu không có thông báo chưa đọc, ẩn đi
                    if (unreadCount === 0) {
                        $('#notificationCount').hide();
                    } else {
                        $('#notificationCount').show();
                    }

                });
            @endif

        });



        $(document).ready(function() {
            // Hiển thị và ẩn thông báo khi click vào chuông
            $(".nav-link.account.bell").on('click', function() {
                $(".notifications").toggle(); // Toggle (hiển thị/ẩn) danh sách thông báo
            });

            // Đánh dấu thông báo là đã đọc khi click vào một thông báo
            $(".notifications li").on('click', function() {
                var notificationId = $(this).data('id'); // Lấy id của thông báo
                $(this).addClass('read'); // Thêm class 'read' để thay đổi màu sắc

                // Gửi yêu cầu đánh dấu là đã đọc
                $.ajax({
                    url: '/put-read/' + notificationId, // Đổi thành URL API của bạn
                    method: 'PUT',
                    success: function(response) {
                        console.log('Notification marked as read', response);
                    },
                    error: function(error) {
                        console.log('Error marking notification as read', error);
                    }
                });
            });
        });

        const clickAccount = document.querySelector('.rounded-circle');
        const dropdown = document.querySelector('.dropdown-account');

        clickAccount.addEventListener('click', function() {
            dropdown.classList.toggle('show-dropdown');
        });
    </script>
</header>
