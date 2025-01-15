document.addEventListener('DOMContentLoaded', () => {
    let timeLeft = 30;
    const timerElement = document.getElementById('timer');
    const questionForm = document.getElementById('questionForm');

    const countdown = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(countdown);
            questionForm.submit();
        } else {
            timerElement.textContent = timeLeft;
            timeLeft--;
        }
    }, 1000);
});
