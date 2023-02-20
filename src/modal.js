const updateBtns = document.querySelectorAll(".updateButton");
const modal = document.querySelector(".modalWrapper");
const closeModal = document.querySelector("#closeModal");

export function modalFunction () {
    updateBtns.forEach( e => {
        e.addEventListener("click", () => {
            modal.style.display = "block";
            sessionStorage.setItem("id", e.dataset.id);
        })
    })
    
    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
        sessionStorage.removeItem("id");
    })
}
