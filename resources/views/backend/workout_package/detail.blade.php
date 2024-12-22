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
                        <a href="{{route('admin.workout_hub', $package->id)}}" class="view-exercise"> <i class="bi bi-eye-fill"></i> Xem trước gói tập</a>
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
        const packageId = {{ $package->id }}
        const ptId = {{ $id }}
                
        function saveExercise() {
            let selectElement = document.querySelector('.selectpicker');
            document.querySelector('.btn-add').addEventListener('click', function(e) {
                e.preventDefault();
                const selectedExercises = Array.from(document.querySelector('#list-excercise').selectedOptions)
                    .map(option => ({
                        id: option.value
                    }));
                const isDayOff = document.querySelector('#check-day-off').checked;
                const day = document.querySelector('#staticBackdropLabel').textContent.split(' ')[1];

                $.post(`http://127.0.0.1:8000/api/admin/workout_package/${packageId}/day/${day}/exercises`, {
                    exercises: selectedExercises,
                    pt_id: ptId
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
            const selectElement = document.querySelector('#list-excercise');
            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dayNumber = button.getAttribute('data-day');
                    modalTitle.textContent = 'Ngày ' + dayNumber;
                    $.get(`http://127.0.0.1:8000/api/admin/workout_package/${packageId}/day/${dayNumber}/exercises`,
                        function(res) {
                            const showDataSelect = $(
                                '.show-data-select'); 
                            showDataSelect.empty();
                            if (res.length > 0) {
                                res.forEach(item => {
                                    const exerciseItem = $(`
                                <p class="data-select d-flex justify-content-between">
                                    ${item.exercise.name}
                                    <i class="bi bi-x-circle ms-1 remove-exercise" data-id="${item.id}"></i>
                                </p>
                            `);
                                    exerciseItem.find('.remove-exercise').on('click',
                                        function() {
                                            exerciseItem.remove();
                                            console.log('Bài tập đã được xóa:', item
                                                .exercise.name);
                                        });
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

            selectElement.addEventListener('change', function() {
                showDataSelect.innerHTML = '';
                const selectedOptions = Array.from(selectElement.selectedOptions);
                if (selectedOptions.length === 0) {
                    showDataSelect.innerHTML = '<p class="no-selection">Chưa có bài tập nào được chọn</p>';
                } else {
                    selectedOptions.forEach(option => {
                        const p = document.createElement('p');
                        p.classList.add('data-select', 'mb-2', 'd-flex', 'justify-content-between');
                        p.innerHTML = `${option.text} <i class="bi bi-x-circle ms-1"></i>`;
                        p.querySelector('i').addEventListener('click', function() {
                            p.remove(); 
                            option.selected = false; 
                            selectElement.dispatchEvent(new Event('change'));
                        });
                        showDataSelect.appendChild(p);
                    });
                }
            });

            dayOffCheckbox.addEventListener('change', function() {
                if (dayOffCheckbox.checked) {
                    Array.from(selectElement.options).forEach(option => {
                        option.selected = false; 
                    });
                    showDataSelect.innerHTML =
                    '<p class="no-selection">Chưa có bài tập nào được chọn</p>'; 
                }
                selectElement.dispatchEvent(new Event('change'));
            });

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
