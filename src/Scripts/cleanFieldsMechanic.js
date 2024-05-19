let fieldFirstName = document.getElementById('firstName');
let fieldLastName = document.getElementById('lastName');
let fieldAge = document.getElementById('age');
let fieldEmailMechanic = document.getElementById('emailMechanic');
let cleanBtn = document.getElementById('cleanBtn');

cleanBtn.addEventListener('click', () => {
    fieldFirstName.value = "";
    fieldLastName.value = "";
    fieldAge.value = "";
    fieldEmailMechanic.value = "";
});

