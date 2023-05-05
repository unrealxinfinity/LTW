//HEADER TOGGLE

let menu = document.getElementById('menu');

menu.addEventListener('click', () => {
    document.querySelector('body').classList.toggle('toggle-header');
})


let nav_links = document.querySelectorAll('header nav ul li a');

let Section = document.querySelectorAll('section');
window.addEventListener('scroll', () => {
    var bar = document.querySelector('#menu');
    var checkbox = document.querySelector('.bar');
    bar.classList.toggle("sticky", window.scrollY > 0);
    checkbox.classList.toggle("sticky", window.scrollY > 0);
    console.log(checkbox);
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

