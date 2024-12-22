@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Các ưu đãi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item ">Tiếp thị</li>
                <li class="breadcrumb-item active">Các ưu đãi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách ưu đãi</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">ID</th>
                                    <th class="text-center align-middle">Mã giảm giá</th>
                                    <th class="text-center align-middle">Giảm giá</th>
                                    <th class="text-center align-middle">Lượt nhập</th>
                                    <th class="text-center align-middle" data-type="date" data-format="YYYY/DD/MM">Thời
                                        hạn</th>
                                    <th class="text-center align-middle">Thao tác</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list-items">


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <form action="" id="addvoucher" method="post">
                    @csrf
                    <div class="card pb-2">
                        <div class="card-header text-uppercase">Thêm voucher</div>


                        <div class="card-body mt-2">
                            <label for="code" class="form-label-customize">Mã voucher <span
                                    class="note">(*)</span>:</label>
                            <input type="text" class="form-control-customize" id="code" name="code" data_height="100"
                                placeholder="Nhập mã...">
                        </div>

                        <div class="card-body">
                            <label for="sale" class="form-label-customize">Giảm giá:</label>
                            <select name="sale" id="sale" class="form-control-select2 ">
                                <option value="10">10%</option>
                                <option value="15" selected>15%</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                                <option value="30">30%</option>
                            </select>
                        </div>

                        <div class="card-body">
                            <label for="usage_limit" class="form-label-customize">Số lượt nhập:</label>
                            <input type="text" class="form-control-customize" id="usage_limit" name="usage_limit"
                                data_height="100" value="15">
                        </div>



                    </div>


                    @php
                        $today = \Carbon\Carbon::now()->format('Y-m-d');
                        $endDate = \Carbon\Carbon::now()->addDays(7)->format('Y-m-d');
                    @endphp

                    <div class="card pb-2">
                        <div class="card-header text-uppercase">Thời gian sử dụng</div>
                        <div class="row card-body">
                            <div class="mt-2 col-lg-6">
                                <label for="startday" class="form-label-customize">Ngày bắt đầu <span
                                        class="note">(*)</span>:</label>
                                <input type="date" class="form-control-customize" id="startday" name="startday"
                                    data_height="100" value="{{$today}}">
                            </div>
                            <div class="mt-2 col-lg-6">
                                <label for="endday" class="form-label-customize">Ngày kết thúc <span
                                        class="note">(*)</span>:</label>
                                <input type="date" class="form-control-customize" id="endday" name="endday"
                                    data_height="100" value="{{$endDate}}">
                            </div>
                        </div>

                    </div>



                    <div class="btn-add-reset d-flex justify-content-between ms-2 me-2">
                        <input type="submit" class="btn btn-primary btn-add-exercise col-lg-12" value="+ Thêm voucher">
                    </div>


                </form>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa voucher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- form edit -->
                    <form action="" method="post" id="editform">
                        <div class="modal-body">
                            <!-- Nội dung sẽ được cập nhật ở đây -->

                            <input type="text" class="form-control-customize" id="id_modal" name="id_modal" hidden>
                            <div class="card-body mt-2">
                                <label for="code_modal" class="form-label-customize">Mã voucher <span
                                        class="note">(*)</span>:</label>
                                <input type="text" class="form-control-customize" id="code_modal" name="code_modal"
                                    data_height="100" placeholder="Nhập mã...">
                            </div>
                            <div class="card-body">
                                <label for="sale_modal" class="form-label-customize">Giảm giá:</label>
                                <select name="sale_modal" id="sale_modal" class="form-control-select2 ">
                                    <option value="10">10%</option>
                                    <option value="15" selected>15%</option>
                                    <option value="20">20%</option>
                                    <option value="25">25%</option>
                                    <option value="30">30%</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="usage_limit_modal" class="form-label-customize">Số lượt nhập:</label>
                                <input type="text" class="form-control-customize" id="usage_limit_modal"
                                    name="usage_limit_modal" data_height="100" value="15">
                            </div>
                            <div class="row card-body">
                                <div class="mt-2 col-lg-6">
                                    <label for="startday_modal" class="form-label-customize">Ngày bắt đầu <span
                                            class="note">(*)</span>:</label>
                                    <input type="date" class="form-control-customize" id="startday_modal"
                                        name="startday_modal" data_height="100" value="{{$today}}">
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label for="endday_modal" class="form-label-customize">Ngày kết thúc <span
                                            class="note">(*)</span>:</label>
                                    <input type="date" class="form-control-customize" id="endday_modal"
                                        name="endday_modal" data_height="100" value="{{$endDate}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input type="submit" class="btn btn-primary" id="saveChangesBtn"
                                value="Lưu thay đổi"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

</main><!-- End #main -->

<script>

    //button
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


    //api
    load();
    function load() {
        $.get('http://127.0.0.1:8000/api/admin/vouchers', function (res) {
            let data = res;
            // console.log(res);
            let returnData = '';


            data.forEach(item => {
                const currentDate = new Date(); // Lấy ngày hiện tại
                let dayShow = ''; // Khai báo biến dayShow
                let classday = ''; // Khai báo biến classday

                // Chuyển đổi item.start_date và item.end_date thành đối tượng Date
                const startDate = new Date(item.start_date);
                const endDate = new Date(item.end_date);

                // Kiểm tra các điều kiện
                if (startDate > currentDate) {
                    dayShow = 'Sắp có';
                    classday = 'text-primary'
                } else if (endDate < currentDate) {
                    dayShow = 'Hết hạn';
                    classday = 'text-secondary'
                } else {
                    // Tính số ngày còn lại
                    const daysLeft = Math.ceil((endDate - currentDate) / (1000 * 60 * 60 * 24)); // Chuyển đổi thành ngày
                    dayShow = `Còn ${daysLeft} ngày`;
                    classday = 'text-success'
                }
                returnData += `
                    <tr>
                        <td class="text-center align-middle">${item.id}</td>
                        <td class="text-center align-middle">${item.code}</td>
                        <td class="text-center align-middle">${item.sale}%</td>
                        <td class="text-center align-middle">${item.times_used}/${item.usage_limit}</td>
                        <td class="text-center align-middle ${classday}">${dayShow}</td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-outline-primary btn-edit" data-bs-placement="top" data-bs-toggle="modal" 
                                data-bs-target="#staticBackdrop" data-bs-title="Chỉnh Sửa" value="${item.id}">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-delete" data-bs-placement="top" 
                                data-bs-title="Xóa" value="${item.id}">
                                <i class="bx bx-trash"></i>
                            </button>
                        </td>
                    </tr>
               `;
            });
            $('#list-items').empty().html(returnData);
            // console.log(returnData);
            console.log("List items element:", $('#list-items'));

        }
        )
    }


    // $('#addvoucher').on('submit', function (ev) {
    //     ev.preventDefault();
    //     let addform = $(this).serialize();
    //     // alert(addform);
    //     $.post('http://127.0.0.1:8000/api/admin/vouchers', addform, function (re) {
    //         Swal.fire({
    //             title: "Thành công!",
    //             text: "Thêm Voucher thành công!",
    //             icon: "success"
    //         });
    //     });
    //     $('#addvoucher')[0].reset();
    //     load();
    // })


    //add
    $('#addvoucher').on('submit', function (ev) {
        ev.preventDefault();
        let form = $(this);  // Lấy đối tượng form
        let addform = form.serialize(); // Lấy dữ liệu form

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/vouchers', // URL API
            type: 'POST',
            data: addform,
            success: function (response) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Thêm Voucher thành công!",
                    icon: "success"
                });
                $('#addvoucher')[0].reset();  // Reset form sau khi thêm thành công
                load();  // Tải lại danh sách vouchers
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Xóa các lỗi trước đó
                    $('.text-danger').remove();

                    // Lấy các lỗi từ phản hồi
                    let errors = xhr.responseJSON.errors;

                    // Hiển thị từng lỗi dưới các trường nhập liệu
                    for (let field in errors) {
                        let input = form.find(`[name="${field}"]`);
                        let errorMessage = `<div class="text-danger">${errors[field][0]}</div>`;
                        input.after(errorMessage);
                    }
                } else {
                    $('.text-danger').remove();
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Mã đã tồn tại.",
                        icon: "error"
                    });
                }
            }
        });
    });



    //delete
    $(document).on('click', '.btn-delete', function () {
        let id = $(this).attr('value');
        let data = { _token: '{{csrf_token()}}', _method: 'delete' };
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa không?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('http://127.0.0.1:8000/api/admin/vouchers/' + id, data, function (re) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Xóa thành công!",
                        icon: "success"
                    });
                });
        load();

            }
        });

        load();
    })


    //edit
    $('#editform').on('submit', function (ev) {
        ev.preventDefault();
        let form = $(this).serialize();
        let formArray = $(this).serializeArray();
        let idModal = formArray.find(item => item.name === 'id_modal');
        // console.log(form)

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/vouchers/' + idModal.value,
            type: 'PUT',
            data: form,
            success: function (response) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật Voucher thành công!",
                    icon: "success"
                });
                loadModal(idModal.value);
                load();
            },
            error: function (xhr) {
                console.log(xhr.responseJSON); // Kiểm tra phản hồi từ server
                if (xhr.status === 422) {
                    $('.text-danger').remove();
                    // Lấy các lỗi từ phản hồi
                    let errors = xhr.responseJSON.errors;
                    // Hiển thị từng lỗi dưới các trường nhập liệu
                    for (let field in errors) {
                        let input = $(`[name="${field}"]`);
                        let errorMessage = `<div class="text-danger">${errors[field][0]}</div>`;
                        input.after(errorMessage);
                    }
                } else {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra, vui lòng thử lại.",
                        icon: "error"
                    });
                }
            }
        });
    });



    //modal
    $(document).on('click', '.btn-edit', function () {
        let id = $(this).attr('value');
        loadModal(id);
        loadModal(id);
    })

    //loadmodal
    function loadModal(i) {
        $.get('http://127.0.0.1:8000/api/admin/vouchers/' + i, function (res) {
            let voucherId = res;
            // Cập nhật tiêu đề modal
            // $('#staticBackdropLabel').html(``);
            $('#id_modal').val(res.id);
            $('#code_modal').val(res.code);
            $('#sale_modal').val(res.sale);
            $('#usage_limit_modal').val(res.usage_limit);
            $('#startday_modal').val(res.start_date);
            $('#endday_modal').val(res.end_date);
        });
    }




</script>

@endsection