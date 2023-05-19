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

const back_arrow = document.querySelector(".wrapper .back_arrow");

console.log(back_arrow);

back_arrow.addEventListener("click", ()=>{
    window.location.replace("../Boot/main_page.php");
});