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
                                    <th class="text-center">Chi tiết</th>
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
        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
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
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> -->
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
                    <td class="align-middle">
                        <img src="assets/backend/img/accounts/${sp.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                        ${sp.user_name}
                    </td>
                    <td class="align-middle text-truncate" style="max-width: 300px;">${sp.content}</td>
                    <td class="align-middle">${sp.exercise_name}</td>
                    <td class="align-middle">${sp.staff_name}</td>
                    <td class="align-middle">${formattedDate}</td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-info text-white toggle-replies btn-replie" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showComment(${sp.id})">
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
                        <img src="assets/backend/img/accounts/${response.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table me-5">
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
                    <div class="text-justify"><strong>Nội dung:</strong><p class="text-justify-custom"> ${response.content}</p></div>

                    <div class="row">
                        <div class="col-5"> <strong> Bài tập: </strong> ${response.exercise_name}</div>
                        <div class="col-4"> <strong> PT: </strong> ${response.staff_name}</div>
                        <div class="col-3"> <strong> Phản hồi: </strong> ${response.replies.length}</div>
                    </div>

                    <hr>

                 
                    ${response.replies.map(reply => `
                        <div class="d-flex">
                            <img src="assets/backend/img/accounts/${reply.user_id == reply.staff_userid ? reply.staff_avatar : reply.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table col-12">
                            <div class="ms-3">
                                ${reply.user_id == reply.staff_userid
                                    ? '<span class="badge border border-primary text-primary mb-3">Hướng dẫn viên</span>'
                                    : '<span class="badge border border-success text-success text-primary mb-3">Người dùng</span>'
                                }
                                <h6><strong>${reply.user_id == reply.staff_userid ? reply.staff_name : reply.user_name}</strong></h6>
                                <p style="font-size: 0.8em; color: gray;" class="mb-2 text-justify-custom">${reply.content}</p>
                            </div>
                        </div>
                    `).join('<br>')}

                    ${response.replies.length == 0 ? 'Không có phản hồi nào.' : ''}

                `);
            },
            error: function (error) {
                console.log(error);
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    }













</script>

<style>
    .text-justify-custom {
        text-align: justify;
    }
</style>
@endsection