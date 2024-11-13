@extends('frontend/layouts/app-user')

@section('main')
<div id="container">
    <div class="containerr">
        
        <div class="form-container">
            <h2 class="form-header">Chỉnh Sửa Thông Tin</h2>

            <!-- Hiển thị thông báo khi cập nhật thành công -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form cập nhật thông tin -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="fullname">Họ và Tên</label>
                    <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone_number) }}" placeholder="Nhập số điện thoại">
                </div>

                <div class="form-group">
                    <label for="dob">Ngày sinh</label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob', $user->birthday) }}">
                </div>

                <div class="form-group">
                    <label>Giới tính</label>
                    <div class="gender-group">
                        <input type="radio" id="male" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                        <label for="male">Nam</label>
                        
                        <input type="radio" id="female" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                        <label for="female">Nữ</label>
                        
                        <input type="radio" id="other" name="gender" value="other" {{ $user->gender == 'other' ? 'checked' : '' }}>
                        <label for="other">Khác</label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Cập Nhật Thông Tin</button>
            </form>
        </div>
    </div>
</div>
    <script>
        // JavaScript hiển thị hình ảnh đại diện đã chọn
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');

        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                    avatarPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // JavaScript xử lý địa chỉ dựa trên tỉnh/huyện/xã (mẫu, cần thêm API hoặc dữ liệu địa phương để tự động điền)
        document.getElementById('province').addEventListener('change', function () {
            // Code để cập nhật danh sách huyện dựa trên tỉnh đã chọn
        });
        document.getElementById('district').addEventListener('change', function () {
            // Code để cập nhật danh sách xã dựa trên huyện đã chọn
        });
    </script>




@endsection