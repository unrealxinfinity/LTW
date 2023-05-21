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

let hashtag_list_elements = document.querySelectorAll("#browse form .ticket_control ul li");




function add_listener(){
    hashtag_list_elements.forEach(input =>{
        console.log(input);
        input.addEventListener("click", ()=>{
            console.log(input.innerHTML);
            hashtag_input.value = input.innerHTML;
            hashtag_list.innerHTML = '';
        });
    });
}







search_ticket_form.addEventListener('submit', (e)=>{
    e.preventDefault();
});





hashtag_input.addEventListener("keyup", (e)=>{


    if(hashtag_input.value != ''){

        let req = new XMLHttpRequest();

            
        req.open("POST", "../Actions/get_hashtags.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                const data = req.response;
                if(hashtag_input.value != ''){
                    hashtag_list.innerHTML = data;
                    hashtag_list_elements = document.querySelectorAll("#browse form .ticket_control ul li");
                    add_listener();
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



show_assigned_ticket_button.addEventListener('submit', (e)=>{
    e.preventDefault();
});







setInterval(()=>{
    let req = new XMLHttpRequest();

        
    req.open("POST", "../Actions/get_filtered_tickets.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            const data = req.response;
            ticket_box.innerHTML = data;

            
                
                


        }
    }
    let form_info = new FormData(search_ticket_form);
    req.send(form_info);

}, 800);

show_assigned_ticket_button.addEventListener('click', () =>{
    if(show_assigned_ticket_button.classList.contains("pressed")){
        let req = new XMLHttpRequest();

            
        req.open("POST", "../Actions/get_all_assigned_tickets.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                const data = req.response;
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
});

setInterval(()=>{
    if(!show_assigned_ticket_button.classList.contains("pressed")){
        let req = new XMLHttpRequest();

        
        req.open("POST", "../Actions/get_all_assigned_tickets.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                const data = req.response;
                if(!show_assigned_ticket_button.classList.contains("pressed"))ticket_box_assigned.innerHTML = data;
                
                


            }
        }
        req.send();
    }
}, 800);



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


function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

const FAQ_button = document.getElementById('FAQsubmit');
const FAQForm = document.querySelector('.formFlex form');
const popupHTML = document.getElementById('popMessage');
const faqs_pos = document.getElementById('FAQBlock');
const identifier='<div class="popup"><span class="popuptext" id="myPopup">Question already exists!</span></div>';
questions = document.getElementsByClassName('collapsible');
delete_FAQ_buttons = document.getElementsByClassName('material-icons');

FAQForm.addEventListener('submit', (e)=>{
    e.preventDefault();
});
FAQ_button.addEventListener('click', ()=>{
    let req = new XMLHttpRequest();
    req.open("POST","../Actions/insert_faq.php",true);
    let form_info = new FormData(FAQForm);
    req.onload = ()=>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            const data = req.response;
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
});

function DeleteFAQ(index){
    return function(event) {
        event.stopPropagation(); 
        let req = new XMLHttpRequest();

       req.open("POST","../Actions/delete_faq.php",true);


       req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var questionwExtraLetters = questions[index].textContent;
        var question=questionwExtraLetters.slice(0,-6);
        req.onload = ()=>{
            const data = req.response;
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                faqs_pos.innerHTML=data;
                delete_FAQ_buttons = document.getElementsByClassName('material-icons');
                questions = document.getElementsByClassName('collapsible');
                on_click_collapsible();
                detect_buttons();
            }
       
        };


        req.send(encodeForAjax({question: question}));
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
