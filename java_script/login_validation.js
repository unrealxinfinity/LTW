const form = document.getElementById('register_form');
const username = document.getElementById('username');
const password = document.getElementById('password');
var flag = true;


form.addEventListener('submit', e => {


    if(!validate()){
        e.preventDefault();
        flag = true;
    }
});

const set_success = (input) => {
    const input_name = input.parentElement;
    const success_name = input_name.querySelector('.error');

    success_name.innerText = '';
    input_name.classList.remove('error');
    input_name.classList.add('success');
}

const set_error = (input, error_message) =>{
    const input_name = input.parentElement;
    const error_name = input_name.querySelector('.error');
    flag = false;


    error_name.innerText = error_message;
    input_name.classList.remove('success');
    input_name.classList.add('error');
}
const validate = () => {
    const username_input = username.value.trim();
    const password_input = password.value.trim();


    if(username_input == '')set_error(username, 'Username is required');
    else set_success(username);


    if(password_input == '')set_error(password, "Password is required");
    else set_success(password);

    return flag;
}