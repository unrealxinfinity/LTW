const form = document.getElementById('register_form');
const username = document.getElementById('username');
const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
var flag = true;

form.addEventListener('submit', e => {

  if(!validate()){
    e.preventDefault();
    flag = true;
  }
});

const is_valid_email = email => {
  const test = /^[a-zA-Z0-9]+@([a-zA-Z]+\.)+[a-zA-Z]{2,4}$/;
  return test.test(String(email).toLowerCase());
}
const is_valid_username = username =>{
  const test = /^[a-zA-Z]{1,}$/;
  return test.test(username);
}
const is_valid_name = name =>{
  const test = /^[a-zA-Z]{1,}$/;
  return test.test(name);
}


const set_success = (input) => {
  const input_name = input.parentElement;
  const success_name = input_name.querySelector('.error');

  success_name.innerText = '';
  input_name.classList.remove('error');
  input_name.classList.add('success');
}

const set_error = (input, error_message) => {
  const input_name = input.parentElement;
  const error_name = input_name.querySelector('.error');
  flag = false;

  error_name.innerText = error_message;
  input_name.classList.remove('success');
  input_name.classList.add('error');
}


const validate = () => {
  const username_input = username.value.trim();
  const name_input = name.value.trim();
  const email_input = email.value.trim();
  const passoword_input = password.value.trim(); 

  if(username_input === '')set_error(username, 'Username is required');
  else if(!is_valid_username(username_input)) set_error(username, 'Invalid Username');
  else set_success(username);


  if(name_input === '')set_error(name, 'Name is required');
  else if(!is_valid_name(name_input))set_error(name, 'Invalid Name');
  else set_success(name);

  if(email_input === '')set_error(email, 'Email is required');
  else if(!is_valid_email(email_input))set_error(email, 'Provide a valid email adress');
  else set_success(email);

  if(passoword_input === '')set_error(password, 'Password is required');
  else if(passoword_input.length < 8)set_error(password, 'Password must be at least 8 characters');
  else set_success(password);
  console.log(flag);
  return flag;

}