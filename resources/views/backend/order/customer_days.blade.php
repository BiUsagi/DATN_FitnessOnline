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
                        <p class="m-3 fw-bold title-day">NGÀY </p>
                        <div class="d-flex justify-content-around fw-bold ">
                            <p > <i class="bi bi-backpack4"></i> Trạng Thái : <p class="text-success">Đang hoạt động</p></p>
                            <p>Số Bài Tập :<p class="text-primary">6 bài tập</p></p>
                            <p>Thời lượng : <p class="text-primary">10p30s</p></p>
                        </div>
                    </div>
                    <form action="#" id="form_feedback" method ="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <p class="m-3 fw-bold"><i class="bi bi-file-earmark-play-fill"></i> Video Đã Nộp</p>
                            <div class="mt-3">
                                <video id="videoPlayer" src="uploads/user_video/1731254189.mp4" controls width="859px" max-height="450px"></video>
                            </div>
                        </div>

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

                    <div class="col-3">
                        <div class="card fw-bold">
                            <p class="m-3"><i class="bi bi-calendar-check-fill"></i> Tổng hợp các ngày</p>
                        </div>

                        <div class="card">
                            <div class="list-group" id="days-list">
                                @for( $i = 1; $i <= $days->duration_days; $i++)
                                    <a class="list-group-item box-day" style="cursor: pointer;">Ngày {{$i}}</a>
                                @endfor
                            </div>
                        </div>
                        
                        <div class="card">
                            <input type="submit" class="btn btn-primary" value="Xác nhận">
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- End Page Title -->

        
    </main><!-- End #main -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {
        const days = document.querySelectorAll('.box-day'); // Chọn tất cả phần tử có class 'box-day'

        // Thêm sự kiện click cho mỗi ngày
        days.forEach(day => {
            day.addEventListener('click', function () {
                // Xóa lớp 'active' từ tất cả các phần tử
                days.forEach(d => d.classList.remove('active'));
                // Thêm lớp 'active' vào phần tử được nhấp
                this.classList.add('active');

                // Lấy số ngày từ phần tử được click
                const dayNumber = this.textContent.trim().split(' ')[1]; // Lấy số ngày từ nội dung text

                // Cập nhật nội dung ngày
                document.querySelector('.title-day').textContent = `NGÀY ${dayNumber}`;

                // Tại đây, bạn có thể thực hiện thêm các thao tác khác cho từng ngày như:
                // - Gọi API để lấy dữ liệu video tương ứng với ngày được chọn
                // - Cập nhật video và thông tin cho ngày đó

                // Ví dụ: Gọi API lấy video cho ngày
                const workoutId = "{{ $info->workout_package_id }}";
                console.log(workoutId)
                const userId = "{{ $info->user_id }}";
                
                fetch(`api/get-video/${workoutId}/${userId}/${dayNumber}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            //lấy id video
                            const videoId = data.video_id;
                            console.log('Video ID:', videoId);

                            const videoIdInput = document.getElementById('videoIdInput');
                            videoIdInput.value = videoId;

                            // Cập nhật video
                            const videoPlayer = document.getElementById('videoPlayer');
                            videoPlayer.src = data.video_url;
                            videoPlayer.style.display = 'block';
                        } else {
                            Swal.fire({
                            icon: "error",
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

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/feedback',
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


    </script>
@endsection
