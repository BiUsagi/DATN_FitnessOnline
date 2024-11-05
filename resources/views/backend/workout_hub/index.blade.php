<!DOCTYPE html>
<html lang="en">
<head>
    <base href='http://127.0.0.1:8000/'>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/backend/css/workout_hub.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="header-block">
            <div class="block-left">
                <div class="name-workout">
                    <p><a href="{{route('admin.workout_package')}}"><i class="fa-solid fa-chevron-left"></i></a> {{ $package->package_name }}</p>
                </div>
            </div>
            <div class="block-right">
                <div class="duration">
                    <p>Thời lượng</p>
                </div>
            </div>
        </div>
    </header>
    <div id="main">
        <div id="content">
            <div class="title-day">
                <h2 class="day-number">Ngày 1</h2>
                <p class="line"></p>
                <div class="categories">
                    <div class="level">
                        <i class="fa-solid fa-cloud-bolt"></i>
                        <h3>Mức độ</h3>
                        <p>{{ $package->level }}</p>
                    </div>
                    <div class="level">
                        <i class="fa-solid fa-dumbbell"></i>
                        <h3>Bài tập</h3>
                        <p>8</p>
                    </div>
                    <div class="level">
                        <i class="fa-solid fa-trophy"></i>
                        <h3>Bài tập</h3>
                        <p>{{ $package->special_level }}</p>
                    </div>
                    <div class="level">
                        <i class="fa-solid fa-stopwatch"></i>
                        <h3>Thời lượng</h3>
                        <p>33:15</p>
                    </div>
                </div>
            </div>
            <div class="list-exercise">
                {{-- render bài tập --}}
            </div>
        </div>
        <div id="sidebar">
            <div class="title">
                <p>Nội dung khóa tập</p>
            </div>
            <div class="list-days">
                @for ($i = 1; $i <= $package->duration_days ; $i++)
                    <div class="box-day" data-day="{{ $i }}">
                        <div class="info">
                            <p>Ngày {{ $i }}</p>
                            <span><i class="fa-regular fa-clock"></i> 39:22</span>
                        </div>
                        <div class="chevron">
                            <i class="fa-solid fa-book"></i> <p>8 bài tập</p>
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
                        <div class="video-container">
                            <video >
                                <source  type="video/mp4">
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
                            <div class="btn btn-prev">
                                <p><i class="fa-solid fa-chevron-left"></i> Bài trước</p>
                            </div>
                            <div class="btn btn-next">
                                <p>Bài tiếp theo <i class="fa-solid fa-chevron-right"></i></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/backend/js/workout_hub.js"></script>
    <script>
        const packageId = {{ $package->id }};
        const boxList = document.querySelectorAll('.box-day');
        const day = document.querySelector('.day-number');
    
        function loadExercises(dayNumber) {
            $.get(`http://127.0.0.1:8000/api/admin/workout_hub/${packageId}/day/${dayNumber}`, function(res) {
                let data = res;
                let returnData = '';
                if(data.length === 0) {
                    returnData = `<p class="no-data">Hiện tại chưa có bài tập nào được thêm vào</p>`;
                } else {
                    data.forEach(item => {
                        returnData += `
                            <div class="box-exercise">
                                <div class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                                <div class="stt-exercise">
                                    <p><span>${item.pivot.sequence}</span> <i class="fa-solid fa-dumbbell"></i></p>
                                </div>
                                <div class="img-exercise">
                                    <video>
                                        <source src="/uploads/video_exercise/${item.video_url}" type="video/mp4" class="video-exercise" data-videoId=${item.name}>
                                    </video>
                                    <div class="action-start">
                                        <a data-start="${item.id}" class="play-button" data-id="${item.id}"><i class="fa-solid fa-play"></i></a>
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
                        `;
                    });
                }
                document.querySelector('.list-exercise').innerHTML = returnData;

                const actionStart = document.querySelectorAll('.action-start a');
                actionStart.forEach(item => {
                    item.addEventListener('click', function() {
                        const videoExercise = document.querySelector('.video-exercise');
                        const videoId = videoExercise.getAttribute('data-videoId');
                        console.log(videoId);
                        
                        const exerciseId = this.getAttribute('data-id');
                        const exercise = data.find(ex => ex.id == exerciseId);
                        const overflow = document.querySelector('.overflow');

                        document.querySelector('.title-detail h3').textContent = exercise.name;

                        const videoSrc = `/uploads/video_exercise/${exercise.video_url}`;
                        const videoElement = document.querySelector('.show-video .video-container video');
                        const sourceElement = videoElement.querySelector('source');

                        const description = document.querySelector('.content').innerHTML = exercise.description;

                        sourceElement.src = videoSrc;
                        videoElement.load();

                        overflow.classList.add('show-modal');
                    });
                });
            });
        }

    
        boxList.forEach(item => {
            item.addEventListener('click', function() {
                boxList.forEach(box => box.classList.remove('active-box-day'));
                item.classList.add('active-box-day');
                const dayNumber = item.getAttribute('data-day');
                day.textContent = 'Ngày ' + dayNumber;
                loadExercises(dayNumber);
            });
        });
    
        document.addEventListener('DOMContentLoaded', () => {
            if (boxList.length > 0) {
                const firstBox = boxList[0];
                firstBox.click();  
            }
        });
    </script>
</body>
</html>
