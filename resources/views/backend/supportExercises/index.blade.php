@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Chăm sóc khách hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <!-- <li class="breadcrumb-item"></li> -->
                <li class="breadcrumb-item active">Chăm sóc khách hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách câu hỏi</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nội dung</th>
                                    <th>Tên người dùng</th>
                                    <th>Tên bài tập</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Phản hồi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportExercises as $sp)
                                    <tr>
                                        <td>{{ $sp['id'] }}</td>
                                        <td>{{ $sp['content'] }}</td>
                                        <td>{{ $sp['user_name'] }}</td>
                                        <td>{{ $sp['exercise_name'] }}</td>
                                        <td>{{ $sp['staff_name'] }}</td>
                                        <td>{{ $sp['created_at'] }}</td>
                                        <td>
                                            <button class="toggle-replies btn-replies"
                                                data-target="replies-{{ $sp['id'] }}">Xem phản hồi</button>
                                        </td>
                                    </tr>
                                    <tr class="replies" id="replies-{{ $sp['id'] }}" style="display: none;">
                                        <td colspan="7">
                                            <table class="table">
                                                @foreach ($sp['replies'] as $reply)
                                                    <tr id="rep">
                                                        <td>{{ $reply['id'] }}</td>
                                                        <td>{{ $reply['content'] }}</td>
                                                        <td>{{ $reply['user_name'] }}</td>
                                                        <td>{{ $sp['exercise_name'] }}</td>
                                                        <td>{{ $reply['staff_name'] }}</td>
                                                        <td>{{ $reply['created_at'] }}</td>
                                                        
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
<style>
    .btn-replies {
        background-color: #4CAF50; /* Màu nền xanh lá cây */
        color: white; /* Màu chữ trắng */
        border: none; /* Không viền */
        padding: 8px 16px; /* Khoảng cách bên trong */
        text-align: center; /* Căn giữa chữ */
        text-decoration: none; /* Không gạch chân */
        display: inline-block; /* Hiển thị như nút */
        margin: 4px 2px; /* Khoảng cách giữa các nút */
        cursor: pointer; /* Con trỏ chuột khi di chuột qua */
        border-radius: 4px; /* Bo góc */
        transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
        width: 140px;
    }

    .btn-replies:hover {
        background-color: #45a049; /* Màu nền khi di chuột qua */
    }
    #rep td{
        background-color: whitesmoke;
        color: gray;
        /* padding-left: 0; */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-replies');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const repliesRow = document.getElementById(targetId);
                
                if (repliesRow.style.display === 'none') {
                    repliesRow.style.display = 'table-row'; // Hiện phản hồi
                    this.textContent = 'Ẩn phản hồi'; // Đổi văn bản nút
                } else {
                    repliesRow.style.display = 'none'; // Ẩn phản hồi
                    this.textContent = 'Xem phản hồi'; // Đổi văn bản nút
                }
            });
        });
    });
</script>
