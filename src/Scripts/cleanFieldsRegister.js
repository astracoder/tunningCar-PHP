let fieldEmail = document.getElementById('email');
let fieldUser = document.getElementById('user');
let fieldPassword = document.getElementById('password');
let cleanBtn = document.getElementById('cleanBtn');

cleanBtn.addEventListener('click', () => {
    console.log("All fields cleaned");
    fieldEmail.value = "";
    fieldUser.value = "";
    fieldPassword.value = "";
});