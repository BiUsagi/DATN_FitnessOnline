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
                                    <th>ID</th>
                                    <th>Mã giảm giá</th>
                                    <th>Giảm giá</th>
                                    <th>Lượt nhập</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Thời gian sử dụng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list-items">

                            @for($i=0;$i<=10;$i++)
                                <tr>
                                    <td class="text-center align-middle">{{$i}}</td>
                                    <td class="text-center align-middle">GIAMGIA20</td>
                                    <td class="text-center align-middle">20%</td>
                                    <td class="text-center align-middle">7/15</td>
                                    <td class="text-center align-middle" data-type="date" data-format="YYYY/DD/MM">3/5/2020 - 13/5/2020</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary" data-bs-placement="top" data-bs-title="Chỉnh Sửa">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-placement="top" data-bs-title="Xóa">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endfor
                                
                                
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <form id="form-exercise" method="post">
                    @csrf
                    <div class="card pb-2">
                        <div class="card-header text-uppercase">Thêm voucher</div>


                        <div class="card-body mt-2">
                            <label for="voucher" class="form-label-customize">Mã voucher <span class="note">(*)</span>:</label>
                            <input type="text" class="form-control-customize" id="voucher" name="voucher" data_height="100" placeholder="Nhập mã...">
                        </div>

                        <div class="card-body">
                            <label for="giamgia" class="form-label-customize">Giảm giá:</label>
                            <select name="giamgia" id="giamgia" class="form-control-select2 ">
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20" selected>20%</option>
                                <option value="25">25%</option>
                                <option value="30">30%</option>
                            </select>
                        </div>

                        <div class="card-body">
                            <label for="quantity" class="form-label-customize">Số lượt nhập:</label>
                            <input type="text" class="form-control-customize" id="quantity" name="quantity" data_height="100" value="15">
                        </div>

                    </div>



                    <div class="card pb-2">
                        <div class="card-header text-uppercase">Thời gian sử dụng</div>
                        <div class="row card-body">
                            <div class="mt-2 col-lg-6">
                                <label for="quantity" class="form-label-customize">Ngày bắt đầu <span class="note">(*)</span>:</label>
                                <input type="datetime-local" class="form-control-customize" id="duration" name="duration" data_height="100">
                            </div>
                            <div class="mt-2 col-lg-6">
                                <label for="quantity" class="form-label-customize">Ngày kết thúc <span class="note">(*)</span>:</label>
                                <input type="datetime-local" class="form-control-customize" id="duration" name="duration" data_height="100">
                            </div>
                        </div>
                        
                    </div>

                    

                    <div class="btn-add-reset d-flex justify-content-between ms-2 me-2">
                        <input type="submit" class="btn btn-primary mt-3 btn-add-exercise col-lg-12" value="+ Thêm voucher">
                        <!-- <input type="reset" class="btn btn-secondary mt-3" value="Hoàn tác"> -->
                    </div>


                </form>
            </div>
        </div>


    </section>

</main><!-- End #main -->

<script>
   
    // $('#form-exercise').on('submit', function(e) {
    //     e.preventDefault();

    //     let description = CKEDITOR.instances['description'].getData();

    //     let formData = $(this).serialize() + '&description=' + encodeURIComponent(description);
        
    //     $.post('http://127.0.0.1:8000/api/admin/exercises', formData, function(res) {
    //         Swal.fire({
    //             title: "Thành công!",
    //             text: "Thêm thành công bài tập!",
    //             icon: "success"
    //             });
    //     })
    //     $('#form-exercise')[0].reset();
    //     CKEDITOR.instances['description'].setData('');
    // });

    document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-title]'));
            // Kết quả trả về là một NodeList .
            //[].slice.call(...) là một kỹ thuật để chuyển đổi NodeList thành một mảng bằng cách sử dụng phương thức slice() của mảng.
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                // Phương thức map sẽ lặp qua từng phần tử trong mảng tooltipTriggerList
                //Đối với mỗi phần tử, một đối tượng Tooltip mới từ Bootstrap sẽ được khởi tạo.
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });


</script>

@endsection