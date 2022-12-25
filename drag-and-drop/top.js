

window.onload = function(){
    $('#user').on('click', function(){
        
        if($('.user-list').css('display') == 'none')
            $('.user-list').css('display', 'block');
        else
            $('.user-list').css('display', 'none');

    })

    document.querySelectorAll('.simple-btn').forEach(function(node){
        node.addEventListener('click', function(){
            document.execCommand(node.id, false, null);
        })
    })

    document.querySelectorAll('.value-btn').forEach(function(node){
        node.addEventListener('change', function(){
            document.execCommand(node.id, false, node.value)
        })
    })
}