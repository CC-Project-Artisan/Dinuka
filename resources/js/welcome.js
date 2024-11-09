// Mobile Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const mainMenu = document.getElementById('main-menu');

menuToggle.addEventListener('click', () => {
    mainMenu.classList.toggle('open');
});

// when scrolling hide
let lastScrollTop = 0; 
const mainNav = document.getElementById('main-nav');

window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop; 

    if (currentScroll > lastScrollTop) {
        mainNav.classList.add('hide-nav');
    } else {
        mainNav.classList.remove('hide-nav');
    }
    
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});