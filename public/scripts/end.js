document.addEventListener('DOMContentLoaded', () => {
    // Animación del puntaje final
    const finalScoreElement = document.getElementById('final-score');
    const finalScore = parseInt(finalScoreElement.getAttribute('data-score'));
    let currentScore = 0;

    const scoreAnimation = setInterval(() => {
        if (currentScore < finalScore) {
            currentScore += Math.ceil(finalScore / 50);
            if (currentScore > finalScore) currentScore = finalScore;
            finalScoreElement.textContent = currentScore;
        } else {
            clearInterval(scoreAnimation);
            if (finalScore >= 80) {
                initConfetti();
            }
        }
    }, 40);

    // Confetti para puntajes altos
    function initConfetti() {
        tsParticles.load("confetti", {
            particles: {
                number: {
                    value: 100
                },
                color: {
                    value: ["#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#FF00FF"]
                },
                shape: {
                    type: "circle"
                },
                size: {
                    value: 6,
                    random: true
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: "bottom",
                    straight: false
                }
            }
        });
    }
});