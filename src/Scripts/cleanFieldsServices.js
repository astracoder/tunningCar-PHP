let fieldTitle = document.getElementById('title');
let fieldDescription = document.getElementById('description');
let fieldNameClient = document.getElementById('nameClient');
let fieldBrandCarClient = document.getElementById('brandCarClient');
let fieldModelCarClient = document.getElementById('modelCarClient');
let fieldPlateCarClient = document.getElementById('plateCarClient');
let cleanBtn = document.getElementById('cleanBtn');

cleanBtn.addEventListener('click', () => {
    fieldTitle.value = "";
    fieldDescription.value = "";
    fieldNameClient.value = "";
    fieldBrandCarClient.value = "";
    fieldModelCarClient.value = "";
    fieldPlateCarClient.value = "";
});

