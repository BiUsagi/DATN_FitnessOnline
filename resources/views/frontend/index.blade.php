@extends('frontend/layouts/app-user')

@section('main')
    <!-- BANNER BLOCK START HERE -->
    <div class="banner_wrapper">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                {{-- GIAO DIỆN SLIDE --}}

                @foreach ($slides->take(3) as $slide)
                    <div class="swiper-slide">
                        <div class="banner-slide">
                            <img loading='lazy' data-swiper-parallax="-700"
                                src="{{ asset('assets/backend/img/accounts/' . $slide->image) }}" alt="banner-slide"
                                height="600">
                            <div class="banner-text">
                                <h2 data-swiper-parallax="-800"style="font-size: 50px"> {{ $slide->name }}</h2>
                                <h3 data-swiper-parallax="-1000" style="font-size: 40px">{{ $slide->description }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- BANNER BLOCK END'S HERE -->
    <!-- ABOUT BLOCK START HERE -->
    <div class="about_wrapper default-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="text-center f-0">
                        <img loading='lazy' src="assets/frontend/images/about.webp" alt="img" width="470"
                            height="468" />
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-lg-0 mb-5 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="about_right">
                        <div class="heading">
                            <h2>VỀ PHÒNG TẬP <span>CHÚNG TÔI</span></h2>
                        </div>
                        <p class="mb-3">Tập gym là một hoạt động thể dục giúp cải thiện sức khỏe và vóc dáng thông
                            qua các bài tập với tạ, máy tập, và các bài cardio. Việc tập gym không chỉ giúp tăng cường
                            cơ bắp,
                            đốt cháy mỡ thừa mà còn giúp nâng cao sức bền, cải thiện tinh thần, và giảm căng thẳng.</p>
                        <p>Dù bạn muốn tăng cơ, giảm cân hay đơn giản là duy trì một lối sống lành mạnh, tập gym là một
                            lựa chọn
                            hiệu quả và phù hợp với mọi đối tượng. Hãy bắt đầu hành trình tập luyện để có một cơ thể
                            khỏe mạnh
                            và tự tin hơn mỗi ngày! </p>
                        <a href="{{ route('searchcourse.index') }}"
                            class="btn btn-primary border-info d-dlex align-content-center"
                            style="background-color: #1face1">Hỗ
                            trợ tìm gói
                            tập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT BLOCK END'S HERE -->
    <!-- TEAM BLOCK START HERE -->
    <div class="team_wrapper default-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-12">
                    <div class="left_block">
                        <div class="heading left">
                            <h2>Đội huấn luyện viên <span>Chuyên gia </span></h2>
                            <p>Đội huấn luyện viên chuyên gia được mọi người lựa chọn và tin tưởng, cho kinh nghiệm
                                nhiều năm trong ngành.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="row">
                        @foreach ($PTHot->take(3) as $PT)
                            <div class="col-md-4 f-0">
                                <div class="team-block"
                                    style=" width: 100%;max-width: 100%;height: 100%;  display: flex;align-items: center;justify-content: center;">
                                    <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $PT->avatar) }}"
                                        alt="Coaches">
                                    <h3><span>{{ $PT->staff_name }}</span></h3>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- TEAM BLOCK END'S HERE -->
    <!-- FEATURE BLOCK START HERE -->
    <div class="features_wrapper default-padding" id="courses">
        <div class="container">
            <div class="heading text-center light">
                <h3>Các khóa học <span>của chúng tôi</span></h3>
            </div>
            <div class="swiper Courses_swiper">
                <div class="swiper-wrapper">
                    @foreach ($top_workout_packages as $item)
                        <div class="swiper-slide">
                            <div class="feature-list">
                                <img loading='lazy' src="{{ asset('uploads/gym_package/' . $item->image) }}"
                                    class="img-cover" alt="icons" style="object-fit: cover;">
                                <span>{{ $item->special_level }}</span>
                                <h2>{{ $item->package_name }}</h2>
                                <p>{!! nl2br(strip_tags($item->description)) !!}</p>
                                <p>Giá: <span
                                        class="d-inline-block fw-bold fs-5">{{ number_format($item->price, 0, ',', '.') }}
                                        VNĐ</span></p>
                                <div class="button-sec">
                                    <a href="{{ route('workout_detail', $item->id) }}">Xem ngay</a>
                                    <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg"
                                            alt="icon" width="25" height="14"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="">
                    <div class=" text-center looking pt-3">
                        <a href="{{ route('searchcourse.index') }}" class="text-black ">
                            <h4>Bạn cần hỗ trợ<span> tìm khóa học?</span></h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR BLOG START HERE -->
        <div class="blog_wrapper default-padding" style="background-color: #212225">
            <div class="container">
                <div class="heading text-center">
                    <h3>Tin <span>Tức</span></h3>
                </div>
                
                <div class="row">
                    @foreach ($topPost->take(3) as $Post)
                        <div class="col-lg-4 col-md-8 mx-auto">
                            <div class="card">
                                <a href="{{ route('posts-details.index', $Post->id) }}" aria-label="Blog 3">
                                    <div class="card-img f-0"
                                        style=" width: 100%;max-width: 100%;height: 270px;  display: flex;align-items: center;justify-content: center;">
                                        <img loading='lazy' src="{{ asset('uploads/post_image/' . $Post->image) }}"
                                            alt="" style="object-fit: cover;">
                                    </div>
                                </a>
                                <div class="card-body" style="border: 1px solid #1FACE1">
                                    <span>{{ $Post->created_at->locale('vi')->diffForHumans() }}</span>
                                    <h5 class="card-title truncate-text-tieude">{{ $Post->title }}</h5>
                                    <p class="truncate-text-post card-text">{{ $Post->description }}</p>
                                    <div class="button-sec">
                                        <a href="{{ route('posts-details.index', $Post->id) }}"
                                            aria-label="Blog Details">Chi tiết</a>
                                        <div class="btn-arrow">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 500 279" style="enable-background:new 0 0 500 279;"
                                                xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #222222;
                                                    }
                                                </style>
                                                <path
                                                    d="M495,141.4c-1.4,1.1-3,2.1-4.3,3.4c-41.9,41.8-83.8,83.7-125.6,125.6c-1.3,1.3-2.2,3.1-3.1,4.5
                                                                                c-8.1-8.1-15.2-15.1-22.4-22.4c31.8-31.7,63.7-63.6,96.6-96.4c-144,0-286.7,0-429.8,0c0-10.5,0-20.4,0-30.8c142.8,0,285.6,0,429,0
                                                                                c-32.5-32.5-64.5-64.4-96.3-96.2c7.9-7.9,14.9-14.9,23-23c0.9,1.4,1.8,3.2,3.1,4.5c41.8,41.9,83.7,83.8,125.6,125.6
                                                                                c1.3,1.3,2.9,2.3,4.3,3.4C495,140.2,495,140.8,495,141.4z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!-- GYM SLIDER START HERE -->
    <div class="post_wrapper default-padding">
        <div class="heading text-center" style="margin-bottom: 20px">
            <h3>Huấn <span>luyện viên</span></h3>
        </div>
        <div class="container">
            <div class="swiper gymSwiper">

                <div class="swiper-wrapper">
                    @foreach ($AllPT as $PTall)
                        <div class="swiper-slide">
                            <a href="{{ route('info.trainer', ['id' => $PTall->id]) }}" class="slides"
                                aria-label="Slide 1" style="object-fit: cover; width:250px; height:400px">
                                <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $PTall->avatar) }}"
                                    alt="Post Image" style="object-fit:cover ;width:250px; height:385px; ">
                                <div class="links">
                                    <img loading='lazy' src="assets/frontend/images/icons/link.svg" alt="icon">
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- GYM SLIDER END HERE -->
    </section>
@endsection
