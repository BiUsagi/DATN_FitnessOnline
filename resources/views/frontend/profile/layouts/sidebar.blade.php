

<!-- sidebar -->
<div class="col-3">
    <div class="row">
        <div class="col-12">
            <div class="row ctiet-top">
                <div class="col-3"><img src="{{ ('assets/backend/img/accounts/' . $user->avatar) }}" alt=""
                        class="ctiet-imguser profile-image2"></div>
                <div class="col-9">

                    <p>{{ $user->user_name }}</p>
                    @if ($user->gender == 1)
                        <i class="bi bi-gender-male text-primary"></i> Nam
                    @elseif ($user->gender == 0)
                        <i class="bi bi-gender-female text-danger"></i> Nữ
                    @elseif ($user->gender == 2)
                        <i class="bi bi-gender-trans text-warning"></i> Khác
                    @else
                        <i class="bi bi-gender-trans text-secondary"></i> Chưa xác định
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12">
            <p class="mg-top-sb mt-3"><a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}" class="{{ Request::is('profile/*') ? 'text-color' : 'text-secondary' }}"><i
                        class="fa-solid fa-user me-2"></i>
                    Thông tin tài khoản</a></p>
            <p class="mg-top-sb"><a href="{{ route('profile.edit') }}" class="{{ Request::is('edit') ? 'text-color' : 'text-secondary' }}"><i
                        class="fa-solid fa-pen me-2"></i> Sửa hồ sơ</a></p>
            <p class="mg-top-sb"><a href="{{ route('profile.changepass', ['id' => $user->id]) }}" class="{{ Request::is('changepassword') ? 'text-color' : 'text-secondary' }}"><i
                        class="fa-solid fa-lock me-2"></i> Thay đổi mật khẩu</a>
            </p>
            <p class="mg-top-sb"><a href="{{ route('staff_request.index') }}" class="{{ Request::is('') ? 'text-color' : 'text-secondary' }}"><i
                        class="fa-solid fa-clock-rotate-left me-2"></i> Đăng ký nhân viên </a></p>
            <p class="mg-top-sb">
                
                <a href="{{ route('logout.index') }}" class="{{ Request::is('') ? 'text-color' : 'text-secondary' }}"><i
                        class="fa-solid fa-right-from-bracket me-2"></i> Đăng xuất</a>
            </p>
        </div>
    </div>
</div>
<!-- END sidebar -->
