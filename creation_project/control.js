window.onload = function(){

    $('body').on('click', function(){
        if($('.user-list').css('display') == 'block')
            $('.user-list').css('display', 'none');
    })
    
    $('#user').on('click', function(){
        
        if($('.user-list').css('display') == 'none')
            $('.user-list').css('display', 'block');
        else
            $('.user-list').css('display', 'none');

    })

    $('#logout').click(function(){
        window.location.href = 'http://localhost/project_web/auth/auth.php';
    })

    
}