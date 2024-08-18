const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// Open side menu
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

// Close side menu
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

// Toggle theme
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');
    const spans = themeToggler.querySelectorAll('span');
    spans[0].classList.toggle('active');
    spans[1].classList.toggle('active');
});
