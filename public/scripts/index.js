document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        const usernameInput = document.getElementById('username');
        if (usernameInput.value.trim() === '') {
            event.preventDefault();
            alert('Por favor, ingresa tu nombre.');
        }
    });
});