@extends('backend/layouts/app-admin')
@section('main')
   
<main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí khách hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lí khách hàng</li>
                    <li class="breadcrumb-item active">Danh sách khách hàng</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-9 text-bold">
                    <div class="card">
                        <div class="confirm d-flex align-items-center justify-content-between">
                            <p class="m-3 fw-bold title-day">NGÀY  </p>
                            <a href="#" class="m-3 confirm-success"><i class="ri-checkbox-circle-fill"></i> Xác nhận hoàn thành</a>
                        </div>
                        <div class="fw-bold ">
                            <p class="m-3 day-upload"></p>
                        </div>
                    </div>
                    
                    <div class="hidden-default" style="display: block;">
                        <div id="default-view">
                            <img src="uploads/user_image/{{ $avatar->avatar }}" alt="Hình ảnh tập gym" />
                            <h2>Danh sách Video đã nộp của {{ $avatar->user_name }}</h2>
                            <p>Bạn đang duyệt video bài tập của học viên. Hãy kiểm tra và đánh giá kỹ lưỡng từng video để đảm bảo rằng học viên đã thực hiện đúng theo yêu cầu của bài tập.
                            Vui lòng cung cấp phản hồi chi tiết và đầy đủ để giúp học viên cải thiện kỹ thuật và đạt được mục tiêu tập luyện của họ.</p>
                            <p>Cảm ơn bạn vì sự tận tâm và hỗ trợ trong việc hướng dẫn học viên!</p>
                            {{-- <a href="/" class="cta-button">Khám phá ngay</a> --}}
                            <div class="icon-container">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                        </div>
                    </div>
        
                    <form action="#" id="form_feedback" method ="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="hidden" style="display: none;">
                            <div class="card">
                                <p class="m-3 fw-bold" id="pUpload"><i class="bi bi-file-earmark-play-fill"></i> Video Đã Nộp</p>
                                <div class="mt-3">
                                    <video id="videoPlayer"  src="uploads/user_video/1731254189.mp4" controls width="100%" max-height="450px" style="display: none;"></video>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card hidden" style="display: none;">
                            <div class="card">
                            
                                <div class="m-3">
                                    <p class="m-3 fw-bold"> <i class="bi bi-chat-heart-fill"></i> Phản Hồi </p> 
                                    <textarea type="text" class="form-control-customize ck-editor" id="feedback" data_height="10" name="feedback"></textarea>
                                </div>

                                <div class="m-3">
                                    <input type="hidden" value="{{ $days->staff_id }}" name="pt_id">
                                    <input type="hidden" id="videoIdInput" name="video_id">
                                </div>

                            </div>
                        </div>
                       

                    </div>

                    <div class="col-3">
                        <div class="card fw-bold">
                            <p class="m-3"><i class="bi bi-calendar-check-fill"></i> Tổng hợp các ngày</p>
                        </div>

                        <div class="card">
                            <div class="list-group" id="days-list" style="max-height: 850px;overflow-y: scroll;scrollbar-width: none;">
                                @for( $i = 1; $i <= $days->duration_days; $i++)
                                    <a class="list-group-item box-day" style="cursor: pointer;">Ngày {{$i}}</a>
                                @endfor
                            </div>
                        </div>

                        <div class="card hidden" style="display: none;">
                            <div class="card-header text-uppercase">Đánh giá</div>
                            <div class="card-body">
                                <div class="action-package-exercise">
                                    <div class="action-online">
                                        <input type="radio" class="form-check-input" checked name="status" id="status-online" value="1">
                                        <label for="status-online"><a>Đạt</a></label>
                                    </div>
                                    <div class="action-offline">
                                        <input type="radio" class="form-check-input" name="status" id="status-offline" value="2">
                                        <label for="status-offline"><a>Chưa đạt</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden" style="display: none;">
                            <div class="card">
                                <input type="submit" class="btn btn-primary" value="Xác nhận">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- End Page Title -->
        

        
    </main><!-- End #main -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {
        const days = document.querySelectorAll('.box-day'); // Chọn tất cả phần tử có class 'box-day'
        const elementHidden = document.querySelectorAll('.hidden'); 
        const hiddenDf = document.querySelector('.hidden-default'); 

        // Thêm sự kiện click cho mỗi ngày
        days.forEach(day => {
            day.addEventListener('click', function () {
                // Xóa lớp 'active' từ tất cả các phần tử
                days.forEach(d => d.classList.remove('active'));
                // Thêm lớp 'active' vào phần tử được nhấp
                this.classList.add('active');

                // Lấy số ngày từ phần tử được click
                const dayNumber = this.textContent.trim().split(' ')[1]; // Lấy số ngày từ nội dung text

                hiddenDf.style.display = 'none';

                elementHidden.forEach(element => {
                    element.style.display = 'block';
                });

                // Cập nhật nội dung ngày
                document.querySelector('.title-day').textContent = `NGÀY ${dayNumber}`;

                const workoutId = "{{ $info->workout_package_id }}";
                const userId = "{{ $info->user_id }}";
                
                fetch(`api/get-video/${workoutId}/${userId}/${dayNumber}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status_main === 'success') {

                            const dayUpload= new Date(data.created_at);
                            const formattedDate = `${dayUpload.getHours().toString().padStart(2, '0')}:${dayUpload.getMinutes().toString().padStart(2, '0')} ${dayUpload.getDate().toString().padStart(2, '0')}/${(dayUpload.getMonth() + 1).toString().padStart(2, '0')}/${dayUpload.getFullYear()}`;
                            
                            
                            dayUploadHtml = document.querySelector('.day-upload')
                            dayUploadHtml.innerHTML = `<p>Ngày đăng : ${formattedDate} </p>`

                            //lấy id video
                            const videoId = data.video_id;
                            console.log('Video ID:', videoId);

                            const videoIdInput = document.getElementById('videoIdInput');
                            videoIdInput.value = videoId;

                            const videoPlayer = document.getElementById('videoPlayer');
                            videoPlayer.src = data.video_url;
                            videoPlayer.style.display = 'block';
                        } else {
                            Swal.fire({
                            icon: "warning",
                            title: "Khách hàng chưa nộp video của ngày này",
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching video:', error);
                        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                    });
            });
        });
    });


    $('#form_feedback').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let content = CKEDITOR.instances['feedback'].getData();
            formData.append('feedback', content);
            const videoId = document.getElementById('videoIdInput').value;
            $.ajax({
                url: `http://127.0.0.1:8000/api/admin/feedback/${videoId}`,
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function(res) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Feedback thành công!",
                        icon: "success"
                    });
                    $('#form_feedback')[0].reset();
                    CKEDITOR.instances['feedback'].setData('');
                },
                error: function(err) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra khi Feedback!",
                        icon: "error"
                    });
                }
            });
        });
        function confirmSuccess() {
                const confirmButton = document.querySelector('.confirm-success');
                confirmButton.addEventListener('click', function (e) {
                    e.preventDefault();

                    const workoutId = "{{ $info->workout_package_id }}"; 
                    const userId = "{{ $info->user_id }}"; 
                    const activeDay = document.querySelector('.box-day.active');
                    const dayNumber = activeDay ? parseInt(activeDay.textContent.trim().split(' ')[1]) : null;


                    if (!dayNumber) {
                        Swal.fire({
                            icon: "warning",
                            title: "Chưa chọn ngày tập",
                            text: "Vui lòng chọn ngày tập trước khi xác nhận.",
                        });
                        return;
                    }

                    Swal.fire({
                        title: 'Xác nhận hoàn thành ngày tập cho khách hàng',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#5edd50',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/api/admin/confirm-completion`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    workout_package_id: workoutId,
                                    user_id: userId,
                                    current_day: dayNumber + 1,
                                }),
                            })
                            .then(response => response.json())
                            
                            .then(data => {
                                if (data.status === 'success') {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Thành công!",
                                        text: "Ngày tập đã được xác nhận hoàn thành.",
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Lỗi!",
                                        text: "Không thể xác nhận ngày tập. Vui lòng thử lại.",
                                    });
                                }
                            })
                            .catch(error => {
                                console.log('Error:', error);
                                Swal.fire({
                                    icon: "error",
                                    title: "Lỗi!",
                                    text: "Đã xảy ra lỗi khi xác nhận.",
                                });
                            });
                        }
                    });        
                });
            }
            confirmSuccess();


    </script>
@endsection
