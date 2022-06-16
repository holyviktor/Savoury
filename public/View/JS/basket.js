
function createVirtualForm(form) {
    const id = form.value
    const value = form.input
    value.addEventListener("input", (e)=>{
        e.target.value = Math.abs(parseInt(e.target.value))
    })
    const token = form._token
    form.addEventListener("keypress", (e) => {
        if(e.key === "Enter") {
            e.preventDefault()
            if(!value.value | value.value === "0") {
                value.value = "1"
            }
            const virtualForm = document.createElement("form")
            virtualForm.setAttribute("action", "./basket")
            virtualForm.setAttribute("method", "POST")
            virtualForm.setAttribute("style", "display:none;")
            document.body.appendChild(virtualForm)
            virtualForm.append(id.cloneNode(), value.cloneNode(), token.cloneNode())
            virtualForm.submit()
        }
    })
}

function createVirtualForms() {
    const forms = document.querySelectorAll(".basket-order-counter-form")
    if(!forms) {
        return
    }
    forms.forEach(form => createVirtualForm(form))
}

createVirtualForms()
