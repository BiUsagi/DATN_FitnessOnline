@extends('frontend/layouts/app-user')


@section('main')
    <section>
        <!-- BREADCRUMB START HERE -->
        <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1>HUẤN LUYỆN<span> VIÊN</span></h1>
                    <div class="trackPage">
                        <a href="{{ route('index') }}">Trang Chủ</a>
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
                                <a href="{{ route('info.trainer', ['id' => $item->id]) }}"><img loading='lazy'
                                        src="assets/backend/img/accounts/{{ $item->avatar }}" class="exp_img"
                                        alt=""></a>
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
                                    <a href="{{ route('info.trainer', ['id' => $item->id]) }}">
                                        <h2>{{ $item->staff_name }}</h2>
                                    </a>
                                    <div class="icon_block d-flex align-items-center justify-content-center">
                                        <div class="icon-cus"></div>
                                        <a href="{{ $item->facebook }}" class="" target="blank">
                                            <i class="bi bi-facebook text-white iconbox-custom"></i>
                                        </a>
                                        <a onclick="copyToClipboard('{{ $item->phone_number }}')"
                                            title="Sao chép số điện thoại">
                                            <i class="bi bi-telephone text-white iconbox-custom"></i>
                                        </a>
                                        <a onclick="copyToClipboard('{{ $item->email }}')" title="Sao chép email">
                                            <i class="bi bi-envelope text-white iconbox-custom"></i>
                                        </a>
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
                                    <a class="pagination-link text-white"
                                        href="{{ $url }}">{{ $page }}</a>
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


@section('custom_js')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Đã sao chép: " + text,
                    showConfirmButton: false,
                    timer: 1000
                });
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
