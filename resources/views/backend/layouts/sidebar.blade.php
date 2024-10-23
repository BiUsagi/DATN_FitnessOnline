{{-- {{ Request::is('admin/orders*') || Request::is('admin/customer*') ? 'active' : '' }}   --}}
{{-- Kiểm tra link để thêm class active --}}


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->
        

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/exerciseset*') ? 'active' : '' }}"
                data-bs-target="#package-nav" data-bs-toggle="collapse" href="{{ route('admin.workout_exercise') }}">
                <i class="bi bi-archive"></i><span>Quản lý gói tập</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="package-nav" class="nav-content collapse {{ Request::is('admin/exerciseset*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.workout_exercise') }}"
                        class="{{ Request::is('admin/exerciseset') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Danh sách gói tập</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.workout_exercise-create') }}"
                        class="{{ Request::is('admin/exerciseset/create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Thêm gói tập</span>
                    </a>
                </li>
            </ul>
        </li><!-- End gói tập -->

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/exercise') || Request::is('admin/exercise/create') ? 'active' : '' }}"
                data-bs-target="#exercise-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book-half"></i><span>Quản lý bài tập</span><i class="bi bi-chevron-down ms-auto"></i>
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
            <a class="nav-link collapsed {{ Request::is('admin/posts*') ? 'active' : '' }}" data-bs-target="#posts-nav"
                data-bs-toggle="collapse" href="#">
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
                <li>
                    <a href="{{ route('admin-post.create') }}"
                        class="{{ Request::is('admin/posts/create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Thêm bài viết</span>
                    </a>
                </li>
            </ul>
        </li><!-- End bài viết -->


        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/comments*') ? 'active' : '' }}"
                data-bs-target="#comment-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-chat-dots"></i><span>Quản lý bình luận</span><i class="bi bi-chevron-down ms-auto"></i>
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
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Danh sách đen</span>
                    </a>
                </li>
            </ul>
        </li><!-- End bình luận -->


        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/supportexercises*') ? 'active' : '' }}"
                href="{{ route('admin.supportexercises') }} ">
                <i class="bi bi-headset"></i><span>Chăm sóc khách hàng</span>
            </a>
        </li><!-- End hỗ trợ -->

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/staff*') || Request::is('admin/customer*') ? 'active' : '' }}"
                data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Quản lý tài khoản</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav"
                class="nav-content collapse {{ Request::is('admin/staff*') || Request::is('admin/customer*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.staff') }}" class="{{ Request::is('admin/staff*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Quản lý nhân viên</span>
                    </a>
                    <a href="{{ route('admin.customer') }}"
                        class="{{ Request::is('admin/customer*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Quản lý khách hàng</span>
                    </a>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Kiểm duyệt hồ sơ</span>
                    </a>
                </li>
            </ul>
        </li><!-- End users -->

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/orders*') || Request::is('admin/userorder*') ? 'active' : '' }}"
                data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-handbag"></i><span>Quản lý đơn hàng</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="order-nav"
                class="nav-content collapse {{ Request::is('admin/orders*') || Request::is('admin/userorder*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.orders') }}"
                        class="{{ Request::is('admin/orders*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Đơn hàng</span>
                    </a>
                    <a href="{{ route('admin.userorder') }}"
                        class="{{ Request::is('admin/userorder*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Khách hàng</span>
                    </a>
                </li>
            </ul>
        </li><!-- End order -->


        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/statistical*') ? 'active' : '' }}"
                data-bs-target="#statistical-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Thống kê</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="statistical-nav"
                class="nav-content collapse {{ Request::is('admin/statistical*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.statistical') }}"
                        class="{{ Request::is('admin/statistical*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Thống kê doanh thu</span>
                    </a>
                    <!-- <a href="{{ route('admin.statistical') }}" class="{{ Request::is('admin/statistical*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Thống kê khách hàng</span> -->
            </a>
            <a href="{{route('admin.statistical')}}" class="{{ Request::is('admin/statistical*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Thống kê gói tập</span>
            </a>
          </li>
        </ul>
      </li><!-- End interface -->
      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('admin/slides*') ? 'active' : '' }}" data-bs-target="#slides-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-wtf"></i><span>Giao diện</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="slides-nav" class="nav-content collapse {{ Request::is('admin/slides*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.slides')}}" class="{{ Request::is('admin/slides') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Danh sách giao diện</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.slide.create')}}" class="{{ Request::is('admin/slides/create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Thêm giao diện</span>
            </a>
          </li>
        </ul>
      </li><!-- End interface -->


        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/marketing*') ? 'active' : '' }}"
                data-bs-target="#marketing-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gift"></i><span>Tiếp thị</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="marketing-nav" class="nav-content collapse {{ Request::is('admin/marketing*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.marketing') }}"
                        class="{{ Request::is('admin/marketing*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Các ưu đãi</span>
                    </a>

                </li>
            </ul>
        </li><!-- End marketing -->

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('admin/config*') ? 'active' : '' }}"
                data-bs-target="#configuration-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Cấu hình</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="configuration-nav" class="nav-content collapse {{ Request::is('admin/config*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.config') }}"
                        class="{{ Request::is('admin/config*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Ngôn ngữ</span>
                    </a>
                </li>
            </ul>
        </li><!-- End cấu hình -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-box-arrow-in-right"></i><span>Đăng xuất</span>
            </a>
        </li><!-- End đăng xuất -->
    </ul>

</aside><!-- End Sidebar-->
