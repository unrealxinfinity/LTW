let menu = document.getElementById('menu');

let main = document.querySelector('main');

let nav_links = document.querySelectorAll('header nav ul li a');



var header_on = false;
menu.addEventListener('click', () => {
    document.querySelector('body').classList.toggle('toggle-header');
    if(!header_on)header_on = !header_on;
})

main.addEventListener('click', () =>{
    if(header_on){
        document.querySelector('body').classList.toggle('toggle-header');
        if(header_on)header_on = !header_on;
    }
    
});



let Section = document.querySelectorAll('section');
window.addEventListener('scroll', () => {
    const scroll_position = window.scrollY + 10
    Section.forEach(section => {
        if(scroll_position > section.offsetTop && scroll_position < (section.offsetTop + section.offsetHeight)){
            nav_links.forEach(link => {
                link.classList.remove('active');
                if(section.getAttribute('id') === link.getAttribute('href').substring(1)){
                    link.classList.add('active');
                }
            });
        }
    });
});


//var show_starting_tickets = true;

const search_ticket_form = document.querySelector("#browse form");


const ticket_box = document.querySelector("#browse .ticket_history");

const ticket_box_assigned = document.querySelector("#view .ticket_history");

const show_assigned_ticket_button = document.getElementById("show_assigned_tickets");

const hashtag_input = document.getElementById("hashtag_search_input");


const hashtag_list = document.querySelector("#browse form .ticket_control ul");

var final_hashtag = '';

function get_best_hashtag(){
    if(hashtag_input.value != ''){

        let req = new XMLHttpRequest();

            
        req.open("POST", "../Submition/get_best_hashtag.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                if(hashtag_input.value != '')hashtag_input.value = data;

                
                    
                    


            }
        }
        let form_info = new FormData(search_ticket_form);
        req.send(form_info);
    }
    else{
        hashtag_input.value = '';
    }
}


search_ticket_form.onsubmit = (e)=>{
    e.preventDefault();
    get_best_hashtag();
    hashtag_list.innerHTML = '';
    final_hashtag = hashtag_input.value;
}





hashtag_input.addEventListener("keyup", (e)=>{


    if(hashtag_input.value != '' && final_hashtag != hashtag_input.value){

        let req = new XMLHttpRequest();

            
        req.open("POST", "../Submition/get_hashtags.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                if(hashtag_input.value != '' && final_hashtag != hashtag_input.value){
                    hashtag_list.innerHTML = data;
                    final_hashtag = '';
                }
                
                    
                    


            }
        }
        let form_info = new FormData(search_ticket_form);
        req.send(form_info);
    }
    else{
        hashtag_list.innerHTML = '';
    }



});



show_assigned_ticket_button.onsubmit = (e)=>{
    e.preventDefault();
};


/*search_ticket_button.onclick = () =>{
    let req = new XMLHttpRequest();

    
    req.open("POST", "../Submition/get_filtered_tickets.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            ticket_box.innerHTML = "";
            
            

            console.log(data);

        }
    }
    //let form_info = new FormData(search_ticket_form);
    req.send();
}*/

setInterval(()=>{
    let req = new XMLHttpRequest();

        
    req.open("POST", "../Submition/get_filtered_tickets.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            let data = req.response;
            ticket_box.innerHTML = data;

            
                
                


        }
    }
    let form_info = new FormData(search_ticket_form);
    req.send(form_info);

}, 800);

show_assigned_ticket_button.onclick = () =>{
    if(show_assigned_ticket_button.classList.contains("pressed")){
        let req = new XMLHttpRequest();

            
        req.open("POST", "../Submition/get_all_assigned_tickets.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                ticket_box_assigned.innerHTML = data;
                show_assigned_ticket_button.classList.remove("pressed");
                show_assigned_ticket_button.value = "Hide";
                    
                    


            }
        }
        req.send();
        
    }
    else{
        show_assigned_ticket_button.classList.add("pressed");
        ticket_box_assigned.innerHTML = '';
        show_assigned_ticket_button.value = "Show";
    }
}

setInterval(()=>{
    if(!show_assigned_ticket_button.classList.contains("pressed")){
        let req = new XMLHttpRequest();

        
        req.open("POST", "../Submition/get_all_assigned_tickets.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                let data = req.response;
                if(!show_assigned_ticket_button.classList.contains("pressed"))ticket_box_assigned.innerHTML = data;
                
                


            }
        }
        req.send();
    }
}, 800);




