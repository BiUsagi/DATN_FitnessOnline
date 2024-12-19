@extends('backend/layouts/app-admin')

@section('main')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý giao dịch</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý giao dịch</li>
                <li class="breadcrumb-item active">Lịch sử thanh toán</li>
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
                            <a href="{{ route('admin.addmoney') }}" class="btn-customize">Xem yêu cầu</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">STT </th>
                                    <th class="text-center">Giá</th>
                                    <th>Tên</th>
                                    <th class="text-center my-custom-class">Nội dung</th>
                                    <th class="text-center">Mã giao dịch</th>
                                    <th class="text-center my-custom-class">Thời gian</th>
                                    <th class="text-center">Trạng thái</th>
                                    <!-- <th></th> -->
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
        $.get('http://127.0.0.1:8000/api/admin/deposithistories/list', function (res) {
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
                let status = item.status === 1 ? '<i class="bx bx-check text-success">Hoàn tất</i>' : '<i class="ri-close-circle-line text-danger"> Đã hủy</i> ';

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
                    <tr>
                        <td class="text-center text-black-50">${index}</td>
                        <td class="text-center" id="${amountClass}"><strong>${parseInt(item.amount).toLocaleString('vi-VN')}</strong></td>
                        <td>${item.user_name}</td>
                        <td class="text-center my-custom-class">${item.description}</td>
                        <td class="text-center">${item.transaction_id}</td>
                        <td class="text-center my-custom-class">${formattedDate}</td>
                        <td class="text-center">${status}</td>
                    </tr>
             `;

                index++;
            });
            $('.show-data').html(returnData);
        });
    }







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