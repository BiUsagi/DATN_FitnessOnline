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
    <form action="" id="form-pay" method="post">
        @csrf

        <div class="input-hidden">
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="voucher_id" id="voucher_id">
            <input type="hidden" name="workout_package_id" value="{{ $package->id }}">
            <input type="hidden" name="original_price" id="original_price" value="{{ $package->price }}">
            <input type="hidden" name="purchase_price" id="purchase_price" value="{{ $package->price }}">
        </div>

        <div class="default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2 class="title">{{ $package->package_name }}</h2>
                        <p class="description">{!! $package->description !!}</p>
                        <span class="title-content">Nôi dung gói tập</span>
                        <div class="infor-package">
                            <p>20 ngày tập</p>
                            <p>50 bài tập</p>
                        </div>
                        <div class="list-days">
                            @for ($i = 1; $i <= $package->duration_days; $i++)
                                <div class="box-day">
                                    <span class="day"><i class="fa-solid fa-dumbbell me-2"></i> Ngày
                                        {{ $i }}</span>
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
                            <div id="button-pay"></div>
                        </div>
                        <div class="box">
                            <div class="infor-workout">
                                <p><i class="fa-solid fa-gauge-high"></i> {{ $package->level }}</p>
                                <p><i class="fa-solid fa-calendar-days"></i> Tổng số 20 ngày tập</p>
                                <p><i class="fa-solid fa-book-open"></i> Tổng số 50 bài tập</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered">
                <div class="modal-content" style="min-height: 50vh; display: flex; align-items: center;">
                    <div class="row w-100">
                        <div class="col-md-7 col-12 mb-3 pt-3">
                            <div class="row">
                                <div class="col-3"><img src="{{ asset('uploads/gym_package/' . $package->image) }}"
                                        class="hover-image rounded-circle avatar"></div>
                                <div class="col-9">
                                    <div class="col-12">
                                        <h3 class="title-modal text-info"><strong>{{ $package->package_name }}</strong>
                                        </h3>
                                    </div>
                                    <div class="col-12"><strong>PT: Minh Tuấn</strong></div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p>Thời gian: {{ $package->duration_days }} ngày.</p>
                                </div>
                                <div class="col-6">
                                    <p>Bài tập: 50 bài. </p>
                                </div>
                            </div>
                            <div class="row pt-2 pb-4">
                                <div class="col-6">
                                    <p>Mức độ: {{ $package->level }}.</p>
                                </div>
                                <div class="col-6">
                                    <p>Luợt mua: {{ $package->duration_days }} người.</p>
                                </div>
                            </div>
                            <div>
                                <h5>Bạn nhận được gì khi mua gói:</h5>
                            </div>
                            <ul class="ul-modal">
                                <li>
                                    <p>Chế độ luyện tập chuyên nghiệp hơn!</p>
                                </li>
                                <li>
                                    <p>Được PT hướng dẫn tận tình.</p>
                                </li>
                                <li>
                                    <p>Làm quen với cấp độ mới.</p>
                                </li>
                                <li>
                                    <p>Nhận được hơn nhiều số tiền bỏ ra?</p>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 col-12 pt-3" id="modal-right">
                            <h5>Phiếu giảm giá</h5>
                            <hr>
                            <div class="list-voucher" id="list-voucher">
                                <!-- voucher   -->
                            </div>
                            <div class="input-group mb-1 mt-1 row">
                                <span class="input-group-text col-2">Mã:</span>
                                <input type="text" class="form-control col-7" id="autotext"
                                    aria-label="Amount (to the nearest dollar)" placeholder="..." value="">
                                <input class="btn-custom btn-outline-secondary col-3 text-white" type="button"
                                    id="button-addon2" value="Dùng" data="">
                            </div>
                            <div class="mb-2 text-black-50 text-center"><small><i id="displayText">Vui lòng nhập
                                        mã</i></small></div>
                            <div class="text-black-50 mb-2">Giá gốc: <span
                                    class="text-danger text-decoration-line-through">{{ number_format($package->price, 0, ',', '.') }}
                                    VNĐ</span></div>
                            <!-- <hr> -->
                            <button type="submit" class="btn btn-danger btn-show-money">Mua với giá
                                {{ number_format($package->price, 0, ',', '.') }} VNĐ</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>





    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</section>
<script>

    //load
    loadVoucher();
    function loadVoucher() {
        const autotext = document.getElementById('autotext').value;
        $.get('http://127.0.0.1:8000/api/web/getvoucher/' + autotext, function (res) {
            let voucher = res;
            let returnData = '';
            // console.log(voucher);

            voucher.forEach(item => {
                returnData += `
                    <div class="box-day text-info voucher-infor" data-code="${item.code}">
                        <span class="day"><i class="bi bi-ticket-perforated-fill"></i> Giảm ${item.sale}%</span>
                        <span class="quantity-exercise">- Mã: ${item.code} - ${item.usage_limit - item.times_used} lượt.</span>
                    </div>
                `;
            });
            $('#list-voucher').html(returnData);
            if (voucher == null || (Array.isArray(voucher) && voucher.length === 0)) {
                document.getElementById('displayText').innerHTML = 'Không tìm thấy mã ưu đãi.';
            } else {
                document.getElementById('displayText').innerHTML = '&nbsp;';
            }
        });
    };


    //go chu
    document.getElementById('autotext').addEventListener('input', function () {
        loadVoucher();
    });


    //click voucher
    $(document).on('click', '.voucher-infor', function () {
        let code = $(this).attr('data-code');
        $('#autotext').val(code);
    });


    //ap ma
    $(document).on('click', '#button-addon2', function () {
        const codeSubmit = $('#autotext').val();
        // alert(codeSubmit);
        $.get('http://127.0.0.1:8000/api/web/getvouchercode/' + codeSubmit, function (res) {
            let data = res

            let original_price = $('#original_price').val();

            // Tính giá đã giảm
            let discount = (data.sale / 100) * original_price; // Tính số tiền giảm
            let discounted_price = original_price - discount; // Giá đã giảm

            // Làm tròn số nguyên
            let rounded_discounted_price = Math.round(discounted_price);
            $('.btn-show-money').html('Mua với giá ' + rounded_discounted_price.toLocaleString('vi-VN') + ' VNĐ');

            $('#purchase_price').val(rounded_discounted_price);
            $('#voucher_id').val(data.id);

            document.getElementById('displayText').innerHTML = 'Đã áp dụng mã ưu đãi.';
        });
    });


    $('#form-pay').on('submit', function (ev) {
        ev.preventDefault();
        let form = $(this);  // Lấy đối tượng form
        let payform = form.serialize(); // Lấy dữ liệu form
        console.log(payform);

        // $.ajax({
        //     url: 'http://127.0.0.1:8000/api/admin/vouchers', // URL API
        //     type: 'POST',
        //     data: payform,
        // })
    });








    @if (Auth::check())
        var userId = @json(Auth::user()->id);
        $('#user_id').val(userId);

        $('#button-pay').html(
            '<button type="button" class="by-now" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Mua ngay</button>'
        )
    @else
        $('#button-pay').html('<a href="#1" class="by-now">Đăng nhập để mua gói</a href="#1">')
    @endif


</script>
@endsection