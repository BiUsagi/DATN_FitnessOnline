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
    <form action="/verify-otp" method="POST">
      <h2>Xác nhận OTP</h2>
      <p>Vui lòng nhập mã OTP đã được gửi đến số điện thoại/email của bạn.</p>
      <div class="otp-inputs">
        <input type="text" name="otp1" maxlength="1" required>
        <input type="text" name="otp2" maxlength="1" required>
        <input type="text" name="otp3" maxlength="1" required>
        <input type="text" name="otp4" maxlength="1" required>
        <input type="text" name="otp5" maxlength="1" required>
        <input type="text" name="otp6" maxlength="1" required>
      </div>
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

  // Chỉ cho phép ô đầu tiên được nhập lúc đầu
  inputs.forEach((input, index) => {
    if (index !== 0) {
      input.setAttribute("disabled", true);
    }
  });

  inputs.forEach((input, index) => {
    // Khi người dùng nhập số
    input.addEventListener("input", (event) => {
      const value = event.target.value;

      if (/^\d$/.test(value)) {
        // Mở khóa ô tiếp theo (nếu có)
        if (index < inputs.length - 1) {
          inputs[index].setAttribute("disabled", true); // Khóa ô hiện tại
          inputs[index + 1].removeAttribute("disabled"); // Mở khóa ô tiếp theo
          inputs[index + 1].focus();
        }
      } else {
        // Xóa nếu nhập ký tự không hợp lệ
        event.target.value = "";
      }
    });

    // Khi người dùng nhấn Backspace
    input.addEventListener("keydown", (event) => {
      if (event.key === "Backspace") {
        event.preventDefault(); // Ngăn backspace xóa ký tự không cần thiết

        if (input.value !== "") {
          input.value = ""; // Xóa ký tự hiện tại
        } else if (index > 0) {
          // Quay lại ô trước đó
          inputs[index].setAttribute("disabled", true);
          inputs[index - 1].removeAttribute("disabled");
          inputs[index - 1].focus();
          inputs[index - 1].value = ""; // Xóa ký tự ô trước
        }
      }
    });

    // Ngăn người dùng focus vào các ô không được phép
    input.addEventListener("focus", (event) => {
      if (input.hasAttribute("disabled")) {
        input.blur(); // Xóa focus khỏi ô không hợp lệ
      }
    });
  });

  // Kích hoạt ô đầu tiên
  inputs[0].removeAttribute("disabled");
  inputs[0].focus();
});

</script>
