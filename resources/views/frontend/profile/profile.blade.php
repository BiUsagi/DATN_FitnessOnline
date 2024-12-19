@extends('frontend/layouts/app-user')


@section('custom_css')
    <link rel="stylesheet" href="assets/frontend/css/info.css">
@endsection


@section('main')
    <div class="box-header"></div>
    <section class="profile-bg-custom">


        <div class="container ctiet-main">
            <div class="row">
                @include('frontend/profile/layouts/sidebar')


                <!-- main -->
                <div class="col-9 bd-left ctiet-thongtin">
                    <div class="row">
                        <div class="col-12 ctiet-title">
                            <p>HỒ SƠ CỦA TÔI</p>
                            Quản lý thông tin hồ sơ để bảo mật tài khoản
                        </div>
                        <!-- thongtin -->
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4 justify-content-end d-flex mg-top">Tên:</div>
                                <div class="col-8 mg-top">{{ $user->user_name }}</div>

                                <div class="col-4 justify-content-end d-flex mg-top">Email:</div>
                                <div class="col-8 mg-top">{{ $user->email }}</div>

                                <div class="col-4 justify-content-end d-flex mg-top">Số Điện Thoại:</div>
                                <div class="col-8 mg-top">
                                    @if ($user->phone_number)
                                        {{ $user->phone_number }}
                                    @else
                                        <a href="{{ route('profile.edit') }}">Cập Nhật Số Điện Thoại</a>
                                    @endif
                                </div>

                                <div class="col-4 justify-content-end d-flex mg-top">Giới Tính:</div>
                                <div class="col-8 mg-top">
                                    @if ($user->gender == 1)
                                        <i class="fa-solid fa-mars blue"></i> Nam
                                    @elseif($user->gender == 0)
                                        <i class="fa-solid fa-venus pink"></i> Nữ
                                    @else
                                        <i class="bi bi-gender-trans text-secondary"></i> Khác
                                    @endif
                                </div>

                                <div class="col-4 justify-content-end d-flex mg-top">Ngày Sinh:</div>
                                <div class="col-8 mg-top">
                                    @if ($user->birthday)
                                        {{ $user->birthday }}
                                    @else
                                        <a href="{{ route('profile.edit') }}">Cập nhật ngày sinh</a>
                                    @endif
                                </div>

                                <div class="col-4 justify-content-end d-flex mg-top">Địa chỉ:</div>
                                <div class="col-8 mg-top">
                                    @if ($user->address)
                                        {{ $user->address }}
                                    @else
                                        <a href="{{ route('profile.edit') }}">Cập nhật địa chỉ</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- END thong tin -->

                        <!-- avata -->
                        <div class="col-4 row">
                            <div class="col-12 mg-top">Hình ảnh cá nhân:</div>
                            <div class="col-12 d-flex justify-content-center">
                                <img src="{{ 'assets/backend/img/accounts/' . $user->avatar }}" alt=""
                                    class="ctiet-imguserbig">
                            </div>
                        </div>
                        <!-- END avata -->
                    </div>
                </div>
                <!-- END main -->
            </div>
        </div>

    </section>
@endsection
