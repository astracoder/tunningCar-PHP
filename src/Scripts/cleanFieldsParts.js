let fieldPartBrand = document.getElementById('partBrand');
let fieldPartModel = document.getElementById('partModel');
let fieldFabricationDate = document.getElementById('fabricationDate');
let cleanBtn = document.getElementById('cleanBtn');

cleanBtn.addEventListener('click', () => {
    console.log("All fields cleaned");
    fieldPartBrand.value = "";
    fieldPartModel.value = "";
    fieldFabricationDate.value = "";
})