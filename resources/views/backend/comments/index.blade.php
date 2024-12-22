@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bình luận</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <!-- <li class="breadcrumb-item"></li> -->
                <li class="breadcrumb-item active">Quản lí bình luận</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách bình luận</h5>
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
    //Show bình luận cha 
    reload();
    function reload(){
        $.get ('http://127.0.0.1:8000/api/admin/comments', function (res) {
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
                        <button type="button" class="btn btn-info text-white toggle-replies btn-replie" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showComment(${sp.id})">
                            <i class="ri-eye-fill"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="deleteComment(${sp.id})">
                            <i class="ri-delete-bin-5-fill"></i>
                        </button>
                    </td>
                </tr>

                
            `;
        });
        $('#list-items').html(comments);
    })
    }


    // SHOW BÌNH LUẬN CON
 
    function showComment(id) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/admin/comments/${id}`,
        type: 'GET',
        success: function (response) {
            // console.log(response);

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
                    <div class="col-3"> <strong> Phản hồi: </strong> ${response.rep.length}</div>
                </div>

                <hr>
                ${response.rep.map(reply => `
                    <div class="d-flex">
                        <img src="assets/backend/img/accounts/${reply.avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                        <div class="ms-3">
                            <h6><strong>${reply.user_name}</strong></h6>
                            <p style="font-size: 0.8em; color: gray;" class="mb-2 text-justify-custom">${reply.content}</p>
                        </div>
                        <div class="mt-2 ms-auto">
                            <button type="button" class="btn btn-danger" data-id="${reply.id}" onclick="deleteComment(${reply.id})">
                                <i class="ri-delete-bin-5-fill"></i>
                            </button>
                        </div>
                    </div>
                `).join('<br>')}    

                ${response.rep.length === 0 ? 'Không có phản hồi nào.' : ''}
            `);
        },
        error: function (error) {
            console.log(error);
            alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
        }
    });
}



// Thêm hàm xóa bình luận

function deleteComment(id) {
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
            $.ajax({
                url: `http://127.0.0.1:8000/api/admin/comments/${id}`,
                type: 'DELETE',
                success: function (response) {
                    Swal.fire({
                        title: 'Thành công!',
                        text: 'Xóa bình luận thành công!',
                        icon: 'success'
                    });

                    // Xóa bình luận cha hoặc bình luận con khỏi bảng hiển thị
                    $(`#list-items tr`).each(function() {
                        if ($(this).find('td:first').text() == id) {
                            $(this).remove();
                        }
                    });

                    // Kiểm tra và xóa bình luận con trong modal nếu đang mở
                    const modalIsOpen = $('#staticBackdrop').hasClass('show');
                    if (modalIsOpen) {
                        $(`#staticBackdrop .modal-body .d-flex`).each(function () {
                            const replyId = $(this).find('button').data('id');
                            if (replyId === id) {
                                $(this).remove(); // Xóa bình luận con khỏi modal
                            }
                        });

                        // Nếu modal vẫn đang mở, làm mới nội dung bằng cách gọi lại showComment()
                        const parentId = $('#staticBackdrop').data('commentId'); // Lấy id của bình luận cha từ thuộc tính dữ liệu
                        if (parentId) {
                            showComment(parentId);
                        }
                    }
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

<style>
    .text-justify-custom {
        text-align: justify;
    }
</style>
@endsection
{{-- function deleteComment(id) {
    // Sử dụng SweetAlert để xác nhận xóa
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa bình luận này?',
        text: "Hành động này không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            let data = { _token: '{{ csrf_token() }}', _method: 'delete' }; // Thêm CSRF token

            $.ajax({
                url: `http://127.0.0.1:8000/api/admin/comments/${id}`,
                type: 'DELETE',
                data: data,
                success: function (response) {
                    // Hiển thị thông báo thành công
                    Swal.fire({
                        title: 'Thành công!',
                        text: 'Xóa bình luận thành công!',
                        icon: 'success'
                    });

                    // Xóa dòng bình luận trong bảng mà không cần tải lại trang
                    $(`#list-items tr`).each(function() {
                        if ($(this).find('td:first').text() == id) {
                            $(this).remove(); // Loại bỏ dòng bình luận khỏi bảng
                        }
                    });
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
--}}