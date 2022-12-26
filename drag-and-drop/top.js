function initial_btn_function_textonly(id){

    $('#tool-bar').html('\
    <button class="tool-btn simple-btn" id="bold"><strong>B</strong></button>\
    <button class="tool-btn simple-btn" id="italic"><i>I</i></button>\
    <button class="tool-btn simple-btn" id="underline"><u>U</u></button>\
    <button class="tool-btn simple-btn" id="strikethrough"><del>del</del></button>\
    \
    \
<button class="tool-btn simple-btn" id="justifyLeft"><img src="./align-left.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
\
      <button class="tool-btn simple-btn" id="justifyCenter"><img src="./align-center.PNG" style="width: 23px; height: 23px; margin: 3px;">\
</button>\
      <button class="tool-btn simple-btn" id="justifyRight"><img src="./align-right.PNG" style="width: 23px; height: 23px; margin: 3px;"><\
/button>\
\
      <!-- font -->\
      <select class="value-btn" id="fontSize">\
        <option>1</option>\
        <option>2</option>\
        <option>3</option>\
        <option>4</option>\
        <option>5</option>\
        <option>6</option>\
        <option>7</option>\
      </select>\
      <p style="margin: auto 0px; margin-left: 5px; margin-right: 20px;">level</p>\
\
      <p style="margin: auto 0px; margin-right: 5px;"><strong>TEXT</strong></p>\
      <input class="value-btn" id="foreColor" type="color" style="margin-right: 20px;">\
\
      <p style="margin: auto 0px; margin-right: 5px;"><strong>HIGHLIGHT</strong></p>\
      <input class="value-btn" id="backColor" type="color">\
\
      <button id="delete" class="text" style="margin-left: 25px;">DELETE</button>\
\
    ')

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
    $('button.text').click(function(){
        $('#'+id).remove();
    })
}

function initial_btn_function_imgonly(id){
    
    $('#tool-bar').html('\
    <!-- align -->\
    <button class="tool-btn img-simple-btn" id="start"><img src="./align-left.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
    <button class="tool-btn img-simple-btn" id="center"><img src="./align-center.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
    <button class="tool-btn img-simple-btn" id="end"><img src="./align-right.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
\
    <!-- font -->\
    <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>WIDTH</strong></p>\
    <input type="number" class="img-value-btn" id="width">\
    <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px; ">px</p>\
\
    <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>HEIGHT</strong></p>\
    <input type="number" class="img-value-btn" id="height">\
    <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px;">px</p>\
    <input type="file" id="photo">\
    <button id="delete" class="img">DELETE</button>\
    ')
    // console.log(id);
    $('#img_'+id).on('load', function(){
        $('#width').val($('#img_'+id).width());
        $('#height').val($('#img_'+id).height());
    })

    if($('#img_'+id).width() && $('#img_'+id).height()){
        $('#width').val($('#img_'+id).width());
        $('#height').val($('#img_'+id).height());
    }
  
    document.querySelectorAll('.img-simple-btn').forEach(function(node){
        node.addEventListener('click', function(){
            $('#'+id).children().css('justify-content', node.id);
            
        })
        
    })

    document.querySelectorAll('.img-value-btn').forEach(function(node){
        node.addEventListener('change', function(){
            $('#'+id).children().children().children().attr(node.id, node.value);
        })
    })
    // console.log($('button.img'));

    $('button.img').click(function(){
        $('#'+id).remove();
    })
    
}


function initial_btn_function_img(id){
    
    $('#tool-bar').html('\
    <!-- align -->\
    <button class="tool-btn img-simple-btn" id="start"><img src="./align-left.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
    <button class="tool-btn img-simple-btn" id="center"><img src="./align-center.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
    <button class="tool-btn img-simple-btn" id="end"><img src="./align-right.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>\
\
    <!-- font -->\
    <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>WIDTH</strong></p>\
    <input type="number" class="img-value-btn" id="width">\
    <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px; ">px</p>\
\
    <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>HEIGHT</strong></p>\
    <input type="number" class="img-value-btn" id="height">\
    <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px;">px</p>\
    <input type="file" id="photo">\
    <button id="delete">DELETE</button>\
    ')
    // console.log(id);
    $('#img_'+id).on('load', function(){
        $('#width').val($('#img_'+id).width());
        $('#height').val($('#img_'+id).height());
    })

    if($('#img_'+id).width() && $('#img_'+id).height()){
        $('#width').val($('#img_'+id).width());
        $('#height').val($('#img_'+id).height());
    }
  
    document.querySelectorAll('.img-simple-btn').forEach(function(node){
        node.addEventListener('click', function(){
            $('#'+id).children().css('justify-content', node.id);
            
        })
        
    })

    document.querySelectorAll('.img-value-btn').forEach(function(node){
        node.addEventListener('change', function(){
            $('#'+id).children().children().children().attr(node.id, node.value);
        })
    })
}

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

    $('#project-name').change(function(){
        // post to save use email 
    })

    $('#logout').click(function(){
        window.location.href = 'http://localhost/project_web/auth/auth.php';
    })

    
}