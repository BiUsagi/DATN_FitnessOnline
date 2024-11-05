@extends('frontend/layouts/app-user')


@section('main')
    <section>
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

        <section class="expert trainer_section section-wrapper">
            <div class="container">
                <div class="heading text-center p-5">
                    <h3>Huấn luyện viên <span>chuyên nghiệp</span></h3>
                </div>
                <div class="row justify-content-center">


                    @foreach ($data as $item)
                        {{-- trainer --}}
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="expert-details ">
                                <img loading='lazy' src="assets/backend/img/accounts/{{ $item->avatar }}" class="exp_img"
                                    alt="">
                                <div class="content">
                                    <span class="text-warning">
                                        @php
                                            // tính số sao
                                            $fullStars = floor($item->rating); // full sao
                                            $halfStar = $item->rating - $fullStars >= 0.5 ? 1 : 0; //nửa sao
                                        @endphp

                                        <!-- Hiển thị full sao -->
                                        @for ($i = 1; $i <= $fullStars; $i++)
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
                                    <h2>{{ $item->staff_name }}</h2>
                                    <div class="icon_block d-flex align-items-center justify-content-center">
                                        <a href="#"><svg class="icon" width="8.876" height="16.28"
                                                viewBox="0 0 8.876 16.28">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #292929;
                                                            fill-rule: evenodd;
                                                        }
                                                    </style>
                                                </defs>
                                                <path id="Forma_1" data-name="Forma 1" class="cls-1"
                                                    d="M175.105,5610.36h-2.13a3.72,3.72,0,0,0-3.939,4v1.85H166.9a0.334,0.334,0,0,0-.335.33v2.68a0.334,0.334,0,0,0,.335.33h2.141v6.76a0.334,0.334,0,0,0,.335.33h2.794a0.334,0.334,0,0,0,.335-0.33v-6.76H175a0.334,0.334,0,0,0,.335-0.33v-2.68a0.333,0.333,0,0,0-.1-0.23,0.35,0.35,0,0,0-.237-0.1h-2.5v-1.56a0.95,0.95,0,0,1,1.17-1.14h1.435a0.334,0.334,0,0,0,.335-0.33v-2.49A0.334,0.334,0,0,0,175.105,5610.36Z"
                                                    transform="translate(-166.562 -5610.34)" />
                                            </svg></a>
                                        <a href="#"><svg class="icon" width="16" height="13"
                                                viewBox="0 0 16 13">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #292929;
                                                            fill-rule: evenodd;
                                                        }
                                                    </style>
                                                </defs>
                                                <path id="Forma_1" data-name="Forma 1" class="cls-1"
                                                    d="M209.559,5612.24a6.812,6.812,0,0,1-2.086.8,3.284,3.284,0,0,0-5.593,2.99,9.352,9.352,0,0,1-6.766-3.43,3.287,3.287,0,0,0,1.016,4.38,3.381,3.381,0,0,1-1.486-.41v0.04a3.286,3.286,0,0,0,2.632,3.22,3.5,3.5,0,0,1-.864.11,3.151,3.151,0,0,1-.618-0.06,3.268,3.268,0,0,0,3.065,2.28,6.592,6.592,0,0,1-4.076,1.41,6.745,6.745,0,0,1-.783-0.05,9.328,9.328,0,0,0,14.37-7.86l-0.01-.43a6.685,6.685,0,0,0,1.64-1.69,6.61,6.61,0,0,1-1.885.51A3.288,3.288,0,0,0,209.559,5612.24Z"
                                                    transform="translate(-194 -5612)" />
                                            </svg></a>
                                        <a href="#"><svg class="icon" width="16.062" height="16.06"
                                                viewBox="0 0 16.062 16.06">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #292929;
                                                            fill-rule: evenodd;
                                                        }
                                                    </style>
                                                </defs>
                                                <path id="Forma_1" data-name="Forma 1" class="cls-1"
                                                    d="M236.011,5609.97h-6.022a5.021,5.021,0,0,0-5.019,5.02v6.02a5.021,5.021,0,0,0,5.019,5.02h6.022a5.022,5.022,0,0,0,5.019-5.02v-6.02A5.022,5.022,0,0,0,236.011,5609.97Zm3.513,11.04a3.513,3.513,0,0,1-3.513,3.51h-6.022a3.512,3.512,0,0,1-3.513-3.51v-6.02a3.52,3.52,0,0,1,3.513-3.52h6.022a3.521,3.521,0,0,1,3.513,3.52v6.02ZM233,5613.98a4.015,4.015,0,1,0,4.015,4.02A4.017,4.017,0,0,0,233,5613.98Zm0,6.53a2.51,2.51,0,1,1,2.509-2.51A2.515,2.515,0,0,1,233,5620.51Zm4.316-7.36a0.535,0.535,0,1,1-.535.53A0.534,0.534,0,0,1,237.316,5613.15Z"
                                                    transform="translate(-224.969 -5609.97)" />
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end trainer --}}
                    @endforeach


                    {{-- phân trang --}}
                    <div class="pagination-container d-flex justify-content-center">
                        <ul class="pagination">
                            {{-- Nút Previous --}}
                            @if ($data->onFirstPage())
                                <li class="pagination-item--wide first">
                                    <a class="pagination-link--wide text-secondary disabled" href="#">&lt;
                                        Trước</a>
                                </li>
                            @else
                                <li class="pagination-item--wide first">
                                    <a class="pagination-link--wide text-white" href="{{ $data->previousPageUrl() }}">&lt;
                                        Trước</a>
                                </li>
                            @endif
                            <li class="pagination-item first-number"></li>
                            {{-- Danh sách các trang --}}
                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                <li class="pagination-item {{ $page == $data->currentPage() ? 'is-active' : '' }}">
                                    <a class="pagination-link text-white" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Nút Next --}}
                            @if ($data->hasMorePages())
                                <li class="pagination-item--wide last">
                                    <a class="pagination-link--wide text-white" href="{{ $data->nextPageUrl() }}">Tiếp
                                        &gt;</a>
                                </li>
                            @else
                                <li class="pagination-item--wide last">
                                    <a class="pagination-link--wide text-secondary disabled" href="#">Tiếp
                                        &gt;</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
