    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FITNESS ONLINE</title>
        <link rel="stylesheet" href="assets/frontend/css/search.css">
        <link rel="stylesheet" href="assets/frontend/css/app.css">
        <link rel="stylesheet" href="assets/frontend/css/swiper.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    </head>

    <body>

        <section>

            <!-- Modal -->
            <!-- CONTAINER -->
            <div class="d-flex align-items-center ">
                <div class="row g-0 justify-content-center">
                    <!-- TITLE -->
                    <div class="col-lg-4 offset-lg-1 mx-0 px-0 row">
                        <div class="col-12 back-search ">
                            <a href="{{ route('index') }}" type="button" class="btn text-white ms-3 mt-3 "><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                                </svg> Trở về</a>
                        </div>
                        <div id="title-container">
                            <img class="search-image" src="assets/frontend/images/banner/bg.webp">
                            <h2>GỢI Ý KHÓA HỌC</h2>
                            <h3>FITNESS ONLINE</h3>
                            <p>Bạn đang phân vân không biết lựa chọn khóa học nào phù hợp với bản thân?</p>
                            <p>Đừng lo lắng, chỉ cần hoàn thành 1 khảo sát nhỏ bên cạnh và bạn sẽ được chúng tôi gợi
                                ý về các khóa học phù hợp</p>
                        </div>
                    </div>
                    <!-- FORMS -->
                    <div class="col-lg-8 mx-0 px-0">
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                                class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: 0%"></div>
                        </div>
                        <div id="qbox-container">
                            <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper"
                                novalidate="">
                                <div id="steps-container">
                                    <div class="step">
                                        <h4 style="width: 33vw">Giới tính của bạn là gì?
                                        </h4>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_1_nam"
                                                    name="q_1" type="radio" value="Yes">
                                                <label class="form-check-label question__label"
                                                    for="q_1_nam">Nam</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_1_nu"
                                                    name="q_1" type="radio" value="No">
                                                <label class="form-check-label question__label"
                                                    for="q_1_nu">Nữ</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input checked class="form-check-input question__input" id="q_1_khac"
                                                    name="q_1" type="radio" value="Yes">
                                                <label class="form-check-label question__label"
                                                    for="q_1_khac">Khác</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Bạn đã có kinh nghiệm tập thể dục tại nhà chưa?
                                        </h4>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_2_yes"
                                                    name="q_2" type="radio" value="Nâng Cao">
                                                <label class="form-check-label question__label" for="q_2_yes">Tôi
                                                    đã có kinh nghiệm</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_2_maybe"
                                                    name="q_2" type="radio" value="Trung Cấp">
                                                <label class="form-check-label question__label" for="q_2_maybe">Tôi
                                                    chỉ biết cơ bản</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input checked class="form-check-input question__input" id="q_2_no"
                                                    name="q_2" type="radio" value="Người Mới Bắt Đầu">
                                                <label class="form-check-label question__label" for="q_2_no">Tôi
                                                    là người mới</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Bạn có các dụng cụ dùng để tập luyện tại nhà không?
                                        </h4>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_3_yes"
                                                    name="q_3" type="radio" value="Yes">
                                                <label class="form-check-label question__label" for="q_3_yes">Tôi
                                                    có đầy đủ</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_3_no"
                                                    name="q_3" type="radio" value="No">
                                                <label class="form-check-label question__label" for="q_3_no">Tôi
                                                    không có</label>
                                            </div>
                                            <div class="q-box__question">
                                                <input checked class="form-check-input question__input" id="q_3_maybe"
                                                    name="q_3" type="radio" value="No">
                                                <label class="form-check-label question__label" for="q_3_maybe">Tôi có
                                                    một
                                                    vài
                                                    dụng cụ cơ bản</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <h4>Mục tiêu của bạn khi đến với chúng tôi là gì</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input q-checkbox"
                                                            id="q_4_1" name="q_4" type="checkbox"
                                                            value="Tăng cơ bắp">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_1">Tăng cơ
                                                            bắp</label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_2"
                                                            name="q_4" type="checkbox" value="Tăng sức mạnh">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_2">Tăng sức mạnh</label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_3"
                                                            name="q_4" type="checkbox" value="Giảm cân">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_3">Giảm
                                                            cân</label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_4"
                                                            name="q_4" type="checkbox" value="Làm nét cơ">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_4">Làm
                                                            nét cơ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_5"
                                                            name="q_4" type="checkbox" value="Tăng cân">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_5">Tăng cân</label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_6"
                                                            name="q_4" type="checkbox" value="Cải thiện sức bền">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_6">Cải
                                                            thiện sức bền </label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_7"
                                                            name="q_4" type="checkbox"
                                                            value="Phục hồi chức năng">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_7">Phục hồi chức năng</label>
                                                    </div>
                                                </div>
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_8"
                                                            name="q_4" type="checkbox"
                                                            value="Chuẩn bị cho thể thao">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_8">Chuẩn bị cho thể thao</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check ps-0 q-box">
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_4_9"
                                                            name="q_4" type="checkbox"
                                                            value="Tăng cường sức khoẻ tổng quát">
                                                        <label class="form-check-label question__label"
                                                            for="q_4_9">Tăng cường sức khoẻ tổng quát</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Thời gian bạn hướng đến là bao lâu?
                                        </h4>
                                        <div class="row">
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input checked class="form-check-input question__input"
                                                        id="q_5_1" name="q_5" type="radio" value="31">
                                                    <label class="form-check-label question__label" for="q_5_1">
                                                        < 1 tháng</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_5_2"
                                                        name="q_5" type="radio" value="93">
                                                    <label class="form-check-label question__label" for="q_5_2">1
                                                        ~ 3
                                                        tháng</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_5_3"
                                                        name="q_5" type="radio" value="186">
                                                    <label class="form-check-label question__label" for="q_5_3">~
                                                        6
                                                        tháng</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_5_4"
                                                        name="q_5" type="radio" value="365">
                                                    <label class="form-check-label question__label" for="q_5_4">~ 1
                                                        năm</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Bạn có tuân theo bất kì chế độ ăn kiêng nào không?
                                        </h4>
                                        <div class="row">
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_1"
                                                        name="q_6" type="radio" value="31">
                                                    <label class="form-check-label question__label" for="q_6_1">
                                                        Ăn chay trường <span class="text-secondary fw-lighter">(Không
                                                            bao gồm thịt) </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_2"
                                                        name="q_6" type="radio" value="93">
                                                    <label class="form-check-label question__label" for="q_6_2">
                                                        Ăn chay <span class="text-secondary fw-lighter">(Không bao gồm
                                                            tất cả các sản phầm động vật)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_3"
                                                        name="q_6" type="radio" value="186">
                                                    <label class="form-check-label question__label" for="q_6_3">
                                                        Keto <span class="text-secondary fw-lighter">(Ăn ít carb, nhiều
                                                            chất béo)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_4"
                                                        name="q_6" type="radio" value="365">
                                                    <label class="form-check-label question__label" for="q_6_4">
                                                        Địa Trung Hải <span class="text-secondary fw-lighter">(Giàu
                                                            thực phẩm có nguồn gốc từ động vật)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_5"
                                                        name="q_6" type="radio" value="365">
                                                    <label class="form-check-label question__label" for="q_6_5">
                                                        Không có cái nào ở trên</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_6_6"
                                                        name="q_6" type="radio" value="365">
                                                    <label class="form-check-label question__label" for="q_6_6">
                                                        Tôi không ăn kiêng</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Bạn có thường ăn hoặc uống đồ uống có đường không?
                                        </h4>
                                        <div class="row">
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input checked class="form-check-input question__input"
                                                        id="q_7_1" name="q_7" type="radio" value="31">
                                                    <label class="form-check-label question__label" for="q_7_1">
                                                        Không thường xuyên. Tôi không hảo ngọt</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_7_2"
                                                        name="q_7" type="radio" value="93">
                                                    <label class="form-check-label question__label" for="q_7_2">
                                                        3~5 lần mỗi tuần</label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_7_3"
                                                        name="q_7" type="radio" value="186">
                                                    <label class="form-check-label question__label" for="q_7_3">
                                                        Khá nhiều mỗi ngày</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="step">
                                        <h4>Bạn uống bao nhiêu nước mỗi ngày?
                                        </h4>
                                        <div class="row">
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input checked class="form-check-input question__input"
                                                        id="q_8_1" name="q_8" type="radio" value="31">
                                                    <label class="form-check-label question__label" for="q_8_1">
                                                        Chỉ cà phê hoặc trà </label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_8_2"
                                                        name="q_8" type="radio" value="93">
                                                    <label class="form-check-label question__label" for="q_8_2">1
                                                        Ít hơn 2 ly nước <span class="text-secondary fw-lighter">(~0,5
                                                            lít nước)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_8_3"
                                                        name="q_8" type="radio" value="186">
                                                    <label class="form-check-label question__label" for="q_8_3">~
                                                        2~6 ly nước <span class="text-secondary fw-lighter">(0,5~1,5
                                                            lít nước)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_8_4"
                                                        name="q_8" type="radio" value="365">
                                                    <label class="form-check-label question__label"
                                                        for="q_8_4">7~10 ly nước <span
                                                            class="text-secondary fw-lighter">(1,5~2,5
                                                            lít nước)</span></label>
                                                </div>
                                            </div>
                                            <div class="form-check ps-0 q-box">
                                                <div class="q-box__question">
                                                    <input class="form-check-input question__input" id="q_8_5"
                                                        name="q_8" type="radio" value="365">
                                                    <label class="form-check-label question__label" for="q_8_5">Hơn
                                                        10 ly nước <span class="text-secondary fw-lighter">(hơn 2,5
                                                            lít nước)</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <div class="mt-1">
                                            <div class="closing-text">
                                                <h4>Đã hoàn thành!</h4>
                                                <p>Các khóa học phù hợp sẽ được chúng tôi gợi ý cho bạn. <br>
                                                    Chúc bạn có 1 trải nghiệm tuyệt vời tại hệ thống của chúng tôi.
                                                </p>
                                                <p>Chọn hoàn thành để tiếp tục.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="success">
                                        <div class="mt-3">
                                            <h4>Dưới đây là 1 vài khóa học chúng tôi gợi ý cho bạn!</h4>
                                            {{-- kh --}}
                                            <div class="features_wrapper p-0 mt-4" id="courses">
                                                <div class="container">
                                                    <div class="swiper courses-swiper-custom">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide swiper-slide-custom pb-3">
                                                                <div class="feature-list feature-list-custom">

                                                                </div>
                                                            </div>
                                                            {{-- @endforeach --}}
                                                        </div>
                                                        <div class="swiper-pagination-custom"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end kh --}}
                                        </div>
                                    </div>
                                </div>
                                <div id="q-box__buttons">
                                    <button id="prev-btn" type="button">Trở về</button>
                                    <button id="next-btn" type="button">Tiếp theo</button>
                                    <button id="submit-btn" type="submit" class="d-none">Hoàn thành</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <div id="preloader-wrapper">
            <div id="preloader">
            </div>
            <div class="preloader-section section-left"></div>
            <div class="preloader-section section-right"></div>
        </div>




        <script>
            let step = document.getElementsByClassName('step');
            let prevBtn = document.getElementById('prev-btn');
            let nextBtn = document.getElementById('next-btn');
            let submitBtn = document.getElementById('submit-btn');
            let form = document.getElementsByTagName('form')[0];
            let preloader = document.getElementById('preloader-wrapper');
            let bodyElement = document.querySelector('body');
            let succcessDiv = document.getElementById('success');

            form.onsubmit = () => {
                return false
            }
            let current_step = 0;
            let stepCount = 8
            step[current_step].classList.add('d-block');
            if (current_step == 0) {
                prevBtn.classList.add('d-none');
                submitBtn.classList.add('d-none');
                nextBtn.classList.add('d-inline-block');
            }

            const progress = (value) => {
                document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
            }

            nextBtn.addEventListener('click', () => {
                current_step++;
                let previous_step = current_step - 1;
                if ((current_step > 0) && (current_step <= stepCount)) {
                    prevBtn.classList.remove('d-none');
                    prevBtn.classList.add('d-inline-block');
                    step[current_step].classList.remove('d-none');
                    step[current_step].classList.add('d-block');
                    step[previous_step].classList.remove('d-block');
                    step[previous_step].classList.add('d-none');
                    if (current_step == stepCount) {
                        submitBtn.classList.remove('d-none');
                        submitBtn.classList.add('d-inline-block');
                        nextBtn.classList.remove('d-inline-block');
                        nextBtn.classList.add('d-none');
                    }
                } else {
                    if (current_step > stepCount) {
                        form.onsubmit = () => {
                            return true
                        }
                    }
                }
                progress((100 / stepCount) * current_step);
            });


            prevBtn.addEventListener('click', () => {
                if (current_step > 0) {
                    current_step--;
                    let previous_step = current_step + 1;
                    prevBtn.classList.add('d-none');
                    prevBtn.classList.add('d-inline-block');
                    step[current_step].classList.remove('d-none');
                    step[current_step].classList.add('d-block')
                    step[previous_step].classList.remove('d-block');
                    step[previous_step].classList.add('d-none');
                    if (current_step < stepCount) {
                        submitBtn.classList.remove('d-inline-block');
                        submitBtn.classList.add('d-none');
                        nextBtn.classList.remove('d-none');
                        nextBtn.classList.add('d-inline-block');
                        prevBtn.classList.remove('d-none');
                        prevBtn.classList.add('d-inline-block');
                    }
                }

                if (current_step == 0) {
                    prevBtn.classList.remove('d-inline-block');
                    prevBtn.classList.add('d-none');
                }
                progress((100 / stepCount) * current_step);
            });





            // submitBtn.addEventListener('click', () => {


            //     preloader.classList.add('d-block');

            //     const timer = ms => new Promise(res => setTimeout(res, ms));

            //     timer(1000)
            //         .then(() => {
            //             bodyElement.classList.add('loaded');
            //         }).then(() => {
            //             step[stepCount].classList.remove('d-block');
            //             step[stepCount].classList.add('d-none');
            //             prevBtn.classList.remove('d-inline-block');
            //             prevBtn.classList.add('d-none');
            //             submitBtn.classList.remove('d-inline-block');
            //             submitBtn.classList.add('d-none');
            //             succcessDiv.classList.remove('d-none');
            //             succcessDiv.classList.add('d-block');
            //         })

            // });
            submitBtn.addEventListener('click', () => {
                preloader.classList.add('d-block');

                const formData = new FormData(document.querySelector('#form-wrapper'));
                const data = {};
                formData.forEach((value, key) => {
                    // Nếu key đã tồn tại (checkbox hoặc array), thêm giá trị mới vào array
                    if (data[key]) {
                        if (!Array.isArray(data[key])) {
                            data[key] = [data[key]];
                        }
                        data[key].push(value);
                    } else {
                        data[key] = value;
                    }
                });


                const timer = (ms) => new Promise((res) => setTimeout(res, ms));
                timer(3000)
                    .then(() => {
                        bodyElement.classList.add('loaded');
                    })
                    .then(() => {
                        step[stepCount].classList.remove('d-block');
                        step[stepCount].classList.add('d-none');
                        prevBtn.classList.remove('d-inline-block');
                        prevBtn.classList.add('d-none');
                        submitBtn.classList.remove('d-inline-block');
                        submitBtn.classList.add('d-none');
                        succcessDiv.classList.remove('d-none');
                        succcessDiv.classList.add('d-block');

                        // Gửi request lấy dữ liệu từ API
                        fetch('/api/workout-packages/search', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data),
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                const coursesContainer = document.querySelector('#courses .swiper-wrapper');
                                coursesContainer.innerHTML = ''; // Xóa nội dung cũ

                                // Lặp qua dữ liệu nhận được và thêm vào HTML
                                data.forEach((item) => {
                                    const courseHTML = `
                            <div class="swiper-slide pb-3">
                                <div class="feature-list">
                                    <img loading='lazy' src="/uploads/gym_package/${item.image}" class="img-search-custom" alt="icons">
                                    <span>${item.special_level}</span>
                                    <h2>${item.package_name}</h2>
                                    <p>${item.description.replace(/(?:\r\n|\r|\n)/g, '<br>')}</p>
                                    <p>Giá: <span class="d-inline-block fw-bold fs-5">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(item.price)}</span></p>
                                    <div class="button-sec">
                                        <a href="/workout-detail/${item.id}">Xem ngay</a>
                                        <a href="#!"><img loading='lazy' src="assets/frontend/images/icons/btn-arrow.svg" alt="icon" width="25" height="14"></a>
                                    </div>
                                </div>
                            </div>
                        `;
                                    coursesContainer.insertAdjacentHTML('beforeend', courseHTML);
                                });

                                // Khởi tạo lại Swiper 
                                new Swiper('.courses-swiper-custom', {
                                    slidesPerView: 2,
                                    spaceBetween: 20,
                                    pagination: {
                                        el: '.swiper-pagination-custom',
                                        clickable: true,
                                    },
                                    navigation: {
                                        nextEl: '.courses-swiper-custom-button-next',
                                        prevEl: '.courses-swiper-custom-button-prev',
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1,
                                            spaceBetween: 10,
                                        },
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
                                            slidesPerView: 2,
                                            spaceBetween: 20,
                                        },
                                    },
                                });
                            })
                            .catch((error) => {
                                console.error('Error fetching workout packages:', error);
                            });
                    });
            });
        </script>

        <!-- LOCAL SCRIPT ATTACHMENT -->
        <script src='assets/frontend/js/jquery.min.js'></script>
        <script src='assets/frontend/js/bootstrap.js'></script>
        <script src='assets/frontend/js/swiper.js'></script>
        <script src='assets/frontend/js/main.js'></script>
    </body>

    </html>
