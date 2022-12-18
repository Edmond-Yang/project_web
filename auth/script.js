class local_storage{

    getter(key){
        return JSON.stringify(localStorage.getItem(key));
    }

    setter(key, value){
        localStorage.setItem(key, JSON.stringify(value));
    }

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
    if(value)
        $('#login-email').val(value);
} 