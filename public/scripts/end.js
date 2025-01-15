document.addEventListener('DOMContentLoaded', () => {
    const finalScoreElement = document.getElementById('final-score');
    let finalScore = parseInt(finalScoreElement.textContent);
    finalScoreElement.textContent = '0';
    let currentScore = 0;

    const scoreInterval = setInterval(() => {
        if (currentScore < finalScore) {
            currentScore++;
            finalScoreElement.textContent = currentScore;
        } else {
            clearInterval(scoreInterval);
        }
    }, 50);

    // Animación de lista de mejores puntuaciones
    const topScoresList = document.getElementById('top-scores-list');
    const listItems = topScoresList.querySelectorAll('li');
    listItems.forEach((item, index) => {
        item.style.opacity = '0';
        setTimeout(() => {
            item.style.transition = 'opacity 0.5s';
            item.style.opacity = '1';
        }, index * 200);
    });
});