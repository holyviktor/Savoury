async function writeClient() {
    let form = document.forms.ordering;
    let phone_number = form.elements.phone;

    const [client, count] = await fetch('./api/ordering/' + phone_number.value).then(r => r.json())
    const price = await fetch('./api/ordering/').then(r => r.json())
    const name = document.getElementsByName("name")
    const street = document.getElementsByName("street")
    const house = document.getElementsByName("house")
    const flat = document.getElementsByName("flat")
    const priceDisplay = document.getElementById("2")

    if (count>=3){
        priceDisplay.innerText = (price*0.95).toString()
    }

    name[0].value = client["name"];
    street[0].value = client["street"];
    house[0].value = client["house"];
    flat[0].value = client["flat"];
}

