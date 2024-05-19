let fieldEmail = document.getElementById('email');
let fieldUser = document.getElementById('user');
let fieldPassword = document.getElementById('password');
let cleanBtn = document.getElementById('clean');

cleanBtn.addEventListener('click', () => {
    console.log('dassa');
    fieldEmail.value = "";
    fieldUser.value = "";
    fieldPassword.value = "";
});

