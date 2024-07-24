@extends('layouts/app-user')


@section('main')
<section>
    <!-- BREADCRUMS SECTION START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <h1>ABOUT <span>Us</span></h1>
                <div class="trackPage">
                    <a href="index.html">HOME</a>
                    <span>About Us</span>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMS SECTION END HERE -->

    <!-- ABOUT BLOCK START HERE -->
    <div class="about_wrapper default-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="text-center f-0">
                        <img loading='lazy' src="assets/images/about.webp" alt="img" />
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-lg-0 mb-5 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="about_right">
                        <div class="heading">
                            <h2>ABOUT <span>GYMFIT</span></h2>
                        </div>
                        <p class="mb-3">Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo
                            blandit porta. Duis purus sapien, blandit non sem quis, mollis vehicula sapien. Fusce mollis
                            mauris vitae enim varius scelerisque id id ex. Maecenas vel iaculis purus, a ornare quam.
                        </p>
                        <p>Morbi commodo sapien at risus aliquam dapibus. Quisque ullamcorper ex non leo blandit porta.
                            Duis purus sapien, blandit non sem quis, mollis vehicula sapien. </p>
                        <a href="contact-us.html" class="btn">Get Started </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT BLOCK END'S HERE -->

    <!-- WHY CHOOSE SECTION START HERE -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-end">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="why-choose-us-left">
                        <img loading='lazy' src="assets/images/why-choose-us.webp" alt="">
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="why-choose-right">
                        <div class="heading why-choose-title left">
                            <h2>Why Choose <span>Us</span></h2>
                        </div>
                        <p>Suspendisse consectetur congue orci, eu cursus ante ultrices sit amet. Morbi egestas
                            purus ut purus scelerisque, vel iaculis neque molestie. Pellentesque rhoncus felis sed
                            enim finibus pulvinar.</p>
                        <div class="gym-progressbar">
                            <div class="single-progressbar">
                                <h4 class="title">GYM</h4>
                                <div class="gym"></div>
                            </div>
                            <div class="single-progressbar">
                                <h4 class="title">YOGA</h4>
                                <div class="yoga"></div>
                            </div>
                            <div class="single-progressbar">
                                <h4 class="title">BUILD BODY</h4>
                                <div class="build-body"></div>
                            </div>
                            <div class="single-progressbar">
                                <h4 class="title">MARTIAL ARTS</h4>
                                <div class="martial-arts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WHY CHOOSE SECTION END HERE -->

    <!-- CLIENT SAY'S SECTION START HERE -->
    <div class="client-say default-padding">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-lg-6">
                    <div class="heading client-say-content">
                        <h2>What Client's <span>Say</span></h2>
                        <p>Quisque ullamcorper ex non leo blandit porta. Duis purus sapien, blandit non sem quis,
                            mollis
                            vehicula sapien.</p>
                    </div>
                </div>
            </div>
            <div class="swiper clientSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-one.webp" alt="">
                                <div class="client-info">
                                    <h6>Kiara Milly</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-two.webp" alt="">
                                <div class="client-info">
                                    <h6>Rihana Smith</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-three.webp" alt="">
                                <div class="client-info">
                                    <h6>John Doe</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-one.webp" alt="">
                                <div class="client-info">
                                    <h6>Kiara Milly</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-one.webp" alt="">
                                <div class="client-info">
                                    <h6>Kiara Milly</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client-details">
                            <div class="d-flex">
                                <img loading='lazy' src="assets/images/client-one.webp" alt="">
                                <div class="client-info">
                                    <h6>Kiara Milly</h6>
                                    <p>Personal Trainer</p>
                                </div>
                            </div>
                            <p class="text-center">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis will
                                voluptatum deleniti atque.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- CLIENT SAY'S SECTION START HERE -->

    <!-- GYM VIDEO START HERE -->
    <div class="Video">
        <div class="video-inner">
            <video controls>
                <source src="assets/video/video.mp4">
            </video>
            <button class="video-play" id="playpause">
                <div class="gym-video">
                    <img loading='lazy' src="assets/images/icons/play-button-arrowhead.webp" alt="icon" class="play">
                    <img loading='lazy' src="assets/images/icons/pause-button-arrowhead.webp" alt="icon" class="pause">
                </div>
                <div class="video_text">
                    <div class="text">
                        <h5>EXPLORE FITNESS COMPLEX</h5>
                        <span class="watch">Watch Now !</span>
                    </div>
                </div>
            </button>
        </div>
    </div>
    <!-- GYM VIDEO END HERE -->

    <!-- TEAM BLOCK START HERE -->
    <div class="team_wrapper default-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-12">
                    <div class="left_block">
                        <div class="heading left">
                            <h2>Team of expert <span>Coaches</span></h2>
                            <p>Vivamus in imperdiet libero, at dapibus eros. In varius lacinia gravida. Aenean dignissim
                                nulla nibh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="row">
                        <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/images/team/1.webp" alt="Coaches">
                                <h3>Joshua <span>Franklin</span></h3>
                            </div>
                        </div>
                        <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/images/team/2.webp" alt="Coaches">
                                <h3>Reflina <span>Deovanger</span></h3>
                            </div>
                        </div>
                        <div class="col-md-4 f-0">
                            <div class="team-block">
                                <img loading='lazy' src="assets/images/team/3.webp" alt="Coaches">
                                <h3>Devin <span>Tremson</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TEAM BLOCK END'S HERE -->

</section>
@endsection