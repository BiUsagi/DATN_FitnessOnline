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
                    <p><a href="{{ route('workout_bought', Auth::user()->id) }}"><i class="fa-solid fa-chevron-left"></i></a>
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
        <div id="default-view">
            <img src="https://zshop.vn/blogs/wp-content/uploads/2022/08/ezgif.com-gif-maker-15-1.png" alt="Hình ảnh tập gym" />
            <h2>Danh sách Video Đã Nộp</h2>
            <p>Cảm ơn bạn đã nộp video bài tập của mình! Những video này sẽ được huấn luyện viên (PT) của chúng tôi kiểm tra và đánh giá. Đảm bảo rằng bạn đã thực hiện đúng theo yêu cầu của bài tập, và bạn sẽ nhận được phản hồi sớm nhất có thể.</p>
            <p>Hãy tiếp tục theo dõi thông báo từ PT của bạn để cải thiện kết quả tập luyện và đạt được mục tiêu sức khỏe của mình.</p>
            {{-- <a href="/" class="cta-button">Khám phá ngay</a> --}}
            <div class="icon-container">
                <i class="fas fa-dumbbell"></i>
            </div>
        </div>
        <div id="content" style="display: none">
            <div class="title-day">
                <div class="box-left">
                    <div class="title">
                        <h2 class="day-number">Ngày 1</h2>
                    </div>
                    <p class="line"></p>
                    <div class="categories">
                        <div class="level-infor">
                            <p><i class="fa-solid fa-clipboard-list"></i> Trạng thái: </p>
                            <span class="box-status text-submit-exercise"></span>
                           
                        </div>
                        <div class="level-infor">
                            <p><i class="fa-solid fa-medal"></i> Đánh giá của PT: </p>
                                <span class="scoring text-submit-exercise"></span>
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
                <div class="view-default">
                    <p>Bạn chưa nộp video cho ngày này</p>
                </div>
                <div class="container-video">
                    
                    <video id="videoPlayer" src="" controls width="100%" max-height="550px"></video>
                </div>
                <div class="line"></div>

                <h2 class="feedback-of-pt">Phản hồi của PT</h2>
                <div class="content-feedback">
                    <i class="fa-regular fa-message"></i>
                    <p class="gave-feedback"></p>
                    <p class="no-feedback">Hiện tại PT chưa có phản hồi gì cho bạn</p>
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
                        <img src="assets/backend/img/accounts/1734624640.png" alt="">
                    </div>
                </div>
                <div class="line"></div>

                <div class="made-with">
                    <p>Made with <i class="fa-solid fa-dumbbell"></i> · Powered by FITNESS ONLINE</p>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <div class="title">
                <p>Tổng hợp các ngày</p>
            </div>
            <div class="list-days">
                @for ($i = 1; $i <= $workoutPackage->duration_days; $i++)
                    @php
                        $success = $daysStatus[$i] == 1 ? 'success' : '';
                    @endphp
                    <div class="box-day {{$success}}" data-day="{{ $i }}">
                        <div class="info">
                            <p>Ngày {{ $i }}</p>
                        </div>
                        @if (isset($daysStatus[$i]) && $daysStatus[$i] === 1)
                            <div class="completed">
                                <i class="fa-regular fa-circle-check"></i>
                            </div>
                        @endif
                        @if (isset($daysStatus[$i]) && $daysStatus[$i] === 2)
                            <div class="failed">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
    <script src="assets/backend/js/workout_hub.js"></script>
    <script>
        const boxList = document.querySelectorAll('.box-day');
        const videoPlayer = document.getElementById('videoPlayer');
        const day = document.querySelector('.day-number');
        const feedbackElement = document.querySelector('.content-feedback p');
        const durationElement = document.querySelector('.text-submit-exercise.duration');
        const viewDefault = document.querySelector('.view-default');
        const defaultView = document.getElementById('default-view');
        const contentView = document.getElementById('content');
        const scoring = document.querySelector('.scoring');
        const boxStatus = document.querySelector('.box-status');
        const gaveFeedback = document.querySelector('.gave-feedback');
        const noFeedback = document.querySelector('.no-feedback');
        
        boxList.forEach(item => {
            item.addEventListener('click', function() {
                if (!item.classList.contains('is-blocking')) {
                    defaultView.style.display = 'none';
                    contentView.style.display = 'block';
                    boxList.forEach(box => box.classList.remove('active-box-day'));
                    item.classList.add('active-box-day');
                    const dayNumber = item.getAttribute('data-day');
                    day.textContent = 'Ngày ' + dayNumber;
                    const workoutId = "{{ $workoutPackage->id }}";
                    const userId = "{{ Auth::user()->id }}"; 
                    
               
            fetch(`api/get-video/${workoutId}/${userId}/${dayNumber}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    gaveFeedback.innerHTML = ''; 
                    gaveFeedback.style.display = 'none';
                    noFeedback.style.display = 'none';
                    viewDefault.style.display = 'block';
                    videoPlayer.style.display = 'none';
                    scoring.classList.remove('success', 'error');
                    boxStatus.classList.remove('success', 'error');
                    scoring.textContent = 'Chờ duyệt';
                    boxStatus.textContent = 'Chờ duyệt';

                    if (data.feedback) {
                        gaveFeedback.innerHTML = data.feedback;
                        gaveFeedback.style.display = 'block';
                        noFeedback.style.display = 'none';
                    } else {
                        noFeedback.style.display = 'block';
                    }

                    if (data && data.status_main === 'success') {
                        videoPlayer.src = data.video_url;
                        videoPlayer.style.display = 'block';
                        viewDefault.style.display = 'none';

                        if (data.status === 0) {
                            scoring.textContent = 'Chờ duyệt';
                            boxStatus.textContent = 'Chờ duyệt';
                        } else if (data.status === 1) {
                            scoring.classList.add('success');
                            boxStatus.classList.add('success');
                            scoring.textContent = 'Đạt';
                            boxStatus.textContent = 'Đã duyệt';
                        } else {
                            scoring.classList.add('error');
                            boxStatus.classList.add('success');
                            scoring.textContent = 'Không đạt';
                            boxStatus.textContent = 'Đã duyệt';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error fetching video:', error);
                    viewDefault.style.display = 'block';
                    gaveFeedback.style.display = 'none';
                    noFeedback.style.display = 'block';
                    videoPlayer.style.display = 'none';
                    scoring.classList.remove('success', 'error');
                    boxStatus.classList.remove('success', 'error');
                    scoring.textContent = 'Chờ duyệt';
                    boxStatus.textContent = 'Chờ duyệt';
                });
            }
            });
        });
    </script>
    
</body>

</html>
