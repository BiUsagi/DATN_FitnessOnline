loadsidebar();

function loadsidebar() {
    $.get('http://127.0.0.1:8000/api/admin/deposithistories', function (res) {
        let count = res.length;
        console.log(count)
        if(count > 0){
            $('.request-money').html(count);
        }else if(count > 99){
            $('.request-money').html('99+');
        }
    });
};