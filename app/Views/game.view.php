<p>Puntuación: <?= htmlspecialchars($_SESSION['score']) ?></p>
<?php if (isset($_SESSION['feedback'])): ?>
    <p><?= htmlspecialchars($_SESSION['feedback']) ?></p>
    <?php unset($_SESSION['feedback']); ?>
<?php endif; ?>

<?php if ($_SESSION['current_question'] < count($_SESSION['questions'])): ?>
    <?php $currentQuestion = $_SESSION['questions'][$_SESSION['current_question']]; ?>
    <form id="questionForm" method="POST" action="game.php">
        <p><?= htmlspecialchars($currentQuestion['texto']) ?></p>
        <?php foreach (explode('|', $currentQuestion['opciones']) as $opcion): ?>
            <label>
                <input type="radio" name="answer" value="<?= htmlspecialchars($opcion) ?>" required>
                <?= htmlspecialchars($opcion) ?>
            </label><br>
        <?php endforeach; ?>
        <input type="hidden" name="question_id" value="<?= htmlspecialchars($currentQuestion['id']) ?>">
        <button type="submit">Responder</button>
    </form>

    <p>Tiempo restante: <span id="timer">30</span> segundos</p>

    <script>
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
    </script>
<?php else: ?>
    <p>No hay más preguntas disponibles.</p>
<?php endif; ?>
<?php $content = ob_get_clean(); require 'layout.php'; ?>