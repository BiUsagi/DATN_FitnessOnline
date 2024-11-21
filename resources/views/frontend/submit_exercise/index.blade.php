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
                            <span class="box-status text-submit-exercise">Chờ duyệt</span>
                           
                        </div>
                        <div class="level-infor">
                            <p><i class="fa-solid fa-medal"></i> Đánh giá của PT: </p>
                                <span class="scoring text-submit-exercise">Chờ duyệt</span>
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
                    
                    <video id="videoPlayer" src="uploads/user_video/1731254189.mp4" controls width="100%" max-height="550px"></video>
                </div>
                <div class="line"></div>

                <h2 class="feedback-of-pt">Phản hồi của PT</h2>
                <div class="content-feedback">
                    <i class="fa-regular fa-message"></i>
                    <p class="gave-feedback">"Chào bạn! Mình đã xem video tập luyện của bạn, và phải nói là bài tập rất tốt! 💪
                        Kỹ thuật: Bạn đã thực hiện động tác rất chuẩn, đúng tư thế và kiểm soát tốt. Đặc biệt, cách bạn duy trì nhịp thở trong suốt bài tập là rất quan trọng, giúp tăng hiệu quả và tránh căng cơ quá mức.
                        Sự tập trung: Rất ấn tượng với sự tập trung của bạn! Điều này cho thấy bạn rất nghiêm túc và có trách nhiệm với bài tập của mình.
                        Cải thiện: Nếu có thể, bạn hãy thử giảm tốc độ một chút trong phần hạ tạ để cảm nhận cơ tốt hơn, điều này sẽ giúp tối đa hóa hiệu quả của bài tập.
                        Tiếp tục phát huy nhé! Nếu bạn cần thêm lời khuyên hoặc muốn điều chỉnh động tác, đừng ngần ngại hỏi mình. Chúc bạn đạt được mục tiêu nhanh chóng và hiệu quả nhất! 🏋️‍♀️"
                    </p>
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
                @for ($i = 1; $i <= $workoutPackage->duration_days; $i++)
                    <div class="box-day " data-day="{{ $i }}">
                        <div class="info">
                            <p>Ngày {{ $i }}</p>
                            
                        </div>
                        <div class="completed" style="display: none">
                            <i class="fa-solid fa-circle-check"></i>    
                        </div>
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
        const gaveFeedback = document.querySelector('.gave-feedback');
        const noFeedback = document.querySelector('.no-feedback');
        const defaultView = document.getElementById('default-view');
        const contentView = document.getElementById('content');
        
        boxList.forEach(item => {
            item.addEventListener('click', function() {
                if (!item.classList.contains('is-blocking')) {
                    defaultView.style.display = 'none';
                    contentView.style.display = 'block';
                    boxList.forEach(box => box.classList.remove('active-box-day'));
                    item.classList.add('active-box-day');
                    const dayNumber = item.getAttribute('data-day');
                    day.textContent = 'Ngày ' + dayNumber;
                    const workoutId = "{{ $workoutPackage->id }}"; // ID của gói tập, truyền vào từ backend
                    const userId = "{{ Auth::user()->id }}"; // ID của người dùng, truyền vào từ backend
                    
                    // Gọi API để lấy video theo ngày
                    fetch(`api/get-video/${workoutId}/${userId}/${dayNumber}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status_main === 'success') {
                                // Cập nhật video
                                videoPlayer.src = data.video_url;
                                videoPlayer.style.display = 'block'; // Hiển thị video
                                viewDefault.style.display = 'none';
                                gaveFeedback.style.display = 'block';
                                noFeedback.style.display = 'none';
                                // // Cập nhật phản hồi của PT
                                // feedbackElement.textContent = data.feedback;
    
                                // // Cập nhật thời gian video
                                // durationElement.textContent = data.duration;
                            } else {
                                viewDefault.style.display = 'block';
                                gaveFeedback.style.display = 'none';
                                noFeedback.style.display = 'block';
                                videoPlayer.style.display = 'none'; // Ẩn video nếu không tìm thấy
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching video:', error);
                            alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                        });
                }
            });
        });
    </script>
    
</body>

</html>
