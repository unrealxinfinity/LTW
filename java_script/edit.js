var ticket_id = new URLSearchParams(window.location.search).get("ticket_id");




const form = document.querySelector("section > form");

const add_form = document.querySelector("#add_form form");


const hidden_ticket_id = document.getElementById("id_ticket");

const hidden_ticket_id_add = document.getElementById("ticket_add_id");

const edit_button = document.getElementById("send_message_button");

const add_button = document.getElementById("add_hashtag_button");

const hashtag_list = document.querySelector("#add_form form ul");


const hashtag_input = document.getElementById("hashtag_search_input");

var addable_hashtags = document.querySelectorAll("#add_form form ul li");

var deletable_hashtags = document.querySelectorAll("#deletable_list input");

const deletable_list = document.getElementById("deletable_list");

const title = document.querySelector("header .ticket-box p");


console.log(deletable_hashtags);


add_form.onsubmit = (e)=>{
    e.preventDefault();
}

function delete_hashtag_listen(){

    deletable_hashtags.forEach(input =>{
        input.onclick = (e)=>{
            e.preventDefault();
            let req = new XMLHttpRequest();
            req.open("POST", "../Edit/remove_hashtag.php", true);

            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


            req.onload = () => {
            

            if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
                let data = req.response;
                title.innerHTML = data;
                input.classList.toggle("eliminate");
            }
            };
            let temp = "hashtagName="
            let res = temp.concat(input.value);
            temp = "&ticket_id=";
            let super_res = temp.concat(ticket_id);
            let final = res.concat(super_res);
            req.send(final);
        }
    });
}

delete_hashtag_listen();
function get_delatable_hashtags(){
    let req = new XMLHttpRequest();

            
    req.open("POST", "../Edit/get_deletable_hashtags.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                deletable_list.innerHTML = data;
                deletable_hashtags = document.querySelectorAll("#deletable_list input");
                delete_hashtag_listen();
                console.log(deletable_hashtags);
                
                

                    
                    


        }
    }
    let form_info = new FormData(add_form);
    req.send(form_info);
}

add_button.onclick = ()=>{
    let req = new XMLHttpRequest();

            
    req.open("POST", "../Edit/add_hashtag.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                hashtag_input.value = '';
                hashtag_list.innerHTML = '';
                let data = req.response;
                title.innerHTML = data;
                get_delatable_hashtags();
                
                

                    
                    


        }
    }
    let form_info = new FormData(add_form);
    req.send(form_info);
}





function add_listener(){
    addable_hashtags.forEach(input =>{
        input.addEventListener("click", ()=>{
            hashtag_input.value = input.innerHTML;
            hashtag_list.innerHTML = '';
        });
    });
}





hidden_ticket_id.value = ticket_id;

hidden_ticket_id_add.value = ticket_id;



edit_button.onclick = ()=>{
    let req = new XMLHttpRequest();

            
    req.open("POST", "../Edit/update_ticket_info.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                hashtag_input.innerHTML = '';

                    
                    


        }
    }
    let form_info = new FormData(form);
    req.send(form_info);
}

hashtag_input.addEventListener("keyup", (e)=>{
    if(hashtag_input.value != ''){



        let req = new XMLHttpRequest();

            
        req.open("POST", "../Submition/get_hashtags.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                if(hashtag_input.value != ''){
                    hashtag_list.innerHTML = data;
                    addable_hashtags = document.querySelectorAll("#add_form form ul li");
                    add_listener();
                }
                
                    
                    


            }
        }
        let form_info = new FormData(add_form);
        req.send(form_info);
    }
    else{
        hashtag_list.innerHTML = '';
    }
});

const back_arrow = document.querySelector(".wrapper .back_arrow");


back_arrow.addEventListener("click", ()=>{
    window.location.replace("../Boot/main_page.php");
});


