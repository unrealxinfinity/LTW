var ticket_id = new URLSearchParams(window.location.search).get("ticket_id");

const form = document.querySelector("form");

const send_button = document.getElementById("send_message_button");

var message_value = document.getElementById("message_val");

var hidden_id = document.getElementById("id_ticket");

const message_box = document.querySelector(".wrapper .message-box");

scroll_bottom();

message_box.onmouseenter = ()=>{
    message_box.classList.add("active");
}

message_box.onmouseleave = ()=>{
    message_box.classList.remove("active");
}

hidden_id.value = ticket_id;

form.onsubmit = (e) =>{
    e.preventDefault();
}

send_button.onclick = ()=>{
    let req = new XMLHttpRequest();

    
    req.open("POST", "../Submition/send_message.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            message_value.value = '';
            


        }
    }
    let form_info = new FormData(form);
    req.send(form_info);
}



setInterval(() =>{
    let req = new XMLHttpRequest();

    
    req.open("POST", "../Submition/get_messages.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;

            message_box.innerHTML = data;
            if(!message_box.classList.contains("active")){
                scroll_bottom();
            }
            
            


        }
    }
    let form_info = new FormData(form);
    req.send(form_info);
}, 200);

function scroll_bottom(){
    message_box.scrollTop = message_box.scrollHeight;
}

//Quick Answers section
quickAnswersSection = document.getElementById('FAQDropUpContent');
quickAnswerButton = document.getElementById('FAQDropUpButton'); 

function show_quick_answers(){

    let req = new XMLHttpRequest();
    req.open ("POST","../Submition/get_quick_answers.php",true);
    req.onload = ()=>{
    if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
        let data = req.response;
        quickAnswersSection.innerHTML=data;
    }
};
req.send();
}

quickAnswerButton.onclick = ()=>{
    quickAnswerButton.classList.toggle("active");
    if(quickAnswerButton.classList.contains('active')){
        quickAnswers = document.getElementsByClassName('QuickAnswers');
        show_quick_answers();
        detect_quick_answers();
    }
    else{
        quickAnswersSection.innerHTML='';
    }
    
    
}

function detect_quick_answers(){
    if(quickAnswerButton.classList.contains('active')){
        setTimeout(() => {
            let quickAnswers = document.getElementsByClassName('AnswerContainer');
            for(var i = 0; i<quickAnswers.length;i++){
                (function(index) {

                    quickAnswers[index].onclick = () => {
                       const quickMessageToSend= quickAnswers[index].textContent;
                       document.getElementById("message_val").value=quickMessageToSend;
                    };
                  })(i);
                }
            }, 100); 
    }
   
}
