//HEADER TOGGLE

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

const send_ticket_form = document.querySelector(".ticket_container form");

const button = document.getElementById("send_ticket_button");

const text_message = document.getElementById("msg");

const ticket_box = document.querySelector(".ticket_history");

const show_history = document.getElementById("show_tickets");



send_ticket_form.addEventListener('submit', (e)=>{
    e.preventDefault();
});
show_history.addEventListener('submit', (e)=>{
    e.preventDefault();
});

button.addEventListener('click', () =>{
    let req = new XMLHttpRequest();
    
    req.open("POST", "../Actions/send_ticket.php", true);

    req.onload = () =>{
        if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
            const data = req.response;
            text_message.value = '';
            if(!show_history.classList.contains("pressed")) ticket_box.innerHTML = data;
            

        }
    }

    let form_info = new FormData(send_ticket_form);
    req.send(form_info)
});


show_history.addEventListener('click', () =>{
    if(show_history.classList.contains("pressed")){
        let req = new XMLHttpRequest();
    
        req.open("GET", "../Actions/get_ticket.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                const data = req.response;
                ticket_box.innerHTML = data;
                show_history.classList.remove("pressed");
                show_history.value = "Hide";
            


            }
        }

        req.send();
    }
    else{
        show_history.classList.add("pressed");
        ticket_box.innerHTML = '';
        show_history.value = "Show";


        
    }
});

//Adds click action to the FAQ question boxes
let faqs = document.getElementsByClassName("collapsible");
for (var i = 0; i < faqs.length; i++) {
    faqs[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
        content.style.maxHeight = content.scrollHeight + "px";
        content.scrollIntoView({behaviour:"smooth"});
    });
  }

setInterval(() =>{
    if(!show_history.classList.contains("pressed")){
        let req = new XMLHttpRequest();
        
        req.open("GET", "../Actions/get_ticket.php", true);

        req.onload = () =>{
            if(req.readyState === XMLHttpRequest.DONE && req.status === 200){
                const data = req.response;
                if(!show_history.classList.contains("pressed"))ticket_box.innerHTML = data;
                


            }
        }

        req.send();
    }
}, 500);


