document.addEventListener('DOMContentLoaded', () => {
    const timerElement = document.getElementById('timer');
    const progressRing = document.querySelector('.progress-ring-circle');
    const radius = progressRing.r.baseVal.value;
    const circumference = radius * 2 * Math.PI;
    let timeLeft = 30;

    progressRing.style.strokeDasharray = `${circumference} ${circumference}`;
    progressRing.style.strokeDashoffset = 0;

    function setProgress(percent) {
        const offset = circumference - (percent / 100 * circumference);
        progressRing.style.strokeDashoffset = offset;
    }

    const countdown = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(countdown);
            document.getElementById('questionForm').submit();
        } else {
            const percent = (timeLeft / 30) * 100;
            setProgress(percent);
            timerElement.textContent = timeLeft;

            if (timeLeft <= 5) {
                progressRing.style.stroke = '#f44336';
                timerElement.classList.add('warning');
            }
            
            timeLeft--;
        }
    }, 1000);

    const options = document.querySelectorAll('.option-card');
    options.forEach((option, index) => {
        option.style.animationDelay = `${index * 0.1}s`;
        option.classList.add('animate__animated', 'animate__fadeInUp');
    });

    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('change', () => {
            options.forEach(opt => opt.classList.remove('selected'));
            input.closest('.option-card').classList.add('selected');
        });
    });
});