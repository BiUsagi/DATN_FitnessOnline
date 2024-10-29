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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <label for="#" class="fw-bold">Lựa chọn bài tập: <span
                                            class="note">(*)</span></label>
                                    <select name="" id="list-excercise" class="form-control selectpicker" multiple>

                                    </select>

                                    <label for="#" class="fw-bold mt-2 mb-2">Bài tập đã chọn:</label>
                                    <div class="show-data-select">
                                        <p class="no-selection">Chưa có bài tập nào được chọn</p>
                                    </div>


                                </div>
                                <div class="col-6">
                                    <label for="#" class="fw-bold">Trạng thái:</label><br>
                                    <div class="select-day-off">
                                        <input type="checkbox" id="check-day-off"><label for="check-day-off"><span
                                                class="day-off">Ngày nghỉ</span></label>
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
                                            <a class="btn-action btn-detail" data-day="{{ $i }}"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </div>
                                        <div class="number-day">
                                            <h4>Ngày</h4>
                                            <h4 class="fs-3">{{ $i }}</h4>
                                        </div>

                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card card-btn-view">
                        <a href="{{route('admin.workout_hub')}}" class="view-exercise"> <i class="bi bi-eye-fill"></i> Xem trước gói tập</a>
                    </div>

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
        function getExercise() {
            $.get('http://127.0.0.1:8000/api/admin/get_exercise', function(res) {
                let data = res;
                let returnData = '';
                data.forEach(item => {
                    returnData += `
                                    <option value="${item.id}">${item.name}</option>
                            `;
                });
                $('#list-excercise').html(returnData);
            })
        }
        const packageId = {{ $package->id }};

        function saveExercise() {
            document.querySelector('.btn-add').addEventListener('click', function(e) {
                e.preventDefault();
                const selectedExercises = Array.from(document.querySelector('#list-excercise').selectedOptions)
                    .map(option => ({
                        id: option.value
                    }));
                // const isDayOff = document.querySelector('#check-day-off').checked;
                const day = document.querySelector('#staticBackdropLabel').textContent.split(' ')[1];

                // Gửi yêu cầu lưu
                $.post(`http://127.0.0.1:8000/api/admin/workout_package/${packageId}/day/${day}/exercises`, {
                    exercises: selectedExercises,
                    // is_day_off: isDayOff
                }, function(response) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thêm thành công!",
                        icon: "success"
                    });
                });
            });
        }

        function getDay() {
            const detailButtons = document.querySelectorAll('.btn-detail');
            const modalTitle = document.querySelector('#staticBackdropLabel');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dayNumber = button.getAttribute('data-day'); // Lấy số ngày từ thuộc tính data-day
                    modalTitle.textContent = 'Ngày ' + dayNumber;

                    // Gọi API để lấy danh sách bài tập cho ngày đã chọn
                    $.get(`http://127.0.0.1:8000/api/admin/workout_package/${packageId}/day/${dayNumber}/exercises`,
                        function(res) {
                            const showDataSelect = $(
                                '.show-data-select'); // Lưu trữ đối tượng chứa danh sách bài tập
                            showDataSelect.empty(); // Xóa nội dung trước đó

                            if (res.length > 0) {
                                res.forEach(item => {
                                    const exerciseItem = $(`
                                <p class="data-select d-flex justify-content-between">
                                    ${item.exercise.name}
                                    <i class="bi bi-x-circle ms-1 remove-exercise" data-id="${item.id}"></i>
                                </p>
                            `);

                                    // Thêm sự kiện xóa cho biểu tượng xóa
                                    exerciseItem.find('.remove-exercise').on('click',
                                        function() {
                                            // Xóa mục hiển thị
                                            exerciseItem.remove();

                                            // Thực hiện thêm bất kỳ logic nào khác cần thiết
                                            // Ví dụ: Nếu bạn cần xóa bài tập từ server, gọi API để thực hiện việc đó ở đây.
                                            console.log('Bài tập đã được xóa:', item
                                                .exercise.name);
                                        });

                                    // Thêm bài tập đã chọn vào danh sách
                                    showDataSelect.append(exerciseItem);
                                });
                            } else {
                                showDataSelect.html(
                                    '<p class="no-selection">Chưa có bài tập nào được chọn</p>');
                            }
                        });
                });
            });
        }


        function actions() {
            const selectElement = document.querySelector('.selectpicker');
            const showDataSelect = document.querySelector('.show-data-select');
            const dayOffCheckbox = document.querySelector('#check-day-off');

            // Lắng nghe sự kiện thay đổi trên ô select
            selectElement.addEventListener('change', function() {
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
                        p.querySelector('i').addEventListener('click', function() {
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

            // Lắng nghe sự kiện cho checkbox "Ngày nghỉ"
            dayOffCheckbox.addEventListener('change', function() {
                if (dayOffCheckbox.checked) {
                    // Nếu ngày nghỉ được chọn, bỏ chọn tất cả bài tập
                    Array.from(selectElement.options).forEach(option => {
                        option.selected = false; // Bỏ chọn bài tập
                    });
                    showDataSelect.innerHTML =
                    '<p class="no-selection">Chưa có bài tập nào được chọn</p>'; // Cập nhật thông báo
                }
                // Cập nhật lại danh sách bài tập
                selectElement.dispatchEvent(new Event('change'));
            });

            // Kích hoạt sự kiện thay đổi ngay từ đầu để hiển thị đúng danh sách
            selectElement.dispatchEvent(new Event('change'));
        }


        function main() {
            actions();
            getDay();
            getExercise();
            saveExercise();
        }

        main();
    </script>
@endsection
