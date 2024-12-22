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
      <div class="otp-mail">
        <p class="otp-mail">Vui lòng nhập mã OTP đã được gửi đến</p>
        <p class="otp-mail">" <strong>{{ $email }}</strong> "</p>
      </div>
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
        <div class="errors">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
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
<script>
  document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll(".otp-inputs input");

  // Đảm bảo ô đầu tiên luôn được phép nhập và mở khóa ô đầu tiên
  inputs[0].disabled = false;
  inputs[0].focus(); // Đặt focus vào ô đầu tiên khi trang được tải

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

    // Ngăn không cho người dùng click vào ô bị khóa
    input.addEventListener("click", (event) => {
      if (input.disabled) {
        event.preventDefault(); // Ngăn việc click vào ô bị khóa
        input.blur(); // Hủy focus khỏi ô bị khóa nếu click vào
      }
    });
  });
});


</script>
