@extends('frontend/layouts/app-user')


@section('main')
<section>
    <!-- BREADCRUMS SECTION START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <img src="assets/frontend/images/banner/slide2.png" alt="" height="250px" style="z-index: 2 ">
                <h2 class="name-author">Minh Tuấn</h2>
            </div>
        </div>
    </div>
    <!-- BREADCRUMS SECTION END HERE -->

    <!-- ABOUT BLOCK START HERE -->
    <div class="default-padding">
        <div class="container">
            <div class="row">
                    <div class="col-8">
                            <h2 class="title">{{$package->package_name}}</h2>
                            <p class="description">{!! $package->description !!}</p>
                            <span class="title-content">Nôi dung gói tập</span>
                            <div class="infor-package">
                                <p>20 ngày tập</p>
                                <p>50 bài tập</p>
                            </div>
                            <div class="list-days">
                                @for ($i = 1; $i <= $package->duration_days; $i++)
                                    <div class="box-day">
                                        <span class="day"><i class="fa-solid fa-dumbbell me-2"></i> Ngày {{$i}}</span>
                                        <span class="quantity-exercise">3 bài tập</span>
                                    </div>
                                @endfor
                            </div>
                    </div>
                    <div class="col-4">
                        <div class="image-container">
                            <img src="{{ asset('uploads/gym_package/' . $package->image) }}" alt="" class="hover-image">
                        </div>
                        <div class="buy">
                            <h3 class="price">{{ number_format($package->price, 0, ',', '.') }} VNĐ</h3>
                            <a href="#" class="by-now">Mua ngay</a>
                        </div>
                        <div class="box">
                            <div class="infor-workout">
                                <p><i class="fa-solid fa-gauge-high"></i> {{$package->level}}</p>
                                <p><i class="fa-solid fa-calendar-days"></i> Tổng số 20 ngày tập</p>
                                <p><i class="fa-solid fa-book-open"></i> Tổng số 50 bài tập</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- ABOUT BLOCK END'S HERE -->


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
                                <img loading='lazy' src="assets/frontend/images/client-one.webp" alt="">
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
                                <img loading='lazy' src="assets/frontend/images/client-two.webp" alt="">
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
                                <img loading='lazy' src="assets/frontend/images/client-three.webp" alt="">
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
                                <img loading='lazy' src="assets/frontend/images/client-one.webp" alt="">
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
                                <img loading='lazy' src="assets/frontend/images/client-one.webp" alt="">
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
                                <img loading='lazy' src="assets/frontend/images/client-one.webp" alt="">
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

</section>
@endsection