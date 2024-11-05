@extends('frontend/layouts/app-user')

@section('main')

    <div class="containerr">
    <div class="form-container">
        <h2 class="form-header">Chỉnh Sửa Thông Tin</h2>
        <div class="form-group avatar-upload">
            <label>Ảnh Đại Diện</label>
            <input type="file" id="avatar" accept="image/*">
            <div class="avatar-preview" onclick="document.getElementById('avatar').click();">
                <img id="avatarPreview" src="#" alt="Avatar" style="display: none;">
            </div>
        </div>
        <div class="form-group">
            <label for="fullname">Họ và Tên</label>
            <input type="text" id="fullname" name="fullname" value="Nguyễn Văn A">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="email@example.com">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="dob">Ngày sinh</label>
            <input type="date" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <div class="gender-group">
                <input type="radio" id="male" name="gender" value="male" checked>
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Nữ</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Khác</label>
            </div>
        </div>
        
        <button type="submit" class="submit-btn">Cập Nhật Thông Tin</button>
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