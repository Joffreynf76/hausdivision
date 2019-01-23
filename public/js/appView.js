const modalRegister = document.getElementById('modalRegister');
const registerBtn = document.getElementById('registerBtn');
const modalRegisterClose = document.getElementById('cancelRegBtn');

const modalSignin = document.getElementById('modalSignin');
const signinBtn = document.getElementById('signinBtn');
const modalSigninClose = document.getElementById('cancelSigninBtn');

registerBtn.addEventListener('click', () => {
    modalRegister.style.display = 'flex';
});

modalRegisterClose.addEventListener('click', () => {
    modalRegister.style.display = 'none';
});

signinBtn.addEventListener('click', () => {
    modalSignin.style.display = 'flex';
});

modalSigninClose.addEventListener('click', () => {
    modalSignin.style.display = 'none';
});
