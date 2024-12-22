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
                            <p>THAY ĐỔI MẬT KHẨU</p>
                            Quản lý thông tin hồ sơ để bảo mật tài khoản
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif


                        <!-- thongtin -->
                        <form action="{{ route('profile.changepass_', $user->id) }}" method="post" enctype="multipart/form-data" class="row">
                            @csrf
                            <div class="col-8">
                                <div class="mg-top row">
                                    <label for="pass" class=" col-4 justify-content-end d-flex">Mật khẩu cũ:</label>
                                    <input type="password" class="col-8 ctiet-input" name="pass" id="pass" placeholder="Nhập mật khẩu hiện tại của bạn" required>
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        @error('pass')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mg-top row">
                                    <label for="newpass" class=" col-4 justify-content-end d-flex">Mật khẩu mới:</label>
                                    <input type="password" class="col-8 ctiet-input" name="newpass" id="newpass" placeholder="Nhập mật khẩu muốn đổi" required>
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        @error('newpass')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mg-top row">
                                    <label for="cfpass" class=" col-4 justify-content-end d-flex">Nhập lại mật khẩu:</label>
                                    <input type="password" class="col-8 ctiet-input" name="newpass_confirmation" id="cfpass" placeholder="Nhập lại mật khẩu mới" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-9">
                                    <div class="product__price-ranger-filter mg-top">
                                        <input type="submit" name="doimatkhau" class="ctiet-button" value="Đổi mật khẩu">
                                    </div>
                                </div>
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
