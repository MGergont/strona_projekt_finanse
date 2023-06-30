const category = document.querySelectorAll(".category");
const modal = document.querySelector(".modal");
const wModal = document.querySelector(".wrap_modal");
const modalP = document.querySelector(".modal p");
const modalI = document.querySelector(".modal i.modal_icon");
const modalX = document.querySelector(".modal .fa-xmark");
const inputModal = document.querySelector(".modal form input");

// co się klika w wydatkach
category.forEach(item => item.addEventListener('click', () => {
    const p = item.querySelector("p");
    const i = item.querySelector("i");

    modal.style.display = "flex";
    modalP.textContent = p.textContent;
    modalI.className = "modal_icon" + " " + i.className;

    wModal.style.width = "100%";
    wModal.style.height = "100vh";

    burger.style.display = "none";

    inputModal.name = p.id;

}))

// zamknięcie modalu w wydatkach
modalX.addEventListener('click', () => {

    modal.style.display = "none";
    modalP.textContent = "";
    modalI.className = "modal_icon";
    burger.style.display = "block"

    wModal.style.width = "0%";
    wModal.style.height = "0vh";

    inputModal.name = "";
})