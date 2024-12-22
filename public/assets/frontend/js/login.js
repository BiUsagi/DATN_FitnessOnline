document.addEventListener('DOMContentLoaded', function() {

    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');
    const passwordInputLogin = document.getElementById('password-input-login');
    const passwordInputRegister = document.getElementById('password-input-register');
    const passwordInputRegister2 = document.getElementById('password-input-register2');
    const loginPasswordIcon = document.getElementById('login-icon-password');
    const registerPasswordIcon = document.getElementById('register-icon-password');
    const registerPasswordIcon2 = document.getElementById('register-icon-password2');

    registerLink.addEventListener('click', ()=> {
        wrapper.classList.add('active');
    });

    loginLink.addEventListener('click', ()=> {
        wrapper.classList.remove('active');
    });

    //hiện thị/ẩn mật khẩu đăng nhập;
    loginPasswordIcon.addEventListener('click', function() {
        // Kiểm tra kiểu input và chuyển đổi
        if (passwordInputLogin.type === 'password') {
            passwordInputLogin.type = 'text';
            loginPasswordIcon.classList.remove('bi-eye-fill');
            loginPasswordIcon.classList.add('bi-eye-slash-fill'); // Thay đổi icon thành "đóng mắt"
        } else {
            passwordInputLogin.type = 'password';
            loginPasswordIcon.classList.remove('bi-eye-slash-fill');
            loginPasswordIcon.classList.add('bi-eye-fill'); // Thay đổi icon thành "mở mắt"
        }
    });

    //hiện thị/ẩn mật khẩu đăng ký;
    registerPasswordIcon.addEventListener('click', function() {
        // Kiểm tra kiểu input và chuyển đổi
        if (passwordInputRegister.type === 'password') {
            passwordInputRegister.type = 'text';
            registerPasswordIcon.classList.remove('bi-eye-fill');
            registerPasswordIcon.classList.add('bi-eye-slash-fill'); // Thay đổi icon thành "đóng mắt"
        } else {
            passwordInputRegister.type = 'password';
            registerPasswordIcon.classList.remove('bi-eye-slash-fill');
            registerPasswordIcon.classList.add('bi-eye-fill');

        }
    });
    //hiện thị/ẩn nhập lại mật khẩu đăng ký;
    registerPasswordIcon2.addEventListener('click', function() {
        // Kiểm tra kiểu input và chuyển đổi
        if (passwordInputRegister2.type === 'password') {
            passwordInputRegister2.type = 'text';
            registerPasswordIcon2.classList.remove('bi-eye-fill');
            registerPasswordIcon2.classList.add('bi-eye-slash-fill'); // Thay đổi icon thành "đóng mắt"
        } else {
            passwordInputRegister2.type = 'password';
            registerPasswordIcon2.classList.remove('bi-eye-slash-fill');
            registerPasswordIcon2.classList.add('bi-eye-fill');

        }
    });
});


//xóa hết validate input khi chuyển form
document.addEventListener("DOMContentLoaded", function () {
    function resetForm() {
        // Xóa tất cả lỗi của form đăng nhập và đăng ký
        const errors = document.querySelectorAll(".errors, .errors1");
        errors.forEach(function (error) {
            error.textContent = '';
        });

        // Xóa thông báo lỗi chung (nếu có)
        const ketqua = document.getElementById("ketqua");
        if (ketqua) ketqua.textContent = '';
        const ketqua1 = document.getElementById("ketqua1");
        if (ketqua1) ketqua1.textContent = '';

        // Xóa dữ liệu trong các input
        const inputs = document.querySelectorAll("input");
        inputs.forEach(function(input) {
            input.value = '';  // Xóa nội dung các trường input
        });

        // Đặt lại icon mắt (ẩn mật khẩu) khi chuyển form
        const passwordIcons = document.querySelectorAll("#login-icon-password, #register-icon-password, #register-icon-password2");
        passwordIcons.forEach(function(icon) {
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye-fill");
        });

        // Đặt lại trạng thái của input mật khẩu về chế độ "password"
        const passwordInputs = document.querySelectorAll("#password-input-login, #password-input-register, #password-input-register2");
        passwordInputs.forEach(function(input) {
            input.type = "password";
        });
    }

    // Khi người dùng chuyển từ form đăng nhập sang form đăng ký
    const registerLink = document.querySelector(".register-link");
    if (registerLink) {
        registerLink.addEventListener("click", resetForm);
    }

    // Khi người dùng chuyển từ form đăng ký sang form đăng nhập
    const loginLink = document.querySelector(".login-link");
    if (loginLink) {
        loginLink.addEventListener("click", resetForm);
    }
});




