const expander = document.querySelectorAll(".btn-menu, .menu-closer")
const collapses = document.querySelector(".navbar-collapse")


expander.forEach(button => {
    button.addEventListener("click", () => {
        collapses.classList.toggle("active")
    })
})

const inputs = document.querySelectorAll(".count-input")

inputs.forEach(input => {
    input.addEventListener("change", (e) => {
        const value = parseInt(e.target.value)
        if(value < 0) {
            input.value = Math.abs(value)
        }
        // console.log(document.cookie)
    })
})

document.forms.counterItem?.addEventListener("keypress", (e) => {
        // console.log(e)
        e.key === "Enter" && e.preventDefault()
    }
)
