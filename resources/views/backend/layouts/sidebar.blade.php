{{-- {{ Request::is('admin/orders*') || Request::is('admin/customer*') ? 'active' : '' }} --}}
{{-- Kiểm tra link để thêm class active --}}


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- admin -->
        @if (auth()->user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->



            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/deposithistories*') ? 'active' : '' }}"
                    data-bs-target="#deposithistories-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i>
                    <span class="position-relative">
                        Quản lý giao dịch
                        <span
                            class="position-absolute top-0 start-100 translate-middle-y badge rounded-pill bg-danger custom-badge request-money"></span>
                    </span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="deposithistories-nav"
                    class="nav-content collapse {{ Request::is('admin/deposithistories*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.addmoney') }}"
                            class="{{ Request::is('admin/deposithistories') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span class="position-relative">
                                Yêu cầu rút tiền
                                <span
                                    class="position-absolute top-0 start-100 translate-middle-y badge rounded-pill bg-danger custom-badge request-money"></span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.listmoney') }}"
                            class="{{ Request::is('admin/deposithistories/list') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Lịch sử giao dịch</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End yeu cau nap tien -->




            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/workout_package*') ? 'active' : '' }}"
                    data-bs-target="#package-nav" data-bs-toggle="collapse" href="{{ route('admin.workout_package') }}">
                    <i class="bi bi-archive"></i><span>Quản lý gói tập</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="package-nav"
                    class="nav-content collapse {{ Request::is('admin/workout_package*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.workout_package') }}"
                            class="{{ Request::is('admin/workout_package') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách gói tập</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End gói tập -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/exercise') || Request::is('admin/exercise/create') ? 'active' : '' }}"
                    data-bs-target="#exercise-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book-half"></i><span>Quản lý bài tập</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="exercise-nav"
                    class="nav-content collapse {{ Request::is('admin/exercise') || Request::is('admin/exercise/create') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.exercise') }}"
                            class="{{ Request::is('admin/exercise') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách bài tập</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End bài tập -->



            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/posts*') ? 'active' : '' }}"
                    data-bs-target="#posts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>Quản lý bài viết</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="posts-nav" class="nav-content collapse {{ Request::is('admin/posts*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.posts') }}" class="{{ Request::is('admin/posts') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách bài viết</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End bài viết -->


            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/comments*') ? 'active' : '' }}"
                    data-bs-target="#comment-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat-dots"></i><span>Quản lý bình luận</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="comment-nav" class="nav-content collapse {{ Request::is('admin/comments*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.comments') }}"
                            class="{{ Request::is('admin/comments*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách bình luận</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('api.admin.report-comments') }}">
                            <i class="bi bi-circle"></i><span>Danh sách đen</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End bình luận -->




            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/staff*') || Request::is('admin/customer*') || Request::is('admin/application*') ? 'active' : '' }}"
                    data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Quản lý tài khoản</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav"
                    class="nav-content collapse {{ Request::is('admin/staff*') || Request::is('admin/customer*') || Request::is('admin/application*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.staff') }}"
                            class="{{ Request::is('admin/staff*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Quản lý nhân viên</span>
                        </a>
                        <a href="{{ route('admin.customer') }}"
                            class="{{ Request::is('admin/customer*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Quản lý khách hàng</span>
                        </a>
                        <a href="{{ route('admin.application') }}"
                            class="{{ Request::is('admin/application*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Kiểm duyệt hồ sơ</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End users -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/orders*') || Request::is('admin/userorder*') ? 'active' : '' }}"
                    data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-handbag"></i><span>Quản lý đơn hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="order-nav"
                    class="nav-content collapse {{ Request::is('admin/orders*') || Request::is('admin/userorder*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.orders') }}"
                            class="{{ Request::is('admin/orders*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Đơn hàng</span>
                        </a>

                    </li>
                </ul>
            </li><!-- End order -->



            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/slides*') ? 'active' : '' }}"
                    data-bs-target="#slides-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-wtf"></i><span>Giao diện</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="slides-nav" class="nav-content collapse {{ Request::is('admin/slides*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.slides') }}"
                            class="{{ Request::is('admin/slides') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách giao diện</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.slide.create') }}"
                            class="{{ Request::is('admin/slides/create') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Thêm giao diện</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End interface -->

            <!-- Thống kê -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/statistical*') ? 'active' : '' }}"
                    href="{{ route('admin.statistical') }} ">
                    <i class="bi bi-graph-up"></i><span>Thống kê</span>
                </a>
            </li>
            <!-- End Thống kê -->


            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/marketing*') ? 'active' : '' }}"
                    data-bs-target="#marketing-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gift"></i><span>Tiếp thị</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="marketing-nav"
                    class="nav-content collapse {{ Request::is('admin/marketing*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.marketing') }}"
                            class="{{ Request::is('admin/marketing*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Các ưu đãi</span>
                        </a>

                    </li>
                </ul>
            </li><!-- End marketing -->




            {{-- end admin --}}
            
            <!-- staff -->
        @elseif(auth()->user()->hasRole('staff'))
         
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/walletpt*') ? 'active' : '' }}"
                    data-bs-target="#money-nav" data-bs-toggle="collapse" href="{{ route('admin.walletpt') }}">
                    <i class="bi bi-bar-chart"></i><span>Quản lý số dư</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="money-nav" class="nav-content collapse {{ Request::is('admin/walletpt*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.walletpt') }}"
                            class="{{ Request::is('admin/walletpt') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Tổng quát</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ruttien') }}"
                            class="{{ Request::is('admin/walletpt/ruttien') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Rút tiền</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End money -->
            <!-- Thống kê -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/statistical*') ? 'active' : '' }}"
                    href="{{ route('staff.statistical') }} ">
                    <i class="bi bi-graph-up"></i><span>Thống kê</span>
                </a>
            </li>
            <!-- End Thống kê -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/workout_package*') ? 'active' : '' }}"
                    data-bs-target="#package-nav" data-bs-toggle="collapse"
                    href="{{ route('admin.workout_package') }}">
                    <i class="bi bi-archive"></i><span>Quản lý gói tập</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="package-nav"
                    class="nav-content collapse {{ Request::is('admin/workout_package*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.workout_package') }}"
                            class="{{ Request::is('admin/workout_package') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách gói tập</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.workout_package-create') }}"
                            class="{{ Request::is('admin/workout_package/create') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Thêm gói tập</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End gói tập -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/exercise') || Request::is('admin/exercise/create') ? 'active' : '' }}"
                    data-bs-target="#exercise-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book-half"></i><span>Quản lý bài tập</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="exercise-nav"
                    class="nav-content collapse {{ Request::is('admin/exercise') || Request::is('admin/exercise/create') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.exercise') }}"
                            class="{{ Request::is('admin/exercise') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách bài tập</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.exercise-create') }}"
                            class="{{ Request::is('admin/exercise/create') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Thêm bài tập</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End bài tập -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/res_client') || Request::is('admin/res_client/create') ? 'active' : '' }}"
                    data-bs-target="#res_client-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-user-heart-line"></i><span>Quản lý học viên</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="res_client-nav"
                    class="nav-content collapse {{ Request::is('admin/res_client') || Request::is('admin/res_client/create') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.orders.customer_manage') }}"
                            class="{{ Request::is('admin/res_client/create') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách khách hàng</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End quản lý khách hàng -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/posts*') ? 'active' : '' }}"
                    data-bs-target="#posts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>Quản lý bài viết</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="posts-nav" class="nav-content collapse {{ Request::is('admin/posts*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.posts') }}"
                            class="{{ Request::is('admin/posts') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Danh sách bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.post-create') }}"
                            class="{{ Request::is('admin/posts/create') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Thêm bài viết</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End bài viết -->

           




            <!-- <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('admin/supportexercises*') ? 'active' : '' }}"
                    href="{{ route('admin.supportexercises') }} ">
                    <i class="bi bi-headset"></i><span>Chăm sóc khách hàng</span>
                </a>
            </li> -->
            <!-- End hỗ trợ -->


            {{-- end staff --}}
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-box-arrow-in-right"></i><span>Thoát</span>
            </a>
        </li><!-- End đăng xuất -->
    </ul>
</aside><!-- End Sidebar-->
