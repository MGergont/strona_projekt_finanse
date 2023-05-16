const burger = document.querySelector("div.burger");
const nav = document.querySelector("section.fixed");
const category = document.querySelectorAll(".category");

const modal = document.querySelector(".modal");
const modalP = document.querySelector(".modal p");
const modalI = document.querySelector(".modal i.modal_icon");
const modalX = document.querySelector(".modal .fa-xmark");
const inputModal = document.querySelector(".modal form input");

// wysuwanie się menu
burger.addEventListener('click', () => {
    nav.classList.toggle("on");
})


// co się klika w wydatkach
category.forEach(item => item.addEventListener('click', () => {
    const p = item.querySelector("p");
    const i = item.querySelector("i");

    modal.style.display = "flex";
    modalP.textContent = p.textContent;
    modalI.className = "modal_icon" + " " + i.className;

    burger.style.display = "none";

    inputModal.name = p.id;

}))

// zamknięcie modalu w wydatkach
modalX.addEventListener('click', () => {

    modal.style.display = "none";
    modalP.textContent = "";
    modalI.className = "modal_icon";
    burger.style.display = "block"

    inputModal.name = "";
})