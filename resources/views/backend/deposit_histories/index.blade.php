@extends('backend/layouts/app-admin')

@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý giao dịch</h1>
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
                            <a href="{{ route('admin.listmoney') }}" class="btn-customize">Xem lịch sử</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Giá</th>
                                    <th>Tên</th>
                                    <th class="text-center my-custom-class" style="min-width: 150px;">Nội dung</th>
                                    <th class="text-center">Mã giao dịch</th>
                                    <th class="text-center my-custom-class" style="min-width: 150px;">Thời gian</th>
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
            let index = 1;
            data.forEach(item => {
                let date = new Date(item.deposited_at);
                let formattedDate = date.toLocaleString('vi-VN', {
                    hour: '2-digit',
                    minute: '2-digit',
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });

                let amountClass =
                    item.amount == 10000 ? 'money-10k' :
                        item.amount == 20000 ? 'money-20k' :
                            item.amount == 50000 ? 'money-50k' :
                                item.amount == 100000 ? 'money-100k' :
                                    item.amount == 200000 ? 'money-200k' :
                                        item.amount == 500000 ? 'money-500k' :
                                            item.amount == 1000000 ? 'money-1tr' :
                                                item.amount == 2000000 ? 'money-2tr' : 'money-other';

                returnData += `
            <tr class="align-middle">
                <td class="text-center text-black-50">${index}</td>
                <td class="text-center" id="${amountClass}"><strong>${parseInt(item.amount).toLocaleString('vi-VN')}</strong></td>
                <td>${item.user_name}</td>
                <td class="text-center my-custom-class">${item.description}</td>
                <td class="text-center">${item.transaction_id}</td>
                <td class="text-center my-custom-class">${formattedDate}</td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-success" data-bs-placement="top" data-bs-title="Duyệt thanh toán" id="status1" data-id="${item.id}" data-amount="${item.amount}" data-user_id="${item.user_id}">
                    <i class="bx bx-check-double"></i></button>
                    <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-title="Hủy" id="status2" data-id="${item.id}" data-amount="${item.amount}">
                    <i class="ri-close-circle-line"></i></button>
                </td>
            </tr>
             `;

                index++;
            });
            $('.show-data').html(returnData);
        });
    }


    //duyet
    $(document).on('click', '#status2', function () {
        var id = $(this).data('id');
        var amount = $(this).data('amount');
        var user_id = $(this).data('user_id');
        var formattedAmount = new Intl.NumberFormat('vi-VN').format(amount);



        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/tickstatus/' + id + '/' + 2,
            type: 'PUT',
            data: {},
            success: function (response) {

                const notificationData = {
                    user_id: user_id,
                    message: "Bạn đã nạp thành công " + formattedAmount + " vnd.",
                    type: 1,
                    link: ""  // Nếu không cần thiết, có thể bỏ qua hoặc để chuỗi rỗng
                };

                //them thong bao
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/web/add-notification',
                    method: 'POST',
                    data: JSON.stringify(notificationData), // Chuyển đổi dữ liệu thành chuỗi JSON
                    contentType: 'application/json',        // Định dạng nội dung là JSON
                    dataType: 'json',                       // Kiểu dữ liệu mong đợi trả về
                });


                //them tien vao vi
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/wallet/' + id + '/' + amount,
                    type: 'PUT',
                    data: {},
                    success: function (response) {
                        // console.log(response);
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
                load();
                loadsidebar();

                Swal.fire({
                    title: "Thành công!",
                    text: "Đã hủy yêu cầu!",
                    icon: "success"
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
    });


    //huy
    $(document).on('click', '#status1', function () {
        var id = $(this).data('id');
        var amount = $(this).data('amount');

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/tickstatus/' + id + '/' + 1,
            type: 'PUT',
            data: {},
            success: function (response) {
                load();
                loadsidebar();

                Swal.fire({
                    title: "Thành công!",
                    text: "Đã thanh toán!",
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