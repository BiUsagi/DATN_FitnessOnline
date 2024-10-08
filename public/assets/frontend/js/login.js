document.addEventListener('DOMContentLoaded', function() {
    const btnLogin = document.getElementById('btn-login');
    const btnLogin2 = document.getElementById('btn-login2');
    const btnRigister = document.getElementById('btn-rigister');
    const xremove = document.getElementById('x-remove');
    const xremove2 = document.getElementById('x-remove2');
    const modal1 = document.querySelector('.modal1');
    const modal2 = document.querySelector('.modal2');
    const overflowLogin = document.querySelector('.overflow-login');
    const overflowRigiter = document.querySelector('.overflow-rigister');

    // đăng nhập
    btnLogin.addEventListener('click', function() {
        overflowLogin.classList.add('active-login');
    });
    btnLogin2.addEventListener('click', function() {
        overflowRigiter.classList.remove('active-rigister');
        overflowLogin.classList.add('active-login');
    });
    xremove.addEventListener('click', function() {
        overflowLogin.classList.remove('active-login');
    });
    overflowLogin.addEventListener('click', function(){
        overflowLogin.classList.remove('active-login');
    });
    modal1.addEventListener('click', function(e){
        e.stopPropagation();
    });

    // đăng ký
    btnRigister.addEventListener('click', function() {
        overflowLogin.classList.remove('active-login');
        overflowRigiter.classList.add('active-rigister');
    });
    xremove2.addEventListener('click', function() {
        overflowRigiter.classList.remove('active-rigister');
    });
    overflowRigiter.addEventListener('click', function(){
        overflowRigiter.classList.remove('active-rigister');
    });
    modal2.addEventListener('click', function(e){
        e.stopPropagation();
    });
});



