const logregBox = document.querySelector('.logreg-box');
const loginLink = document.querySelector('.si-link');
const registerLink = document.querySelector('.su-link');

registerLink.addEventListener('click', () => { 
	logregBox.classList.add('active');
});
loginLink.addEventListener('click', () => { 
	logregBox.classList.remove('active');
});