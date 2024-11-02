@extends('backend/layouts/app-admin')

@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý bài viết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý giao dịch</li>
                <li class="breadcrumb-item active">Duyệt hóa đơn</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách cần duyệt</h5>
                            <a href="{{ route('admin.post-create') }}" class="btn-customize">Tất cả giao dịch</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên</th>
                                    <th>Mệnh giá</th>
                                    <th>Nội dung</th>
                                    <th class="text-center">Mã giao dịch</th>
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center">Hành động</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="show-data">


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<script>
    load();

    function load() {
        $.get('http://127.0.0.1:8000/api/admin/deposithistories', function (res) {
            let data = res;
            let returnData = '';
            data.forEach(item => {
                let date = new Date(item.deposited_at);
                let formattedDate = date.toLocaleString('vi-VN', {
                    hour: '2-digit',
                    minute: '2-digit',
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });

                returnData += `
            <tr>
                <td class="text-center">${item.id}</td>
                <td>${item.user_name}</td>
                <td>${parseInt(item.amount).toLocaleString('vi-VN')} vnđ</td>
                <td>${item.description}</td>
                <td class="text-center">${item.transaction_id}</td>
                <td class="text-center">${formattedDate}</td>
                <td class="text-center align-middle">
                    {{-- duyet --}}
                    <button type="button" class="btn btn-success" data-bs-placement="top" data-bs-title="Duyệt thanh toán" id="status1" data-id="${item.id}" data-amount="${item.amount}">
                    <i class="bx bx-check-double"></i></button>
                    {{-- huy --}}
                    <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-title="Hủy" id="status2" data-id="${item.id}">
                    <i class="ri-close-circle-line"></i></button>
                </td>
            </tr>
             `;
            });
            $('.show-data').html(returnData);
        });
    }


    $(document).on('click', '#status1', function () {
        var id = $(this).data('id');
        var amount = $(this).data('amount');

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/tickstatus/' + id +'/' + 1,
            type: 'PUT',
            data: {},
            success: function (response) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/wallet/' + id + '/' + amount,
                    type: 'PUT',
                    data: {},
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
                load();

                Swal.fire({
                    title: "Thành công!",
                    text: "Duyệt thành công!",
                    icon: "success"
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
    });

    $(document).on('click', '#status2', function () {
        var id = $(this).data('id');
        var amount = $(this).data('amount');

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/tickstatus/' + id +'/' + 2,
            type: 'PUT',
            data: {},
            success: function (response) {
                load();

                Swal.fire({
                    title: "Thành công!",
                    text: "Hủy thành công!",
                    icon: "success"
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
    });






    // khởi tạo tooltip để hiện thị chú thích cho nút trên bảng
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-title]'));
        // Kết quả trả về là một NodeList .
        //[].slice.call(...) là một kỹ thuật để chuyển đổi NodeList thành một mảng bằng cách sử dụng phương thức slice() của mảng.
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            // Phương thức map sẽ lặp qua từng phần tử trong mảng tooltipTriggerList
            //Đối với mỗi phần tử, một đối tượng Tooltip mới từ Bootstrap sẽ được khởi tạo.
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection