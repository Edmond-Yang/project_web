class local_storage{

    getter(key){
        return JSON.parse(localStorage.getItem(key));
    }

    setter(key, value){
        localStorage.setItem(key, JSON.stringify(value));
    }

}

function validation_email(str){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(str))
        return true

    $('#message-signup').text('Enter a Valid Email Address')
    $('#message-signup').css('color', 'red');
    return false
}

function validation_password(str){
    if (str.length >= 8)
        return true

    $('#message-signup').text('Enter a Long Password')
    $('#message-signup').css('color', 'red');
    return false
}

const storage = new local_storage();

window.onload = function(){

    // login and sign up switch
    const switchers = [...document.querySelectorAll('.switcher')]
    switchers.forEach(item =>{
        item.addEventListener('click', function(){
            switchers.forEach(item => {
                item.parentElement.classList.remove('is-active');
            })
            this.parentElement.classList.add('is-active')
        })
    })

    // from local storage
    const email_value = storage.getter('user-email');
    if(email_value)
        $('#login-email').val(value);

    const password_value = storage.getter('user-password');
    if(password_value)
        $('#login-password').val(value);


    // sign up
    const form_signUp = $('#form-signup');
    form_signUp.on('submit', function(event){
        event.preventDefault();

        const email = $('#signup-email').val();
        const password = $('#signup-password').val();
        const confirmed_password = $('#signup-password-confirm').val();

        if(validation_email(email) && validation_password(password)){
            if(password != confirmed_password){
                $('#message-signup').text('Enter The Same Password To Confirm');
                return;
            }
            $.post('authentication.php', {status: 'signup', email: email, password: password, password_confirm:confirmed_password}, function(text){
                if(text.includes('xampp')){
                    alert('Error Occur, Please Contact Our Engineer');
                    return;
                }
                

                if(text.includes('SUCCESS')){
                    $('#message-login').html(text);
                    $('#message-login').css('color', 'green');
                    $('#signup-email').val('');
                    $('#signup-password').val('');
                    $('#signup-password-confirm').val('');
                    $('#login').trigger("click");
                    storage.setter('user-email', email);
                    storage.setter('user-password', password);
                }
                else{
                    $('#message-signup').html(text);
                    $('#message-signup').css('color', 'red');
                }
                    
            })
        }


        
    })

    // login
    const form_login = $('#form-login');
    form_login.on('submit', function(event){
        console.log('in')
        event.preventDefault();

        const email = $('#login-email').val();
        const password = $('#login-password').val();

        if(email.length == 0 || password.length == 0){
            $('#message-login').html('Please Enter Your Email and Password');
            $('#message-login').css('color', 'red');
        }

        $.post('authentication.php', {status: 'login', email: email, password: password, password_confirm:''}, function(text){
            if(text.includes('SUCCESS')){
                window.location.href = 'http://localhost//project_web%20-%20複製/drag-and-drop/t3.html'
            }
            else{
                $('#message-login').html(text);
                $('#message-login').css('color', 'red');
            }
        })

    })
} 