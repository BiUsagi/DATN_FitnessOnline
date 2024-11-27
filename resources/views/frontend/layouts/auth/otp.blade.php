<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác nhận OTP</title>
  <link rel="stylesheet" href="assets/frontend/css/otp.css">
</head>
<body>
  <div class="otp-container">
    <form action="{{ route ('otp_.index') }}" method="POST">
      <h2>Xác nhận OTP</h2>
      <p>Vui lòng nhập mã OTP đã được gửi đến số điện thoại/email của bạn.</p>
      <div class="otp-inputs">
        @csrf

        <input type="text" name="otp1" maxlength="1" required>
        <input type="text" name="otp2" maxlength="1" required>
        <input type="text" name="otp3" maxlength="1" required>
        <input type="text" name="otp4" maxlength="1" required>
        <input type="text" name="otp5" maxlength="1" required>
        <input type="text" name="otp6" maxlength="1" required>
      </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <button type="submit">Xác nhận</button>
      <p class="resend-otp">
        Không nhận được mã? <a href="/resend-otp">Gửi lại</a>
      </p>
    </form>
  </div>
</body>
</html>
{{-- <script>
  document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll(".otp-inputs input");

  // Khởi tạo: chỉ cho phép nhập vào ô đầu tiên
  inputs.forEach((input, index) => {
    input.disabled = index !== 0;
  });

  inputs.forEach((input, index) => {
    // Khi người dùng nhập
    input.addEventListener("input", (event) => {
      const value = event.target.value;

      if (/^\d$/.test(value)) {
        // Nếu nhập hợp lệ và không phải ô cuối cùng
        if (index < inputs.length - 1) {
          inputs[index + 1].disabled = false; // Mở khóa ô tiếp theo
          inputs[index + 1].focus(); // Chuyển focus
        }
      } else {
        // Nếu nhập không hợp lệ, xóa giá trị
        event.target.value = "";
      }
    });

    // Khi người dùng nhấn Backspace
    input.addEventListener("keydown", (event) => {
      if (event.key === "Backspace") {
        if (input.value === "" && index > 0) {
          // Quay lại ô trước đó nếu đang rỗng
          inputs[index - 1].disabled = false;
          inputs[index - 1].focus();
          inputs[index - 1].value = ""; // Xóa giá trị ô trước
        }
      }
    });

    // Ngăn người dùng focus vào các ô không được phép
    input.addEventListener("focus", (event) => {
      if (input.disabled) {
        input.blur(); // Hủy focus khỏi ô bị khóa
      }
    });
  });

  // Kích hoạt ô đầu tiên
  inputs[0].disabled = false;
  inputs[0].focus();
});


</script> --}}
