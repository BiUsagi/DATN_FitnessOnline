@extends('frontend/layouts/app-user')


@section('custom_css')
    <link rel="stylesheet" href="assets/frontend/css/search.css">
@endsection

@section('main')
    <section>
        <!-- BREADCRUMS SECTION START HERE -->
        <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1>tìm <span>khóa học</span></h1>
                    <div class="trackPage">
                        <a href="{{ route('index') }}">HOME</a>
                        <span>Tìm Khóa Học</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMS SECTION END HERE -->


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- CONTAINER -->
                    <div class=" d-flex align-items-center ">
                        <div class="row g-0 justify-content-center">
                            <!-- TITLE -->
                            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
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
                                                        <input checked class="form-check-input question__input"
                                                            id="q_1_khac" name="q_1" type="radio" value="Yes">
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
                                                            name="q_2" type="radio" value="Yes">
                                                        <label class="form-check-label question__label" for="q_2_yes">Tôi
                                                            đã có kinh nghiệm</label>
                                                    </div>
                                                    <div class="q-box__question">
                                                        <input class="form-check-input question__input" id="q_2_maybe"
                                                            name="q_2" type="radio" value="No">
                                                        <label class="form-check-label question__label" for="q_2_maybe">Tôi
                                                            chỉ biết cơ bản</label>
                                                    </div>
                                                    <div class="q-box__question">
                                                        <input checked class="form-check-input question__input"
                                                            id="q_2_no" name="q_2" type="radio" value="No">
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
                                                        <input checked class="form-check-input question__input"
                                                            id="q_3_maybe" name="q_3" type="radio" value="No">
                                                        <label class="form-check-label question__label"
                                                            for="q_3_maybe">Tôi có một vài dụng cụ cơ bản</label>
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
                                                                    id="q_4_uk" name="q_4" type="checkbox"
                                                                    value="uk">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_uk">Tăng cơ bắp</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_us" name="q_4" type="checkbox"
                                                                    value="us">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_us">Giảm mỡ</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_br" name="q_3" type="checkbox"
                                                                    value="br">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_br">Giảm cân</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_bra" name="q_3" type="checkbox"
                                                                    value="br">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_bra">Hỗ trợ điều trị</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_de" name="q_4" type="checkbox"
                                                                    value="de">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_de">Luyện sức bền</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_in" name="q_4" type="checkbox"
                                                                    value="in">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_in">Giải tỏa căng thẳng</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_eu" name="q_4" type="checkbox"
                                                                    value="eu">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_eu">Duy trì vóc dáng</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_eua" name="q_4" type="checkbox"
                                                                    value="eu">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_eua">Rèn luyện sức khỏe</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                                <input class="form-check-input question__input"
                                                                    id="q_4_none" name="q_4" type="checkbox"
                                                                    value="none">
                                                                <label class="form-check-label question__label"
                                                                    for="q_4_none">Giải tỏa căng thẳng và cải thiện tinh
                                                                    thần</label>
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
                                                                id="q_5_breathing" name="q_5" type="radio"
                                                                value="breathing">
                                                            <label class="form-check-label question__label"
                                                                for="q_5_breathing">
                                                                < 1 tháng</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ps-0 q-box">
                                                        <div class="q-box__question">
                                                            <input class="form-check-input question__input" id="q_5_chest"
                                                                name="q_5" type="radio" value="chest pain">
                                                            <label class="form-check-label question__label"
                                                                for="q_5_chest">1 ~ 3 tháng</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ps-0 q-box">
                                                        <div class="q-box__question">
                                                            <input class="form-check-input question__input"
                                                                id="q_5_speech" name="q_5" type="radio"
                                                                value="speech problem">
                                                            <label class="form-check-label question__label"
                                                                for="q_5_speech">~ 6 tháng</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ps-0 q-box">
                                                        <div class="q-box__question">
                                                            <input class="form-check-input question__input" id="q_5_pale"
                                                                name="q_5" type="radio" value="pale">
                                                            <label class="form-check-label question__label"
                                                                for="q_5_pale">> 1 năm</label>
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
                                        </div>
                                        <div id="q-box__buttons">
                                            <button id="prev-btn" type="button">Trở về</button>
                                            <button id="next-btn" type="button">Tiếp theo</button>
                                            <button id="submit-btn" type="submit">Hoàn thành</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
@endsection



@section('custom_js')
    <script>
        // Mở modal khi tải trang
        document.addEventListener("DOMContentLoaded", function() {
            const myModal = new bootstrap.Modal(document.getElementById("myModal"));
            myModal.show();
        });
    </script>
    <script>
        let step = document.getElementsByClassName('step');
        let prevBtn = document.getElementById('prev-btn');
        let nextBtn = document.getElementById('next-btn');
        let submitBtn = document.getElementById('submit-btn');
        let form = document.getElementsByTagName('form')[0];
        let preloader = document.getElementById('preloader-wrapper');
        let bodyElement = document.querySelector('body');
        // let succcessDiv = document.getElementById('success');

        form.onsubmit = () => {
            return false
        }
        let current_step = 0;
        let stepCount = 5
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


        submitBtn.addEventListener('click', () => {
            preloader.classList.add('d-block');

            const timer = ms => new Promise(res => setTimeout(res, ms));

            timer(3000)
                .then(() => {
                    bodyElement.classList.add('loaded');
                }).then(() => {
                    step[stepCount].classList.remove('d-block');
                    step[stepCount].classList.add('d-none');
                    prevBtn.classList.remove('d-inline-block');
                    prevBtn.classList.add('d-none');
                    submitBtn.classList.remove('d-inline-block');
                    submitBtn.classList.add('d-none');
                    // succcessDiv.classList.remove('d-none');
                    // succcessDiv.classList.add('d-block');
                })

        });
    </script>
@endsection
