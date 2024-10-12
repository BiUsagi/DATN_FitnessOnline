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
