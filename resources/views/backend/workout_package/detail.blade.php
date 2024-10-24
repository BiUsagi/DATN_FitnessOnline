@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Lộ trình gói: {{ $package->package_name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí lộ trình tập</li>
                    <li class="breadcrumb-item active">Lộ trình gói: {{ $package->package_name }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">  
                        <p class="modal-title fs-6 text-uppercase fw-bold" id="staticBackdropLabel">Ngày 1</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-add">
                            <div class="row">
                                <div class="col-6">
                                    <label for="#" class="fw-bold">Lựa chọn bài tập: <span class="note">(*)</span></label>
                                    <select name="" id="" class="form-control selectpicker" multiple  >
                                        <option value="0" disabled>Lựa chọn</option>
                                        <option value="1">Bài tập tay</option>
                                        <option value="2">Bài tập lưng</option>
                                        <option value="3">Bài tập ngực</option>
                                        <option value="4">Bài tập chân</option>
                                       
                                    </select>
                                  
                                    <label for="#" class="fw-bold mt-2 mb-2">Bài tập đã chọn:</label>
                                    <div class="show-data-select">
                                        {{-- <p class="data-select mb-2 d-flex justify-content-between">Bài tập chân <i class="bi bi-x-circle ms-1"></i></p>
                                        <p class="data-select mb-2 d-flex justify-content-between">Bài tập tay <i class="bi bi-x-circle ms-1"></i></p>
                                        <p class="data-select mb-2 d-flex justify-content-between">Bài tập tay <i class="bi bi-x-circle ms-1"></i></p> --}}
                                        <p class="no-selection">Chưa có bài tập nào được chọn</p>
                                    </div>
                                    

                                </div>
                                <div class="col-6">
                                    <label for="#" class="fw-bold">Trạng thái:</label><br>
                                    <div class="select-day-off">
                                        <input type="checkbox" id="check-day-off"><label for="check-day-off"><span class="day-off">Ngày nghỉ</span></label>
                                    </div>
                                    <span class="note-day-off">(* không phải ngày nghỉ thì không chọn)</span>

                                    <div class="box-add-exercise">
                                        <a href="#" class="btn-in-day btn-add">Lưu</a>
                                        <a href="#" class="btn-in-day btn-reset">Hoàn tác</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
        </div>


        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    {{-- Thông tin chung --}}
                    <div class="card">
                        <div class="card-header text-uppercase">Danh sách số ngày tập</div>
                        <div class="card-body">
                            <div class="row list-detail-exercise">
                                @for ($i = 1; $i <= $package->duration_days; $i++)
                                    <div class="col detail-exercise">
                                        <div class="overflow">
                                            <a class="btn-action btn-detail" data-day="{{ $i }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>                                        
                                        </div>
                                        <div class="number-day">
                                            <h4>Ngày {{ $i }}</h4>
                                        </div>
                                        <div class="description-day">
                                            <p>Số bài tập: {{ random_int(1, 10) }}</p> <!-- Đây là số bài tập, bạn có thể thay đổi để lấy từ DB nếu có -->
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header text-uppercase">Thông tin gói tập</div>
                        <div class="card-body">
                            <div class="infor-package-exercise">
                                <p>Tên gói tập: <span>{{ $package->package_name }}</span></p>
                                <p>Loại gói: <span>{{ $package->level }}</span></p>
                                <p>Giá: <span>${{ $package->price }}</span></p>
                                <p>Tổng số ngày: <span>{{ $package->duration_days }}</span></p>
                                <p>Tổng số bài tập: <span>90 bài</span></p>
                                <p>Tổng số người sử dụng: <span>190 người</span></p>
                                <p>Tác giả: <span>MT</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-uppercase">Hành động</div>
                        <div class="card-body">
                            <div class="action-package-exercise">
                                <div class="action-online">
                                    <input type="radio" checked name="status" id="status-online">
                                    <label for="status-online"><a>Hoạt động</a></label>
                                </div>
                                <div class="action-offline">
                                    <input type="radio" name="status" id="status-offline">
                                    <label for="status-offline"><a>Ngừng hoạt động</a></label>
                                </div>
                            </div>

                            <div class="box-action">
                                <div class="box-btn-save">
                                    <a href="#">Lưu</a>
                                </div>
                                <div class="box-btn-delete">
                                    <a href="#">Xóa tất cả</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script>
       document.addEventListener('DOMContentLoaded', function () {  
                function getDay(){
                           // Bắt sự kiện click vào nút mở modal
                    const detailButtons = document.querySelectorAll('.btn-detail');
                    const modalTitle = document.querySelector('#staticBackdropLabel');

                    detailButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            // Lấy số ngày từ thuộc tính data-day
                            const dayNumber = button.getAttribute('data-day');
                            // Cập nhật tiêu đề của modal
                            modalTitle.textContent = 'Ngày ' + dayNumber;
                        });
                    });
                }

                function actions() {
                    const selectElement = document.querySelector('.selectpicker');
                    const showDataSelect = document.querySelector('.show-data-select');

                    // Lắng nghe sự kiện thay đổi trên ô select
                    selectElement.addEventListener('change', function () {
                        // Xóa các mục đã hiển thị trước đó
                        showDataSelect.innerHTML = '';

                        // Lấy tất cả các tùy chọn đã chọn
                        const selectedOptions = Array.from(selectElement.selectedOptions);

                        // Kiểm tra nếu không có lựa chọn nào thì hiển thị thông báo
                        if (selectedOptions.length === 0) {
                            showDataSelect.innerHTML = '<p class="no-selection">Chưa có bài tập nào được chọn</p>';
                        } else {
                            // Nếu có lựa chọn, hiển thị các mục đã chọn
                            selectedOptions.forEach(option => {
                                const p = document.createElement('p');
                                p.classList.add('data-select', 'mb-2', 'd-flex', 'justify-content-between');
                                p.innerHTML = `${option.text} <i class="bi bi-x-circle ms-1"></i>`;

                                // Thêm sự kiện để xóa khi nhấn vào icon
                                p.querySelector('i').addEventListener('click', function () {
                                    p.remove(); // Xóa mục hiển thị

                                    // Bỏ chọn bài tập trong ô select
                                    option.selected = false;
                                    // Kích hoạt lại sự kiện 'change' để cập nhật danh sách hiển thị
                                    selectElement.dispatchEvent(new Event('change'));
                                });

                                // Thêm bài tập đã chọn vào danh sách
                                showDataSelect.appendChild(p);
                            });
                        }
                    });

                    // Kích hoạt sự kiện thay đổi ngay từ đầu để hiển thị đúng danh sách
                    selectElement.dispatchEvent(new Event('change'));
                }

                function main() {
                    actions();
                    getDay();
                }

                main();
            });


    </script>
@endsection
