@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bình luận report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <!-- <li class="breadcrumb-item"></li> -->
                <li class="breadcrumb-item active">Quản lí bình luận Report</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách trả lời report</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Blog</th>
                                    <th>Ngày đăng</th>
                                    <th class="text-center">Chi tiết</th>
                                    <th></th>
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

   // Hiển thị bình luận bị báo cáo
   load();
    function load(){
        $.get('http://127.0.0.1:8000/api/admin/report-comments', function (res) {
        let data = res;
        console.log(res);

        let comments = '';

        data.forEach(sp => {
            const createdAt = new Date(sp.created_at); // Chuyển đổi chuỗi thành đối tượng Date
            const formattedDate = createdAt.toLocaleDateString('en-GB'); // Định dạng dd/mm/yyyy

            comments += `
                <tr>
                    <td class="text-center align-middle">${sp.id}</td>
                    <td class="align-middle">
                        <img src="assets/backend/img/accounts/${sp.avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                        ${sp.user_name}
                    </td>
                    <td class="align-middle text-truncate" style="max-width: 300px;">${sp.content}</td>
                    <td class="align-middle">${sp.title}</td>
                    <td class="align-middle">${formattedDate}</td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-info text-white toggle-replies btn-replie" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick=" showCommentreport(${sp.id})">
                            <i class="ri-eye-fill"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="deleteComment(${sp.id})">
                            <i class="ri-delete-bin-5-fill"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        console.log(comments);
        $('#list-items').html(comments);
    
    });
    }

function deleteComment(id) {
    // Hiển thị hộp thoại xác nhận bằng SweetAlert2
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa bình luận này?',
        text: "Hành động này không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Nếu người dùng xác nhận xóa
            $.ajax({
                url: `http://127.0.0.1:8000/api/admin/comments/${id}`,
                type: 'DELETE',
                success: function (response) {
                    // Xử lý thành công
                    Swal.fire({
                        title: 'Thành công!',
                        text: 'Xóa bình luận thành công!',
                        icon: 'success'
                    });
                    load();
                   

                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        title: 'Có lỗi xảy ra!',
                        text: 'Vui lòng thử lại sau.',
                        icon: 'error'
                    });
                }
            });
        }
    });
}
// SHOW BÌNH LUẬN report
 
function showCommentreport(id) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/admin/comments/reports/${id}`,
        type: 'GET',
        success: function (response) {
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
            $('.modal-body').html(`
                <div class="text-justify"><strong>Nội dung:</strong><p class="text-justify-custom">${response.content}</p></div>

                <div class="row">
                    <div class="col-5"> <strong> Bài viết: </strong> ${response.title}</div>
                    <div class="col-4"> <strong> Người dùng: </strong> ${response.user_name}</div>
                    <div class="col-3"> <strong> Báo cáo: </strong> ${response.reports.length}</div>
                </div>

                <hr>
                <h5><strong>Danh sách báo cáo:</strong></h5>
                ${response.reports.length > 0 ? response.reports.map(report => `
                    <div class="d-flex align-items-start mb-2">
                        <img src="assets/backend/img/accounts/${report.user_avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                        <div class="ms-3">
                            <h6><strong>${report.user_name}</strong></h6>
                            <p style="font-size: 0.8em; color: gray;" class="mb-2 text-justify-custom">${report.report_content}</p>
                            <small style="font-size: 0.8em; color: gray;">Báo cáo ngày: ${new Date(report.created_at).toLocaleDateString('en-GB')}</small>
                        </div>
                    </div>
                `).join('') : '<p>Không có báo cáo nào.</p>'}
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
