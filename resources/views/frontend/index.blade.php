@extends('frontend/layouts/app-user')

@section('main')
<section>
    <!-- BANNER BLOCK START HERE -->
    <div class="banner_wrapper">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                {{-- <div class="swiper-slide">
                    <div class="banner-slide">
                        <img loading='lazy' data-swiper-parallax="-700" src="assets/frontend/images/banner/slide1.png"
                            alt="banner-slide" width="900" height="666">
                        <div class="banner-text">
                            <h2 data-swiper-parallax="-800">BUILD YOUR</h2>
                            <h3 data-swiper-parallax="-1000">BODY</h3>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="swiper-slide">
                    <div class="banner-slide">
                        <img loading='lazy' data-swiper-parallax="-700" src="assets/frontend/images/banner/slide2.png"
                            alt="banner-slide" width="700" height="800">
                        <div class="banner-text">
                            <h2 data-swiper-parallax="-800">BUILD YOUR</h2>
                            <h3 data-swiper-parallax="-1000">Shape</h3>
                        </div>
                    </div>
                </div> --}}

                {{-- GIAO DIỆN SLIDE --}}

                @foreach($slides->take(3) as $slide)
                    <div class="swiper-slide">
                        <div class="banner-slide">
                            <img loading='lazy' data-swiper-parallax="-700" src="{{ asset('assets/backend/img/accounts/' . $slide->image) }}" alt="banner-slide" height="600">
                            <div class="banner-text">
                                <h2 data-swiper-parallax="-800"style="font-size: 40px">{{$slide->description}}</h2>
                                <h3 data-swiper-parallax="-1000" style="font-size: 75px">{{$slide->name}}</h3>
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
                        <img loading='lazy' src="assets/frontend/images/about.webp" alt="img" width="470" height="468" />
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-lg-0 mb-5 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="about_right">
                        <div class="heading">
                            <h2>VỀ PHÒNG TẬP <span>GYMFIT</span></h2>
                        </div>
                        <p class="mb-3">Tập gym là một hoạt động thể dục giúp cải thiện sức khỏe và vóc dáng thông
                                        qua các bài tập với tạ, máy tập, và các bài cardio. Việc tập gym không chỉ giúp tăng cường cơ bắp, 
                                        đốt cháy mỡ thừa mà còn giúp nâng cao sức bền, cải thiện tinh thần, và giảm căng thẳng.</p>
                        <p>Dù bạn muốn tăng cơ, giảm cân hay đơn giản là duy trì một lối sống lành mạnh, tập gym là một lựa chọn
                            hiệu quả và phù hợp với mọi đối tượng. Hãy bắt đầu hành trình tập luyện để có một cơ thể khỏe mạnh
                            và tự tin hơn mỗi ngày! </p>
                        <a href="contact-us.html" class="btn">Get Started </a>
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
                            <p>Đội huấn luyện viên chuyên gia được mọi người lựa chọn và tin tưởng, chó kinh nghiệm nhiều năm trong ngành.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="row">
                        @foreach ($PTHot->take(3) as $PT)
                            <div class="col-md-4 f-0">
                                <div class="team-block">
                                    <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $PT->avatar) }}" alt="Coaches" width="210"
                                        height="339">
                                    <h3><span>{{$PT->staff_name}}</span></h3>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/frontend/images/team/1.webp" alt="Coaches" width="210"
                                    height="339">
                                <h3>Joshua <span>Franklin</span></h3>
                            </div>
                        </div>
                        <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/frontend/images/team/2.webp" alt="Coaches" width="210"
                                    height="339">
                                <h3>Reflina <span>Deovanger</span></h3>
                            </div>
                        </div>
                        <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/frontend/images/team/3.webp" alt="Coaches" width="210"
                                    height="339">
                                <h3>TUẤN</h3>
                            </div> --}}
                        </div>
                        
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
                <h3>Our <span>Courses</span></h3>
            </div>
            <div class="swiper Courses_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-1.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Kettlebells Course</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-2.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Weight Lifting</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-3.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Running</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-4.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Meditation</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-5.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Body Building</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-list">
                            <img loading='lazy' src="assets/frontend/images/icons/courses-6.svg" alt="icons" width="60"
                                height="60">
                            <span>GYM</span>
                            <h2>Cardio Exercises</h2>
                            <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit
                                porta. </p>
                            <div class="button-sec">
                                <a href="#!">Read More</a>
                                <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon"
                                        width="25" height="14"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- FEATURE BLOCK END'S HERE -->
    <!-- PRICING BLOCK START HERE -->
    <div class="pricing_wrapper default-padding-top">
        <div class="container">
            <div class="heading left">
                <h3>Our <span>Pricing</span></h3>
            </div>
            <div class="row align-items-end">
                <div class="col-xl-9 col-lg-12">
                    <div class="default-padding-bottom">
                        <div class="row">
                            @foreach ($top_workout_packages as $top_workout_package)
                            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                                <div class="plan_block">
                                    <h3>{{$top_workout_package->package_name}}</h3>
                                    {{-- <h4>Only for first month</h4> --}}
                                    <p>
                                        {{$top_workout_package->description}}
                                    </p>
                                    <h2>{{$top_workout_package->	price}}</h2>
                                    <a href="contact-us.html" class="btn">Buy Now</a>
                                </div>
                            </div>
                            @endforeach
                            
                            {{-- <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                                <div class="plan_block">
                                    <h3>Standard Account</h3>
                                    <h4>Only for first month</h4>
                                    <p>
                                        Vivamus in imperdiet libero, at dapibus eros. In varius lacinia gravida.
                                        Aenean dignissim nulla nibh.
                                    </p>
                                    <h2>$69.00</h2>
                                    <a href="contact-us.html" class="btn">Buy Now</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="plan_block">
                                    <h3>Premium Account</h3>
                                    <h4>Only for first month</h4>
                                    <p>
                                        Vivamus in imperdiet libero, at dapibus eros. In varius lacinia gravida.
                                        Aenean dignissim nulla nibh.
                                    </p>
                                    <h2>$99.00</h2>
                                    <a href="contact-us.html" class="btn">Buy Now</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-xl-block d-none">
                    <div class="images_wrapper f-0">
                        <img loading='lazy' src="assets/frontend/images/pricing-2.webp" alt="pricing">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRICING BLOCK END'S HERE -->
    <!-- OUR BLOG START HERE -->
    <div class="blog_wrapper default-padding">
        <div class="container">
            <div class="heading text-center">
                <h3>OUR <span>Blog</span></h3>
            </div>
            <div class="row">
                {{-- <div class="col-lg-4 col-md-8 mx-auto mb-xl-0 mb-4">
                    <div class="card">
                        <a href="blog-details.html" aria-label="Blog 1">
                            <div class="card-img f-0">
                                <img loading='lazy' src="assets/frontend/images/blog/blog-1.webp" alt="">
                            </div>
                        </a>
                        <div class="card-body">
                            <span>05 Aug, 2018</span>
                            <h5 class="card-title">Vestibulum sodales, nisi et gravida cidunt, felis est auctor</h5>
                            <p class="card-text">It’s no secret that the digital industry is booming. From exciting
                                startups to global brands, companies are reaching out to digital agencies, responding to
                                the new possibilities available. </p>
                            <div class="button-sec">
                                <a href="blog-details.html" aria-label="Blog Details">More Details</a>
                                <div class="btn-arrow">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 279"
                                        style="enable-background:new 0 0 500 279;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #222222;
                                            }
                                        </style>
                                        <path d="M495,141.4c-1.4,1.1-3,2.1-4.3,3.4c-41.9,41.8-83.8,83.7-125.6,125.6c-1.3,1.3-2.2,3.1-3.1,4.5
                                            c-8.1-8.1-15.2-15.1-22.4-22.4c31.8-31.7,63.7-63.6,96.6-96.4c-144,0-286.7,0-429.8,0c0-10.5,0-20.4,0-30.8c142.8,0,285.6,0,429,0
                                            c-32.5-32.5-64.5-64.4-96.3-96.2c7.9-7.9,14.9-14.9,23-23c0.9,1.4,1.8,3.2,3.1,4.5c41.8,41.9,83.7,83.8,125.6,125.6
                                            c1.3,1.3,2.9,2.3,4.3,3.4C495,140.2,495,140.8,495,141.4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-md-8 mx-auto mb-xl-0 mb-4">
                    <div class="card">
                        <a href="blog-details.html" aria-label="Blog 2">
                            <div class="card-img f-0">
                                <img loading='lazy' src="assets/frontend/images/blog/blog-2.webp" alt="">
                            </div>
                        </a>
                        <div class="card-body">
                            <span>05 Aug, 2018</span>
                            <h5 class="card-title">Vestibulum sodales, nisi et gravida cidunt, felis est auctor</h5>
                            <p class="card-text">It’s no secret that the digital industry is booming. From exciting
                                startups to global brands, companies are reaching out to digital agencies, responding to
                                the new possibilities available. </p>
                            <div class="button-sec">
                                <a href="blog-details.html" aria-label="Blog Details">More Details</a>
                                <div class="btn-arrow">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 279"
                                        style="enable-background:new 0 0 500 279;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #222222;
                                            }
                                        </style>
                                        <path d="M495,141.4c-1.4,1.1-3,2.1-4.3,3.4c-41.9,41.8-83.8,83.7-125.6,125.6c-1.3,1.3-2.2,3.1-3.1,4.5
                                            c-8.1-8.1-15.2-15.1-22.4-22.4c31.8-31.7,63.7-63.6,96.6-96.4c-144,0-286.7,0-429.8,0c0-10.5,0-20.4,0-30.8c142.8,0,285.6,0,429,0
                                            c-32.5-32.5-64.5-64.4-96.3-96.2c7.9-7.9,14.9-14.9,23-23c0.9,1.4,1.8,3.2,3.1,4.5c41.8,41.9,83.7,83.8,125.6,125.6
                                            c1.3,1.3,2.9,2.3,4.3,3.4C495,140.2,495,140.8,495,141.4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @foreach ($topPost->take(3) as $Post)
                    <div class="col-lg-4 col-md-8 mx-auto">
                        <div class="card">
                            <a href="{{ route('posts-details.index', $Post->id) }}" aria-label="Blog 3">
                                <div class="card-img f-0">
                                    <img loading='lazy' src="{{ asset('assets/backend/img/' . $Post->image) }}" alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <span>{{$Post->created_at}}</span>
                                <h5 class="card-title">{{$Post->title}}</h5>
                                <p class="card-text">{{$Post->description}}</p>
                                <div class="button-sec">
                                    <a href="{{ route('posts-details.index', $Post->id) }}" aria-label="Blog Details">Chi tiết</a>
                                    <div class="btn-arrow">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 279"
                                            style="enable-background:new 0 0 500 279;" xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #222222;
                                                }
                                            </style>
                                            <path d="M495,141.4c-1.4,1.1-3,2.1-4.3,3.4c-41.9,41.8-83.8,83.7-125.6,125.6c-1.3,1.3-2.2,3.1-3.1,4.5
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
    <!-- OUR BLOG END'S HERE -->
    <!-- GET IT TOUCH START HERE -->
    <div class="contact_wrapper">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-end">
                <div class="col-lg-6 col-md-8 col-sm-8 order-2 order-lg-1">
                    <div class="get-touch-banner">
                        <img loading='lazy' src="assets/frontend/images/get-touch-img.webp" alt="">
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="get-in-right">
                        <div class="heading left">
                            <h2>Get In <span>Touch</span></h2>
                        </div>
                        <div class="send-message-form">
                            <h4>Send us a message</h4>
                            <form method="POST" class="form input-disabled-form">
                                <div class="form-row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="firstname" class="user-input"
                                                    placeholder="Name*" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="number" name="phone" class="user-input"
                                                    placeholder="Phone No.*" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="user-input" placeholder="Email*"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea type="text" name="message" class="user-input"
                                                placeholder="Message*" spellcheck="false" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn" type="submit">
                                    <span>Send Message</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GET IT TOUCH END HERE -->
    <!-- GYM SLIDER START HERE -->
    <div class="post_wrapper default-padding">
        <div class="container">
            <div class="swiper gymSwiper">
                <div class="swiper-wrapper">
                    @foreach ($AllPT as $PTall)
                        <div class="swiper-slide">
                            <a href="#!" class="slides" aria-label="Slide 1">
                                <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $PTall->avatar) }}" alt="Post Image" width="309"
                                    height="309">
                                <div class="links">
                                    <img loading='lazy' src="assets/frontend/images/icons/link.svg" alt="icon">
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
                    {{-- <div class="swiper-slide">
                        <a href="#!" class="slides" aria-label="Slide 2">
                            <img loading='lazy' src="assets/frontend/images/post/post-2.webp" alt="Post Image" width="309"
                                height="309">
                            <div class="links">
                                <img loading='lazy' src="assets/frontend/images/icons/link.svg" alt="icon">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#!" class="slides" aria-label="Slide 3">
                            <img loading='lazy' src="assets/frontend/images/post/post-3.webp" alt="Post Image" width="309"
                                height="309">
                            <div class="links">
                                <img loading='lazy' src="assets/frontend/images/icons/link.svg" alt="icon">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#!" class="slides" aria-label="Slide 3">
                            <img loading='lazy' src="assets/frontend/images/post/post-4.webp" alt="Post Image" width="309"
                                height="309">
                            <div class="links">
                                <img loading='lazy' src="assets/frontend/images/icons/link.svg" alt="icon">
                            </div>
                        </a>
                    </div> --}}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- GYM SLIDER END HERE -->
</section>
@endsection