<!DOCTYPE html>
<html lang="en">

<head>
    <base href='http://127.0.0.1:8000/'>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các bài tập đã nộp</title>
    <link rel="stylesheet" href="assets/backend/css/workout_hub.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="header-block">
            <div class="block-left">
                <div class="name-workout">
                    <p><a href="{{ route('admin.workout_package') }}"><i class="fa-solid fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="block-right">
                <div class="duration">
                    <p>{{ Auth::user()->user_name }}</p>
                </div>
            </div>
        </div>
    </header>
    <div id="main">
        <div id="content">
            <div class="title-day">
                <div class="box-left">
                    <div class="title">
                        <h2 class="day-number">Ngày 1</h2>
                    </div>
                    <p class="line"></p>
                    <div class="categories">
                        <div class="level-infor">
                            <p><i class="fa-solid fa-clipboard-list"></i> Trạng thái: </p>
                            <span class="box-status text-submit-exercise">Đã hoàn thành</span>
                        </div>
                        <div class="level-infor">
                            <p><i class="fa-solid fa-medal"></i> Đánh giá của PT: </p>
                            <span class="scoring text-submit-exercise">Tốt</span>
                        </div>
                        <div class="level-infor">
                            <p class="confirm"><i class="fa-solid fa-book"></i> Tổng số bài tập: </p>
                            <span class="text-submit-exercise">6 bài tập</span>
                        </div>
                        <div class="level-infor">
                            <p class="confirm"><i class="fa-regular fa-clock"></i> Tổng số thời lượng: </p>
                            <span class="text-submit-exercise">10 phút 36 giây</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="list-exercise">
                <h2>Video đã nộp</h2>
                <div class="container-video">
                    <video id="videoPlayer" src="uploads/user_video/1731254189.mp4" controls width="100%" max-height="550px"></video>
                </div>
                <div class="line"></div>

                <h2 class="feedback-of-pt">Phản hồi của PT</h2>
                <div class="content-feedback">
                    <i class="fa-regular fa-message"></i>
                    <p>"Chào bạn! Mình đã xem video tập luyện của bạn, và phải nói là bài tập rất tốt! 💪
                        Kỹ thuật: Bạn đã thực hiện động tác rất chuẩn, đúng tư thế và kiểm soát tốt. Đặc biệt, cách bạn duy trì nhịp thở trong suốt bài tập là rất quan trọng, giúp tăng hiệu quả và tránh căng cơ quá mức.
                        Sự tập trung: Rất ấn tượng với sự tập trung của bạn! Điều này cho thấy bạn rất nghiêm túc và có trách nhiệm với bài tập của mình.
                        Cải thiện: Nếu có thể, bạn hãy thử giảm tốc độ một chút trong phần hạ tạ để cảm nhận cơ tốt hơn, điều này sẽ giúp tối đa hóa hiệu quả của bài tập.
                        Tiếp tục phát huy nhé! Nếu bạn cần thêm lời khuyên hoặc muốn điều chỉnh động tác, đừng ngần ngại hỏi mình. Chúc bạn đạt được mục tiêu nhanh chóng và hiệu quả nhất! 🏋️‍♀️"</p>
                </div>

                <h2 class="contact-of-pt">Thông tin liên hệ của PT</h2>
                <div class="box-contact">
                    <div class="infor">
                        <div class="contact phone-number">
                            <i class="fa-solid fa-phone-volume"></i>
                            <p>0354423372</p>
                        </div>
                        <div class="contact insta">
                            <i class="fa-brands fa-instagram"></i>
                            <p>Minh Tuấn</p>
                        </div>
                        <div class="contact facebook">
                            <i class="fa-brands fa-facebook"></i>
                            <p>Minh Tuấn</p>
                        </div>
                    </div>
                    <div class="img-pt">
                        <img src="assets/backend/img/4.jpg" alt="">
                    </div>
                </div>
                <div class="line"></div>

                <div class="made-with">
                    <p>Made with <i class="fa-solid fa-dumbbell"></i> · Powered by GymFitness</p>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <div class="title">
                <p>Tổng hợp các ngày</p>
            </div>
            <div class="list-days">
                @for ($i = 1; $i <= 15; $i++)
                    <div class="box-day " data-day="{{ $i }}">
                        <div class="info">
                            <p>Ngày {{ $i }}</p>
                        </div>
                        
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="overflow">
        <div class="container">
            <div class="modal">
                <div class="close-modal-exercise">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="col-left">
                    <div class="countdown">3</div>
                    <div class="overflow-col-left">
                        <div class="btn-start-exercise">
                            <a class="start"><i class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                    <div class="title-detail">
                        <h3></h3>
                    </div>
                    <div class="show-video">
                        <div class="video-container">
                            <video>
                                <source type="video/mp4">
                            </video>

                        </div>
                    </div>
                </div>
                <div class="col-right">
                    <div class="title-detail">
                        <h3>Hướng dẫn tập</h3>
                    </div>
                    <div class="content-training">
                        <div class="content">
                            {{-- Show hướng dẫn tập --}}
                        </div>

                        <div class="btn-action">
                       
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="overflow-upload">
        <form id="video_user_upload" method="post">
            @csrf
            <div class="container-upload">
                <div class="modal-upload">
                    <div class="close-modal-upload">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="box-upload">
                        <div class="button-upload" id="buttonUpload">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <div class="description">
                                <p>Chọn video để tải lên</p>
                                <span>Hoặc kéo thả vào đây</span>
                                <a id="chooseVideoButton">Chọn video</a>
                            </div>
                            <input type="file" id="videoInput" name="video_path" accept="video/*" style="display: none;">
    
                        </div>
                        <div class="show-video-upload" id="showVideoUpload">
                            <div class="container-video">
                                <video id="videoPlayer" controls width="100%"></video>
                            </div>
                            <div class="write-description">
                                <p class="name-video" id="videoName"></p>
                                <p class="duration-video"><span>Thời lượng: </span><span id="videoDuration">2 phút 8
                                        giây</span></p>
                                <div class="load-video">
                                    <div class="load-left">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>Đã tải lên</p>
                                    </div>
                                    <div class="load-right">
                                        <p id="uploadProgress">0%</p>
                                    </div>
                                </div>
                                <div class="line-load-video">
                                    <div class="progress-bar" id="progressBar"></div>
                                </div>
    
                                <div class="description-video">
                                    <label for="#">Mô tả</label>
                                    <textarea name="description" placeholder="Nhập mô tả..."></textarea>
                                </div>
                                <div class="line"></div>
    
                                <div class="button-upload-video">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="submit" class="button upload" value="Đăng">
                                    <a class="button cancel">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="notes">
                        <div class="note">
                            <i class="fa-regular fa-file-video"></i>
                            <div class="memo">
                                <p>Định dạng tập tin</p>
                                <span>Đề xuất: “.mp4”. Có hỗ trợ các định dạng chính khác.</span>
                            </div>
                        </div>
                        <div class="note">
                            <i class="fa-solid fa-video"></i>
                            <div class="memo">
                                <p>Dung lượng và thời lượng</p>
                                <span>Giữ video từ 1-5 phút, đủ thể hiện động tác.</span>
                            </div>
                        </div>
                        <div class="note">
                            <i class="fa-solid fa-photo-film"></i>
                            <div class="memo">
                                <p>Chất lượng tốt</p>
                                <span>Đảm bảo video rõ nét, tránh rung lắc.</span>
                            </div>
                        </div>
                        <div class="note">
                            <i class="fa-solid fa-file-shield"></i>
                            <div class="memo">
                                <p>Bảo mật</p>
                                <span>Hạn chế lộ thông tin cá nhân và xin phép nếu có người khác xuất hiện.</span>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
    <script src="assets/backend/js/workout_hub.js"></script>
    <script>
        const boxList = document.querySelectorAll('.box-day');
        const day = document.querySelector('.day-number');

        boxList.forEach(item => {
            item.addEventListener('click', function() {
                if (!item.classList.contains('is-blocking')) {
                    boxList.forEach(box => box.classList.remove('active-box-day'));

                    item.classList.add('active-box-day');

                    const dayNumber = item.getAttribute('data-day');
                    day.textContent = 'Ngày ' + dayNumber;
                }
            });
        });
    </script>
</body>

</html>
