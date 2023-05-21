const agent_option_list = document.querySelector("#promote form > .ticket_control select");

const current_role = document.querySelector("#promote form p");

const new_role = document.getElementById("new_role");

const upgrade_button = document.querySelector("#promote form .control input");

const upgrade_form = document.querySelector("#promote form");

const add_feature_list = document.querySelector("#add form select");

const add_form = document.querySelector("#add form");

const add_form_button = document.getElementById("add_feature_button");

const add_form_input_text = document.getElementById("new_feature");

const add_agent_departments_form = document.querySelector("#AgentDepartments form");

const agent_add_departments_options = document.querySelector("#AgentDepartments form > .ticket_control select");

const agent_current_departments_options = document.getElementById("current_departments");

const new_agent_departments_options = document.getElementById("new_department");

const add_agent_departments_button = document.querySelector("#AgentDepartments form input");


add_agent_departments_form.onsubmit = (e)=>{
    e.preventDefault();
}


agent_add_departments_options.value = '';

new_agent_departments_options.value = '';


agent_add_departments_options.addEventListener('change', (e)=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Submition/get_agent_departments.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            console.log(data);
            agent_current_departments_options.innerHTML = data;

        }
    }

    let form_info = new FormData(add_agent_departments_form);
    req.send(form_info); 
});

add_agent_departments_button.onclick = ()=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Submition/add_agent_department.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            console.log(data);
            agent_current_departments_options.innerHTML = data;

        }
    }

    let form_info = new FormData(add_agent_departments_form);
    req.send(form_info);//add department to agent
}




add_form.onsubmit = (e)=>{
    e.preventDefault();
}

add_form_button.onclick = ()=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Submition/add_feature.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            add_feature_list.value = '';
            add_form_input_text.value = '';

        }
    }

    let form_info = new FormData(add_form);
    req.send(form_info);
}

upgrade_form.onsubmit = (e)=>{
    e.preventDefault();
}

upgrade_button.onclick = ()=>{
            let req = new XMLHttpRequest();
            req.open("POST", "../Submition/promote_user.php", true);


            req.onload = () => {
            

                if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {

                    let data = req.response;
                    console.log(data);
                    if(data != '!')agent_option_list.innerHTML = data;
                    if(data == ''){
                        agent_option_list.innerHTML = '<option></option>';
                    }
                    agent_option_list.value = '';
                    current_role.innerHTML = '';
                    new_role.value = '';
                    
                    
                }
            }
            let form_info = new FormData(upgrade_form);
            req.send(form_info);
}


agent_option_list.value = '';

add_feature_list.value = '';


agent_option_list.addEventListener('change', (e)=>{
            let req = new XMLHttpRequest();
            req.open("POST", "../Submition/get_role.php", true);

            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


            req.onload = () => {
            

                if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
                    let data = req.response;
                    current_role.innerHTML = data;
                    if(current_role.innerHTML === "Agent"){
                        new_role.innerHTML = '<option>Admin</option>';
                    }
                    else{
                        new_role.innerHTML = '<option>Agent</option>'+
                                            '<option>Admin</option>';
                    }
                    
                }
            }
            let temp = "userName="
            let res = temp.concat(agent_option_list.value);
            req.send(res);
});

//FAQS

//Adds click action to the FAQ question boxes
function on_click_collapsible(){
    let faqs = document.getElementsByClassName("collapsible");
    for (var i = 0; i < faqs.length; i++) {
        faqs[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (this.classList.contains('active')) {
            content.style.maxHeight = content.scrollHeight + 'px';
          } else {
            content.style.maxHeight = '0px';
          }
            
        });
      }
}
on_click_collapsible();

const FAQ_button = document.getElementById('FAQsubmit');
const FAQForm = document.querySelector('.formFlex form');
const popupHTML = document.getElementById('popMessage');
const faqs_pos = document.getElementById('FAQBlock');
const identifier='<div class="popup"><span class="popuptext" id="myPopup">Question already exists!</span></div>';
questions = document.getElementsByClassName('collapsible');
delete_FAQ_buttons = document.getElementsByClassName('material-icons');

FAQForm.onsubmit=(e)=>{
    e.preventDefault();
}
FAQ_button.onclick=()=>{
    let req = new XMLHttpRequest();
    req.open("POST","../Submition/insert_faq.php",true);
    let form_info = new FormData(FAQForm);
    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            if(data == identifier){
                popupHTML.innerHTML = data;
                 setTimeout(() => {
                 popupHTML.innerHTML = '';
                 }, 2000);
            }
            else{
                faqs_pos.innerHTML=data;
                
                delete_FAQ_buttons = document.getElementsByClassName('material-icons');
                questions = document.getElementsByClassName('collapsible');
                on_click_collapsible();
                detect_buttons();
            }
        }
    }
    req.send(form_info);
}

function DeleteFAQ(index){
    return function(event) {
        event.stopPropagation(); 
        let req = new XMLHttpRequest();

       req.open("POST","../Submition/delete_faq.php",true);
        var questionwExtraLetters = questions[index].textContent;
        var question=questionwExtraLetters.slice(0,-6);
        req.onload = ()=>{
            let data = req.response;
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                faqs_pos.innerHTML=data;
                delete_FAQ_buttons = document.getElementsByClassName('material-icons');
                questions = document.getElementsByClassName('collapsible');
                on_click_collapsible();
                detect_buttons();
            }
       
        };
        var post_item = "question="+encodeURIComponent(question);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send(post_item);
    }
}
function detect_buttons(){
    for (var i = 0; i < delete_FAQ_buttons.length; i++) {
        delete_FAQ_buttons[i].addEventListener('click',DeleteFAQ(i));
        delete_FAQ_buttons[i].addEventListener('click',function(event){
            event.stopPropagation(); 
        })
      }
}
detect_buttons();


