document.addEventListener('DOMContentLoaded', function() {

    const wrapperLogin = document.querySelector('.wrapper-login');
    const wrapperRegister = document.querySelector('.wrapper-register');

    //nút đăng nhập;
    const btnLogin = document.getElementById('btn-login');

    //nút đăng ký;
    const btnRegister = document.getElementById('btn-register');

    //check pass login;
    const passwordInputLogin = document.getElementById('password-input-login');

    //check pass đăng ký;
    const passwordInputRegister = document.getElementById('password-input-register');

    //check pass đăng ký nhập lại;
    const passwordInputRegister2 = document.getElementById('password-input-register2');

    //ẩn pass đăng nhập;
    const loginPasswordIcon = document.getElementById('login-icon-password');

    //ẩn pass đăng ký;
    const registerPasswordIcon = document.getElementById('register-icon-password');

    //ẩn pass đăng ký nhập lại;
    const registerPasswordIcon2 = document.getElementById('register-icon-password2');

    //close form;
    const iconClose = document.getElementById('icon-close');

    


    btnLogin.addEventListener('click', ()=> {
        wrapperLogin.classList.add('active-wrapper-login');
        // wrapperRegister.classList.add('active-wrapper-register');
    });

    btnRegister.addEventListener('click', ()=> {
        // wrapperLogin.classList.remove('active-wrapper-login');
        wrapperRegister.classList.add('active-wrapper-register');
    });

    iconClose.addEventListener('click', ()=>{
        wrapperLogin.classList.remove('active-wrapper-login');
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
