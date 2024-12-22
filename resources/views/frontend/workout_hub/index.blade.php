<!DOCTYPE html>
<html lang="en">
<head>
    <base href='http://127.0.0.1:8000/'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $package->package_name }}</title>
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
                        {{ $package->package_name }}</p>
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
                        <a href="{{ route('submit_exercise', ['workout_id' => $package->id, 'user_id' => Auth::user()->id]) }}" class="exercised">
                            <i class="fa-solid fa-list"></i> Các bài tập đã nộp
                        </a>
                    </div>
                    <p class="line"></p>
                    <div class="categories">
                        <div class="level-infor">
                            <p>Mức độ: </p>
                            <span>Lão luyện</span>
                        </div>
                        <div class="level-infor">
                            <p>Số bài tập: </p>
                            <span>3 bài</span>
                        </div>
                        <div class="level-infor">
                            <p>Thời lượng: </p>
                            <span>40 phút 10 giây</span>
                        </div>
                    </div>
                    <p class="notification"><span>Lưu ý (*): </span>Bạn phải xem hết tất cả video trong ngày sau đó quay
                        lại toàn bộ các động tác theo thứ tự và up video lên để tôi xem bạn đã tập đúng kỹ thuật chưa
                        rồi sau đó mới
                        được qua ngày tiếp theo nhé!</p>
                </div>
                <div class="line-title"></div>
                <div class="box-right">
                    <div class="overlay-upload">
                        <i class="fa-solid fa-lock"></i>
                        <p>(*) Xem hết bài tập để có thể nộp bài nhé!</p>
                    </div>
                    <i class="fa-solid fa-cloud-arrow-up" id="upload-exercise"></i>
                    <div class="description">
                        <p>Nộp bài tập</p>
                        <span>(*) Click và biểu tưởng để chuyển đến khu vực nộp bài cho ngày hôm nay</span>
                    </div>
                </div>

            </div>
            <div class="list-exercise">
                {{-- render bài tập --}}
                <div class="default-layout">
                    <p>Vui lòng chọn một ngày để xem các bài tập.</p>
                </div>

                <div class="made-with">
                    <p>Made with <i class="fa-solid fa-dumbbell"></i> · Powered by FITNESS ONLINE</p>
                </div>
            </div>
        </div>
        {{-- Header responsive --}}
        <div class="header-responsive">
            <label for="side-right" id="check">
                <i class="fa-solid fa-bars"></i>
            </label>
        </div>
        <input type="checkbox" id="side-right">
        <div id="sidebar">
            <div class="title">
                <p>Nội dung khóa tập</p>
            </div>
            <div class="list-days">
                @for ($i = 1; $i <= $package->duration_days; $i++)
                    @php
                        $dayProgress = $package->userPackageProgress->where('current_day', $i)->first();
                        $isCompleted = $dayProgress ? $dayProgress->is_completed : 0;
                    @endphp
                    <div class="box-day {{ $isCompleted ? '' : 'is-blocking' }}" data-day="{{ $i }}">
                        <div class="info">
                            <p>Ngày {{ $i }}</p>
                            <span><i class="fa-regular fa-clock"></i> 39:22</span>
                        </div>
                        <div class="chevron">
                            <i class="fa-solid fa-lock"></i>
                            <i class="fa-solid fa-book"></i>
                            <p>8 bài tập</p>
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
                        <h3>Hít đất</h3>
                    </div>
                    <div class="show-video">
                        <div class="video-container" >
                            <video loop>
                                <source type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="show-video2">
                        <div class="video-container">
                            <video loop>
                                <source type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-right">
                    <div class="title-detail">
                        <h3>Hướng dẫn tập</h3>
                    </div>
                    <div class="content-training" style="display: flex; flex-direction:column; align-items:flex-end; justify-content: space-between">
                        <div class="content">
                            {{-- Show hướng dẫn tập --}}
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
                            <input type="file" id="videoInput" name="video_path" accept="video/*"
                                style="display: none;">

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
        const chooseVideoButton = document.getElementById("chooseVideoButton");
        const videoInput = document.getElementById("videoInput");
        const buttonUpload = document.getElementById("buttonUpload");
        const showVideoUpload = document.getElementById("showVideoUpload");
        const videoPlayer = document.getElementById("videoPlayer");
        const videoName = document.getElementById("videoName");
        const buttonCancel = document.querySelector(".button-upload-video .cancel");
        const videoDuration = document.getElementById("videoDuration");
        const uploadProgress = document.getElementById("uploadProgress");
        const progressBar = document.getElementById("progressBar");
        const closeModalButton = document.querySelector(".close-modal-upload");
        const overflowUpload = document.querySelector(".overflow-upload");
        const uploadExercise = document.getElementById("upload-exercise");

        uploadExercise.addEventListener("click", function() {
            overflowUpload.style.display = "block";
        });

        chooseVideoButton.addEventListener("click", () => {
            videoInput.click();
        });

        videoInput.addEventListener("change", () => {
            const file = videoInput.files[0];
            if (file) {
                videoName.textContent = file.name;

                videoPlayer.src = URL.createObjectURL(file);

                buttonUpload.style.display = "none";
                showVideoUpload.style.display = "grid";
            }
        });
        videoPlayer.addEventListener("loadedmetadata", () => {
            const durationInSeconds = Math.floor(videoPlayer.duration);
            const minutes = Math.floor(durationInSeconds / 60);
            const seconds = durationInSeconds % 60;
            videoDuration.textContent = `${minutes} phút ${seconds} giây`;
        });
        let progress = 0;
        const uploadInterval = setInterval(() => {
            if (progress < 100) {
                progress += 10;
                uploadProgress.textContent = `${progress}%`;
                progressBar.style.width = `${progress}%`;
            } else {
                clearInterval(uploadInterval);
            }
        }, 300);
        buttonCancel.addEventListener('click', () => {
            buttonUpload.style.display = "flex";
            showVideoUpload.style.display = "none";
        });
        closeModalButton.addEventListener("click", function() {
            overflowUpload.style.display = "none";
        });

        const packageId = {{ $package->id }};
        const boxList = document.querySelectorAll('.box-day');
        const day = document.querySelector('.day-number');
        let currentDay = 1;
        let currentExerciseIndex = 0;
        let completedExercises = 0;
        let completedDays = 1;
        let exercisesData = [];

        function loadExercises(dayNumber) {
            $.get(`http://127.0.0.1:8000/api/admin/workout_hub/${packageId}/day/${dayNumber}`, function(res) {
                exercisesData = res;
                let returnData = '';
                if (exercisesData.length === 0 && dayNumber) {
                    returnData = `<p class="no-data">Hiện tại chưa có bài tập nào được thêm vào</p>`;
                } else {
                    exercisesData.forEach((item, index) => {
                        returnData +=
                            ` <div class="box-exercise">
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                        <div class="stt-exercise">
                            <p><span>${item.pivot.sequence}</span> <i class="fa-solid fa-dumbbell"></i></p>
                        </div>
                        <div class="img-exercise">
                            <video class="video-exercise">
                                <source src="/uploads/video_exercise/${item.video_url}" type="video/mp4" data-videoId="${item.name}">
                            </video>
                            <div class="action-start">
                                <a data-id="${item.id}">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="infor-exercise">
                            <h3>${item.name}</h3>
                            <p class="level-exercise">${item.name}</p>
                            <div class="rep-set">
                                <p><i class="fa-solid fa-dumbbell"></i> 8 reps</p>
                                <p><i class="fa-solid fa-repeat"></i> 3 sets</p>
                            </div>
                            <div class="tool">
                                <p>Dụng cụ: Không có</p>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>`;
                    });
                }
                document.querySelector('.list-exercise').innerHTML = returnData;

                const actionStart = document.querySelectorAll('.action-start a');
                actionStart.forEach(item => {
                item.addEventListener('click', function () {
                    const videoExercise = document.querySelector('.video-exercise');
                    const videoId = videoExercise.getAttribute('data-videoId');
                    const exerciseId = this.getAttribute('data-id');
                    const exercise = exercisesData.find(ex => ex.id == exerciseId);
                    const overflow = document.querySelector('.overflow');

                    document.querySelector('.title-detail h3').textContent = exercise.name;

                    const videoSrc = `/uploads/video_exercise/${exercise.video_url}`;
                    const videoSrc2 = `/uploads/video_exercise/${exercise.video_url_second}`;

                    // Video 1
                    const videoElement = document.querySelector('.show-video .video-container video');
                    const sourceElement = videoElement.querySelector('source');
                    sourceElement.src = videoSrc;
                    videoElement.load();

                    // Video 2
                    const videoElement2 = document.querySelector('.show-video2 .video-container video');
                    const sourceElement2 = videoElement2.querySelector('source');
                    sourceElement2.src = videoSrc2;
                    videoElement2.load();

                    // Nội dung mô tả
                    document.querySelector('.content').innerHTML = exercise.description;

                    // Hiển thị modal
                    overflow.classList.add('show-modal');

                 
                });
            });

            });
        }

        function upLoadVideoUser() {
            $('#video_user_upload').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                const videoFile = document.getElementById('videoInput').files[0];
                if (videoFile) {
                    formData.append('video_path', videoFile);
                }
                const urlParams = new URLSearchParams(window.location.search);
                const workoutHub = window.location.pathname.split("/").pop();
                const day = urlParams.get('day');

                formData.append('workout_package_id', workoutHub);
                formData.append('day_number', day);
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/video_user',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Nộp bài thành công!",
                            icon: "success"
                        });
                        buttonUpload.style.display = "flex";
                        showVideoUpload.style.display = "none";
                    },
                    error: function(err) {
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Có lỗi xảy ra khi nộp bài tập!",
                            icon: "error"
                        });
                    }
                });
            })
        }
        upLoadVideoUser()


        function loadExerciseByIndex(index) {
            const exercise = exercisesData[index];
            document.querySelector('.title-detail h3').textContent = exercise.name;
            document.querySelector('.content').innerHTML = exercise.description;

            const videoSrc = `/uploads/video_exercise/${exercise.video_url}`;
            const videoElement = document.querySelector('.show-video .video-container video');
            const sourceElement = videoElement.querySelector('source');
            sourceElement.src = videoSrc;
            videoElement.load();
        }

        function updateURL(dayNumber) {
            const url = new URL(window.location);
            url.searchParams.set('day', dayNumber);
            history.pushState({}, '', url);
        }

        function getDayFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('day');
        }

        boxList.forEach(item => {
            item.addEventListener('click', function() {
                if (!item.classList.contains('is-blocking')) {
                    boxList.forEach(box => box.classList.remove('active-box-day'));

                    item.classList.add('active-box-day');

                    const dayNumber = item.getAttribute('data-day');
                    day.textContent = 'Ngày ' + dayNumber;
                    loadExercises(dayNumber);
                    
                    updateURL(dayNumber);

                    currentDay = dayNumber;
                    currentExerciseIndex = 0;
                    completedExercises = 0;
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const dayFromURL = getDayFromURL();
            if (dayFromURL) {
                const dayBox = document.querySelector(`.box-day[data-day="${dayFromURL}"]`);
                if (dayBox) {
                    dayBox.classList.add('active-box-day');
                    day.textContent = 'Ngày ' + dayFromURL;
                    loadExercises(dayFromURL);
                    currentDay = dayFromURL;
                    currentExerciseIndex = 0;
                    completedExercises = 0;
                }
            } else {
                const firstBoxDay = document.querySelector('.box-day:first-child');
                if (firstBoxDay) {
                    firstBoxDay.classList.add('active-box-day');
                    day.textContent = 'Ngày 1';
                    loadExercises(1);
                    currentDay = 1;
                }
            }
            const firstBoxDay = document.querySelector('.box-day:first-child');
            const firstPackage = document.querySelector('.package:first-child');

            if (firstBoxDay) {
                firstBoxDay.classList.remove('is-blocking');
            }

            if (firstPackage) {
                firstPackage.classList.remove('is-blocking');
            }

            const allBoxDays = document.querySelectorAll('.box-day');

            allBoxDays.forEach(function(boxDay) {
                const chevron = boxDay.querySelector('.chevron');

                if (!boxDay.classList.contains('is-blocking')) {
                    chevron.querySelector('.fa-lock').style.display = 'none';
                    chevron.querySelector('.fa-book').style.display = 'block';
                    chevron.querySelector('p').style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>
