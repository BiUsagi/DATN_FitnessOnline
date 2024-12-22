@extends('frontend/layouts/app-user')


@section('main')
<section>
    <!-- BREADCRUMS SECTION START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <h1>Gói tập của <span>{{ Auth::user()->user_name }}</span></h1>
                <div class="trackPage">
                    <a href="/">HOME</a>
                    <span>Gói tập của {{ Auth::user()->user_name }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMS SECTION END HERE -->
    <div class="default-padding">
        <div class="container">
            <div class="row customize-responsive">
                <div class="col-lg-3 order-2 order-lg-1">
                        <div class="sidebar-workout">
                            <div class="title">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="list-category">
                                <a href="#!">Tất cả gói tập <p>3</p></a>
                                <a href="#!">Gói tập đang thực hiện <p>1</p></a>
                                <a href="#!">Gói tập đã hoàn thành <p>2</p></a>
                                <a href="#!">Gói tập yêu thích <p>2</p></a>
                            </div>
                            <div class="search-workout">
                                <input type="text" placeholder="Tìm kiếm...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2 mb-lg-0 mb-5 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="about_right">
                        <div class="section">
                            <div class="box-list">
                                @foreach ($workouts as $workout)
                                    <div class="card-custom">
                                        <div class="card-body-custom">
                                            <div class="image-package">
                                                <img src="{{ asset('uploads/gym_package/'. $workout->workoutPackage->image)}}" alt="">
                                                <div class="box-action">
                                                    <a href="{{route('workout_hub', $workout->workoutPackage->id)}}"><i class="fa-regular fa-circle-play"></i></a>
                                                </div>
                                            </div>
                                            <div class="content-package">
                                                <a href="#">{{$workout->workoutPackage->package_name}}</a>
                                                <p>Loại gói tập: {{$workout->workoutPackage->level}}</p>
                                                <div class="price-status">
                                                    @php
                                                        $progress = $workout->progress == 100 ? 'Đã hoàn thành' : 'Đang thực hiện'; 
                                                        $progressCss = $workout->progress == 100 ? 'completed' : ''; 
                                                    @endphp
                                                    <span class="price">Tác giả: <a href="#!">{{$workout->workoutPackage->staff->staff_name}}</a></span>
                                                    <p class="status {{$progressCss}}">{{$progress}}</p>
                                                </div>
                                                <div class="duration">
                                                    <div class="progress-bar-customize">
                                                        <div class="progress-customize" style="width: {{ $workout->progress }}%"></div>
                                                    </div>
                                                    <div class="box-feedback">
                                                        <p>Hoàn thành {{ $workout->progress }}%</p>
                                                        <div class="feedback">
                                                            <div class="star">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star-half-stroke"></i>
                                                            </div>
                                                            <p>Đưa ra xếp hạng</p>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection