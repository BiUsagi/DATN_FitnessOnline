document.addEventListener('DOMContentLoaded', function() {
    const btnLogin = document.getElementById('btn-login');
    const btnRigister = document.getElementById('btn-rigister');
    const xremove = document.getElementById('x-remove');
    const modal1 = document.querySelector('.modal1');
    const overflowLogin = document.querySelector('.overflow-login');
    const overflowRigiter = document.querySelector('.overflow-rigister');

    // đăng nhập
    btnLogin.addEventListener('click', function() {
        overflowLogin.classList.add('active-login');
    });
    xremove.addEventListener('click', function() {
        overflowLogin.classList.remove('active-login');
    });
    overflowLogin.addEventListener('click', function(){
        overflowLogin.classList.remove('active-login');
    });

    // đăng ký
    btnRigister.addEventListener('click', function() {
        overflowRigiter.classList.add('active-rigister');
    });
    xremove.addEventListener('click', function() {
        overflowRigiter.classList.remove('active-rigister');
    });
    overflowLogin.addEventListener('click', function(){
        overflowRigiter.classList.remove('active-rigister');
    });
    modal1.addEventListener('click', function(e){
        e.stopPropagation();
    });
});



