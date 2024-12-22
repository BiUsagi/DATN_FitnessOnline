@extends('frontend/layouts/app-user')



@section('main')
    <!-- BREADCRUMB START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <h1>HUẤN LUYỆN<span> VIÊN</span></h1>
                <div class="trackPage">
                    <a href="{{ route('index') }}">Trang Chủ</a>
                    <a href="{{ route('trainers.index') }}">Trainers</a>
                    <span>{{ $data->staff_name }}</span>

                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB END'S HERE -->
    <section class="section about-section-custom gray-bg mt-5 mb-5" id="about">
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
                                    <label>Giới Tính</label>
                                    <p>
                                        @if ($data->gender == 1)
                                            <i class="bi bi-gender-male text-primary"></i> Nam
                                        @elseif ($data->gender == 0)
                                            <i class="bi bi-gender-female text-danger"></i> Nữ
                                        @else
                                            <i class="bi bi-gender-trans text-warning"></i> Khác
                                        @endif
                                    </p>
                                </div>
                                <div class="media">
                                    <label>Facebook</label>
                                    <p><a href="{{ $data->facebook }}" class="text-secondary"
                                                        target="blank">{{ $data->facebook }}</a></p>
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

                                            <div class="media">
                                                <label>Địa Chỉ</label>
                                                <p>{{ $data->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="about-avatar-custom d-flex justify-content-end">
                                    <img src="assets/backend/img/accounts/{{ $data->avatar }}" title="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="counter-custom">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="500" data-speed="500">{{ $data->getActiveDuration() }}</h6>
                                        <p class="m-0px font-w-600">Hoạt Động</p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="150" data-speed="150">{{ $data->getCourseCount() }}</h6>
                                        <p class="m-0px font-w-600">Khóa Học</p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="850" data-speed="850">{{ $data->getStudentCount() }}</h6>
                                        <p class="m-0px font-w-600">Học Viên</p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="190" data-speed="190">
                                            <span class="text-warning">
                                                @php
                                                    // tính số sao
                                                    $fullStars = floor($data->rating); // full sao
                                                    $halfStar = $data->rating - $fullStars >= 0.5 ? 1 : 0; //nửa sao
                                                @endphp

                                                <!-- Hiển thị full sao -->
                                                   @for ($i=1; $i <=$fullStars; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor

                                        <!-- Hiển thị nửa sao -->
                                        @if ($halfStar)
                                            <i class="bi bi-star-half"></i>
                                        @endif

                                        <!-- Hiển thị sao trống cho đến tối đa 5 sao -->
                                        @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor

                                        </span>
                                        </h6>
                                    <p class="m-0px font-w-600">
                                        <span class="ms-2">
                                            <small class="text-secondary">({{ $data->rating }} / 5)
                                                ({{ $data->rating_count }} bình chọn)</small>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <div class="container mb-5 pb-3">
        <div class="row">
            <!-- Gói tập -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="dark-color">Khóa Học</h4>
                    <span class="badge text-bg-primary p-2">{{ $data->getCourseCount() }}</span>
                </div>
                <hr>
                @if ($workout_packages && $workout_packages->isNotEmpty())
                    <div class="features_wrapper" id="courses">
                        <div class="swiper courses-swiper-custom">
                            <div class="swiper-wrapper">
                                @foreach ($workout_packages as $item)
                                    <div class="swiper-slide swiper-slide-custom pb-3">
                                        <div class="feature-list">
                                            <img loading='lazy' src="{{ asset('uploads/gym_package/' . $item->image) }}"
                                                class="img-cover" alt="icons">
                                            <span>{{ $item->special_level }}</span>
                                            <h2>{{ $item->package_name }}</h2>
                                            <p>{!! nl2br(strip_tags($item->description)) !!}</p>
                                            <p>Giá: <span
                                                    class="d-inline-block fw-bold fs-5">{{ number_format($item->price, 0, ',', '.') }}
                                                    VNĐ</span></p>
                                            <div class="button-sec">
                                                <a href="{{ route('workout_detail', $item->id) }}">Xem ngay</a>
                                                <a href="#!"><img loading='lazy'
                                                        src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                                        width="25" height="14"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination-custom"></div>
                        </div>
                    </div>
                @else
                    <p class="mb-5">Huấn luyện viên này chưa có khóa học.</p>
                @endif
            </div>

            <!-- Học viên -->
            <div class="col-lg-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="dark-color">Học viên</h4>
                    <span class="badge text-bg-primary p-2">{{ $data->getStudentCount() }}</span>
                </div>
                <hr>
                @if ($students && $students->isNotEmpty())
                    <div class="students-list">
                        @foreach ($students as $student)
                            <div class="student-item">
                                <img src="assets/backend/img/accounts/{{ $student->avatar }}"
                                    alt="{{ $student->user_name }}" class="student-img">
                                <p class="student-name">{{ $student->user_name }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="mb-5">Huấn luyện viên này chưa có học viên.</p>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <!-- Bài viết -->
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="dark-color">Bài viết</h4>
                    <span class="badge text-bg-primary p-2">{{ $posts->count() }}</span>
                </div>
                <hr>
                @if ($posts && $posts->isNotEmpty())
                    <div class="blog mt-0">
                        <div class="container container-trainer-custom">
                            @foreach ($posts as $item)
                                <div class="blog_page_box">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="blog_img_inner"> <img loading="lazy" class="img-fluid"
                                                    src="{{ asset('uploads/post_image/' . $item->image) }}"
                                                    alt="iblog1">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="blog_con_inner">
                                                <h4>Kundalini</h4>
                                                <h3>{{ $item->title }}</h3>
                                                <div class="date_con">
                                                    <div class="date_box">
                                                        <p> {{ $item->created_at }}</p>
                                                    </div>
                                                    <div class="time_box">
                                                        <p><i class="bi bi-person"></i></i>
                                                            {{ $item->getStaffName() }}</p>
                                                    </div>
                                                </div>
                                                <p>{{ $item->description }}</p>
                                                <div class="read_more_blog"> <a href="blog-detail.html" class="blog_btn">
                                                        XEM
                                                        CHI TIẾT <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="mb-5">Huấn luyện viên này tải lên bài viết.</p>
                @endif

            </div>

            <!-- Đánh giá -->
            <div class="col-md-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="dark-color">Đánh giá</h4>
                    <span class="badge text-bg-primary p-2">0</span>
                </div>
                <hr>
                <p>Nội dung đánh giá sẽ ở đây...</p>
            </div>
        </div>
    </div>
@endsection


@section('custom_js')
    <script>
        const coursesSwiper = new Swiper('.courses-swiper-custom', {
            slidesPerView: 3, // Hiển thị 3 slide trên một hàng
            spaceBetween: 20, // Khoảng cách giữa các slide
            pagination: {
                el: '.swiper-pagination-custom',
                clickable: true,
            },
            navigation: {
                nextEl: '.courses-swiper-custom-button-next',
                prevEl: '.courses-swiper-custom-button-prev',
            },
            breakpoints: {
                100: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    </script>
@endsection



