@extends('frontend/layouts/app-user')


@section('custom_css')
    <link rel="stylesheet" href="assets/frontend/css/info.css">
@endsection


@section('main')
    <section>
        <div class="box-header"></div>

        <div class="container ctiet-main">
            <div class="row">
                @include('frontend/profile/layouts/sidebar')


                <!-- main -->
                <div class="col-9 bd-left ctiet-thongtin">
                    <div class="row">
                        <div class="col-12 ctiet-title">
                            <p>HỒ SƠ CỦA TÔI</p>
                            Quản lý thông tin hồ sơ để bảo mật tài khoản
                        </div>
                        <!-- thongtin -->
                        <form action="{{ route('profile.edit_') }}" method="post" enctype="multipart/form-data" class="row">
                            @csrf
                            <div class="col-8">
                                <div class="mg-top row">
                                    <label for="hoten" class="col-4 justify-content-end d-flex">Tên:</label>
                                    <input type="text" class="col-8 ctiet-input" name="hoten" id="hoten" placeholder="Họ và tên" value="{{ $user->user_name }}" required>
                                    <input type="hidden" class="col-8 ctiet-input" name="user_id" id="user_id" value="{{ $user->id }}" >
                                </div>
                                <div class="mg-top row">
                                    <label for="email" class="col-4 justify-content-end d-flex">Email:</label>
                                    <input type="email" class="col-8 ctiet-input" name="email" id="email" placeholder="{{ $user->email }}" value="" required readonly>
                                </div>
                                <div class="mg-top row">
                                    <label for="soDienThoai" class="col-4 justify-content-end d-flex">SĐT:</label>
                                    <input type="tel" class="col-8 ctiet-input" name="sdt" id="soDienThoai" placeholder="Số điện thoại" value="{{ $user->phone_number }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-4 justify-content-end d-flex mg-top">Giới tính:</div>
                                    <div class="col-8 mg-top row ctiet-select">
                                        <select class="form-control" id="inputGender" name="staff_gender" required>
                                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nam</option>
                                            <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Nữ</option>
                                            <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mg-top row">
                                    <label for="ngaySinh" class="col-4 justify-content-end d-flex">Ngày sinh:</label>
                                    <input type="date" class="col-8 ctiet-input" name="ngaysinh" id="ngaySinh" value="{{ old('ngaysinh', $user->birthday) }}" required>
                                </div>
                                <div class="mg-top row">
                                    <label for="address" class="col-4 justify-content-end d-flex">Địa chỉ:</label>
                                    <input type="text" class="col-8 ctiet-input" name="address" id="address" placeholder="Địa chỉ" value="{{ old('address', $user->address) }}" required>
                                </div>
                            </div>
                        
                            <!-- Hình ảnh đại diện -->
                            <div class="col-4 row">
                                <div class="col-12 mg-top">Hình ảnh cá nhân:</div>
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="{{ ('assets/backend/img/accounts/' . $user->avatar) }}" alt="Avatar" class="ctiet-imguserbig" id="previewImg">

                                </div>
                                <div class="col-12 justify-content-center">
                                    <label for="hinhanh" class="custom-file-upload">
                                        <input type="file" name="hinhanh" id="hinhanh" onchange="previewImage(event)">
                                        Chọn ảnh
                                    </label>
                                </div>
                            </div>
                        
                            <!-- Nút lưu -->
                            <div class="row ">
                                <div class="col-9 ">
                                    <div class="product__price-ranger-filter mg-top d-flex justify-content-center">
                                        <input type="submit" name="update-infor" class="ctiet-button " value="Lưu">
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
                <!-- END main -->
            </div>
        </div>
        </body>

    </section>
@endsection

@section('custom_js')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImg');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
