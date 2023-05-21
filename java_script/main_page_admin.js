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

const add_agent_departments_button = document.querySelector("#AgentDepartments form .control input");


add_agent_departments_form.addEventListener('submit', (e)=>{
    e.preventDefault();
});


agent_add_departments_options.value = '';

new_agent_departments_options.value = '';


agent_add_departments_options.addEventListener('change', (e)=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Actions/get_agent_departments.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            const data = req.response;

            agent_current_departments_options.innerHTML = data;

        }
    }

    let form_info = new FormData(add_agent_departments_form);
    req.send(form_info); 
});




add_agent_departments_button.addEventListener('click', ()=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Actions/add_agent_department.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            const data = req.response;

            agent_current_departments_options.innerHTML = data;
            new_agent_departments_options.value = '';

        }
    }

    let form_info = new FormData(add_agent_departments_form);
    req.send(form_info);
});




add_form.addEventListener('submit', (e)=>{
    e.preventDefault();
});

add_form_button.addEventListener('click', ()=>{
    let req = new XMLHttpRequest();

    req.open("POST", "../Actions/add_feature.php", true);

    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            add_feature_list.value = '';
            add_form_input_text.value = '';

        }
    }

    let form_info = new FormData(add_form);
    req.send(form_info);
});

upgrade_form.addEventListener('submit', (e)=>{
    e.preventDefault();
});

upgrade_button.addEventListener('click', ()=>{
            let req = new XMLHttpRequest();
            req.open("POST", "../Actions/promote_user.php", true);


            req.onload = () => {
            

                if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {

                    const data = req.response;

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
});

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

agent_option_list.value = '';

add_feature_list.value = '';


agent_option_list.addEventListener('change', (e)=>{
            let req = new XMLHttpRequest();
            req.open("POST", "../Actions/get_role.php", true);

            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


            req.onload = () => {
            

                if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
                    const data = req.response;
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

            req.send(encodeForAjax({userName: agent_option_list.value}));
});


