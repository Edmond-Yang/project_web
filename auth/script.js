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

    alert("You have entered an invalid email address!")
    return false
}

function validation_password(str){
    if (str.length >= 8)
        return true

    alert("You have entered an long password!")
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
    const value = storage.getter('user-email');
    console.log(value)
    if(value != undefined)
        $('#login-email').val(value);


    // sign up
    // const form_signUp = $('#form-signup');
    // form_signUp.on('submit', function(event){
    //     console.log('in');
    //     event.preventDefault();

    //     const email = $('#signup-email').val();
    //     const password = $('#signup-password').val();
    //     const confirmed_password = $('#signup-password-confirm').val();

    //     // if(validation_email(email) && validation_password(password) && password == confirmed_password){
    //     $.post('authentication.php', {email: email, password: password})
    //     // }


        
    // })

    // login
    const form_login = $('#form-login');
    form_login.on('submit', function(event){
        event.preventDefault();
    })
} 