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
                                    <th class="text-center">ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Bài tập</th>
                                    <th>PT</th>
                                    <th>Ngày đăng</th>
                                    <th class="text-center">Phản hồi</th>
                                </tr>
                            </thead>
                            <tbody id="list-items"></tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>











        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title fs-5" id="staticBackdropLabel">Modal title</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Nội dung sẽ được cập nhật ở đây -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>





    </section>

</main><!-- End #main -->




<!-- endsection
 section('custom_js') -->
<script>


    $.get('http://127.0.0.1:8000/api/admin/supportexercises', function (res) {
        let data = res;
        // console.log(res);

        let supportExercises = '';

        data.forEach(sp => {

            const createdAt = new Date(sp.created_at); // Chuyển đổi chuỗi thành đối tượng Date
            const formattedDate = createdAt.toLocaleDateString('en-GB'); // Định dạng dd/mm/yyyy

            supportExercises += `
                <tr>
                    <td class="text-center align-middle">${sp.id}</td>
                    <td class=" align-middle">
                        <img src="assets/backend/img/${sp.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                        ${sp.user_name}
                    </td>
                    <td class=" align-middle">${sp.content}</td>
                    <td class=" align-middle">${sp.exercise_name}</td>
                    <td class=" align-middle">${sp.staff_name}</td>
                    <td class=" align-middle">${formattedDate}</td>
                    <td class=" text-center align-middle">
                        <button type="button" class="btn btn-primary toggle-replies btn-replie" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showComment(${sp.id})">
                            <i class="ri-eye-fill"></i>
                        </button>
                    </td>
                </tr>
                
            `;
        });
        $('#list-items').html(supportExercises);


    })








    function showComment(commentId) {
        $.ajax({
            url: `http://127.0.0.1:8000/api/admin/supportexercises/${commentId}`, // URL API
            type: 'GET',
            success: function (response) {
                console.log(response);

                // Cập nhật tiêu đề modal
                $('#staticBackdropLabel').html(`

                <div class="row">
                    <div class="col-3">
                        <img src="assets/backend/img/${response.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                    </div>
                    <div class="col-9">
                        <div class="d-flex flex-column">
                            <strong>${response.user_name}</strong>
                            <small style="font-size: 0.8em; color: gray;"> (${new Date(response.created_at).toLocaleDateString('en-GB')}) </small>
                        </div>
                    </div>
                </div>

               
                    
                    
                `);

                // Đổ dữ liệu vào các trường trong modal
                //response.content
                $('.modal-body').html(`
                    <p><strong>Nội dung:</strong> ${response.content}</p>
                   

                    <hr>
                    <h5>Phản hồi:</h5>
                    ${response.replies.map(reply => `
                        <div>
                            <p><strong>${reply.user_name}:</strong> ${reply.content}</p>
                            <p><small>Nhân viên: ${reply.staff_name} - Ngày: ${new Date(reply.created_at).toLocaleDateString('en-GB')}</small></p>
                        </div>
                    `).join('')}
                `);
            },
            error: function (error) {
                console.log(error);
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    }







</script>
@endsection