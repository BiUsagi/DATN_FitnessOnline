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
                        <p class="m-3 fw-bold">NGÀY 1</p>
                        <div class="d-flex justify-content-around fw-bold ">
                            <p > <i class="bi bi-backpack4"></i> Trạng Thái : <p class="text-success">Đang hoạt động</p></p>
                            <p>Số Bài Tập :<p class="text-primary">6 bài tập</p></p>
                            <p>Thời lượng : <p class="text-primary">10p30s</p></p>
                        </div>
                    </div>

                    <div class="card">
                        <p class="m-3 fw-bold"><i class="bi bi-file-earmark-play-fill"></i> Video Đã Nộp</p>
                        <div class="mt-3">
                            <video id="videoPlayer" src="uploads/user_video/1731254189.mp4" controls width="859px" max-height="450px"></video>
                        </div>
                    </div>

                    <div class="card">
                      
                        <div class="m-3">
                            <p class="m-3 fw-bold"> <i class="bi bi-chat-heart-fill"></i> Phản Hồi </p> 
                            <textarea type="text" class="form-control-customize ck-editor" id="description" data_height="10" name="description"></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-3">
                    <div class="card fw-bold">
                        <p class="m-3"><i class="bi bi-calendar-check-fill"></i> Tổng hợp các ngày</p>
                    </div>

                    <div class="card">
                        <div class="list-group" id="days-list">
                            <a class="list-group-item active">Ngày 1</a>
                            <a class="list-group-item">Ngày 2</a>
                            <a class="list-group-item">Ngày 3</a>
                            <a class="list-group-item">Ngày 4</a>
                            <a class="list-group-item">Ngày 5</a>
                            <a class="list-group-item">Ngày 6</a>
                            <a class="list-group-item">Ngày 7</a>
                        </div>
                    </div>
                    
                    <div class="card">
                        <button class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>

        </div><!-- End Page Title -->

        
    </main><!-- End #main -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('#days-list .list-group-item');

            items.forEach(item => {
                item.addEventListener('click', function () {
                    // Xóa lớp 'active' từ tất cả các phần tử
                    items.forEach(i => i.classList.remove('active'));
                    // Thêm lớp 'active' vào phần tử được nhấp
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection
