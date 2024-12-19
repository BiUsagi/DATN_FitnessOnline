@extends('frontend/layouts/app-user')


@section('main')
    <section>
        <!-- BREADCRUMS SECTION START HERE -->
        <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1>GIỚI THIỆU VỀ <span>chúng tôi</span></h1>
                    <div class="trackPage">
                        <a href="index.html">trang chủ</a>
                        <span>giới thiệu</span>
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
                            <img loading='lazy' src="assets/frontend/images/about.webp" alt="img" />
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 mb-lg-0 mb-5 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="about_right">
                            <div class="heading">
                                <h2>giới thiệu về <span>FITNESS ONLINE</span></h2>
                            </div>
                            <p class="mb-3">Fitness Online là giải pháp tuyệt vời cho những ai muốn duy trì sức khỏe mà không cần ra khỏi nhà. Với các khóa học và hướng dẫn tập luyện trực tuyến, người dùng có thể truy cập vào các bài tập phù hợp với mục tiêu và khả năng của mình bất cứ lúc nào. Web fitness cung cấp sự linh hoạt tối đa, giúp bạn dễ dàng sắp xếp thời gian và không bị giới hạn bởi không gian hay lịch trình của các phòng gym. Chỉ cần một chiếc máy tính hoặc điện thoại kết nối internet, bạn có thể tham gia các lớp tập luyện từ các huấn luyện viên chuyên nghiệp mà không cần phải di chuyển.
                            </p>
                            <p>
                                Fitness online không chỉ mang lại sự thuận tiện mà còn đảm bảo hiệu quả nhờ sự giám sát chặt chẽ từ các huấn luyện viên cá nhân (PT). Các PT chuyên nghiệp sẽ theo dõi và hướng dẫn bạn qua từng bài tập, giúp điều chỉnh kỹ thuật và đảm bảo bạn thực hiện đúng các động tác, tránh chấn thương. Với sự hỗ trợ của công nghệ, các huấn luyện viên có thể cung cấp phản hồi nhanh chóng, điều chỉnh kế hoạch tập luyện sao cho phù hợp với tiến độ và mục tiêu của mỗi người. Điều này giúp tối ưu hóa hiệu quả tập luyện, mang lại kết quả nhanh chóng và bền vững ngay tại nhà. </p>
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
                            <img loading='lazy' src="assets/frontend/images/why-choose-us.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <div class="why-choose-right">
                            <div class="heading why-choose-title left">
                                <h2>Vì sao chọn <span>chúng tôi</span></h2>
                            </div>
                            <p>Bởi vì Fitness Online mang lại sự thuận tiện khi không cần phải ra ngoài, có thể lựa chọn bài tập phù hợp và mang lại hiệu quả cao nhờ sự kiểm soát chặt chẽ của các huấn luyện viên.</p>
                            <div class="gym-progressbar">
                                <div class="single-progressbar">
                                    <h4 class="title">THUẬN TIỆN </h4>
                                    <div class="gym"></div>
                                </div>
                                <div class="single-progressbar">
                                    <h4 class="title">DỄ DÀNG</h4>
                                    <div class="yoga"></div>
                                </div>
                                <div class="single-progressbar">
                                    <h4 class="title">NHANH CHÓNG</h4>
                                    <div class="build-body"></div>
                                </div>
                                <div class="single-progressbar">
                                    <h4 class="title">PHÙ HỢP</h4>
                                    <div class="martial-arts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- WHY CHOOSE SECTION END HERE -->

 

        <!-- GYM VIDEO START HERE -->
        <div class="Video">
            <div class="video-inner">
                <video controls>
                    <source src="assets/frontend/video/video.mp4">
                </video>
                <button class="video-play" id="playpause">
                    <div class="gym-video">
                        <img loading='lazy' src="assets/frontend/images/icons/play-button-arrowhead.webp" alt="icon"
                            class="play">
                        <img loading='lazy' src="assets/frontend/images/icons/pause-button-arrowhead.webp" alt="icon"
                            class="pause">
                    </div>
                    <div class="video_text">
                        <div class="text">
                            <h5>KHÁM PHÁ FITNESS ONLINE</h5>
                            <span class="watch">Xem ngay !</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <!-- GYM VIDEO END HERE -->

        <!-- TEAM BLOCK START HERE -->
        {{-- <div class="team_wrapper default-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-12">
                        <div class="left_block">
                            <div class="heading left">
                                <h2>ĐỘI NGŨ <span>HƯỚNG DẪN</span></h2>
                                <p>Vivamus in imperdiet libero, at dapibus eros. In varius lacinia gravida. Aenean dignissim
                                    nulla nibh.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="row">
                            <div class="col-md-4 f-0">
                                <div class="team-block">
                                    <img loading='lazy' src="assets/frontend/images/team/1.webp" alt="Coaches">
                                    <h3>Joshua <span>Franklin</span></h3>
                                </div>
                            </div>
                            <div class="col-md-4 f-0">
                                <div class="team-block">
                                    <img loading='lazy' src="assets/frontend/images/team/2.webp" alt="Coaches">
                                    <h3>Reflina <span>Deovanger</span></h3>
                                </div>
                            </div>
                            <div class="col-md-4 f-0">
                                <div class="team-block">
                                    <img loading='lazy' src="assets/frontend/images/team/3.webp" alt="Coaches">
                                    <h3>Devin <span>Tremson</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- TEAM BLOCK END'S HERE -->

    </section>
@endsection
