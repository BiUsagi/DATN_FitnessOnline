document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('btn-login');
    const modal1 = document.querySelector('.modal1');
    const overflow =document.querySelector('.overflow');

    btn.addEventListener('click', function() {
        overflow.classList.add('active1');
    });
    overflow.addEventListener('click', function(){
        overflow.classList.remove('active1');
    });
    modal1.addEventListener('click', function(e){
        e.stopPropagation();
    });
});

