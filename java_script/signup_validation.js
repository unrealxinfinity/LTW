
let username = document.querySelector("form input[name=username]");
if (username) username.addEventListener("input", validateUsername, false);
console.log("USERNAME ELEM", username);


let password = document.querySelector("form input[name=password]");
if (password) password.addEventListener("input", validatePassword, false);

let register = document.querySelector("form.register_form");
if (register){
  register.addEventListener("submit", validateRegister, false);
}

function validateUsername() {
      console.log("USERNAME");
      if (!/^[0-9a-zA-Z]{6,}$/.test(this.value)) {
      console.log("USERNAME ENTERED");
      this.classList.add("invalid");
    }
    else this.classList.remove("invalid");
  }
  
  function validatePassword() {
    if (!/^[0-9a-zA-Z]{6,}$/.test(this.value))
      this.classList.add("invalid");
    else this.classList.remove("invalid");
  }
  
  function validateRegister(event) {
    let inputs = this.querySelectorAll("input");
    for (let i = 0; i < inputs.length; i++)
      if (inputs[i].classList.contains("invalid")) event.preventDefault();
  }