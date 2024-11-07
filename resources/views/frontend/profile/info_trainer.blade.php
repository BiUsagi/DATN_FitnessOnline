@extends('frontend/layouts/app-user')


@section('main')
    <!-- BREADCRUMB START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <h1>HUẤN LUYỆN<span> VIÊN</span></h1>
                <div class="trackPage">
                    <a href="index.html">HOME</a>
                    <span>Trainers</span>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB END'S HERE -->
    <section class="section about-section-custom gray-bg mt-5" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse  d-flex justify-content-center">
                <div class="col-lg-6 ">
                    <div class="about-text-custom go-to">
                        <h3 class="dark-color mb-3">{{ $data->staff_name }}</h3>
                        {{-- <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6> --}}
                        <p>{{ $data->introduction }}</p>
                        <div class="row about-list-custom">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Sinh Nhật</label>
                                    <p>{{ $data->birthday }}</p>
                                </div>
                                <div class="media">
                                    <label>Tuổi</label>
                                    <p>{{ $data->getAgeFromBirthday() }}</p>
                                </div>
                                <div class="media">
                                    <label>Địa Chỉ</label>
                                    <p>{{ $data->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p>{{ $data->email }}</p>
                                </div>
                                <div class="media">
                                    <label>Di Động</label>
                                    <p>{{ $data->phone_number }}</p>
                                </div>
                                {{-- <div class="media">
                                    <label>Freelance</label>
                                    <p>Available</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-avatar-custom">
                        <img src="assets/backend/img/accounts/{{ $data->avatar }}" title="" alt="">
                    </div>
                </div>
            </div>
            <div class="counter-custom">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                            <p class="m-0px font-w-600">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                            <p class="m-0px font-w-600">Project Completed</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                            <p class="m-0px font-w-600">Photo Capture</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                            <p class="m-0px font-w-600">Telephonic Talk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom_js')
@endsection
