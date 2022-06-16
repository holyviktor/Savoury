const togglers = document.querySelectorAll(".order-section-title")
const sections = document.querySelectorAll(".order-section")
togglers.forEach((toggler, index) => {
    toggler.addEventListener("click", (e) => {
        sections[index].classList.toggle("active")
    })
})
