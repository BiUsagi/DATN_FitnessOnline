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
</script>
@endsection
