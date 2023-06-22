const magicVal = document.getElementById('magic');
const usernameVal = document.getElementById('username');
const ipVal = document.getElementById('ip');
const macVal = document.getElementById('mac');
magicVal.textContent = localStorage.getItem('magicFromLocalStorage');
usernameVal.textContent = localStorage.getItem('usernameFromLocalStorage');
ipVal.textContent = localStorage.getItem('ipFromLocalStorage');
macVal.textContent = localStorage.getItem('macFromLocalStorage');
