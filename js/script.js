const burger = document.querySelector("div.burger");
const nav = document.querySelector("section.fixed");

// wysuwanie się menu
burger.addEventListener('click', () => {
    nav.classList.toggle("on");
})