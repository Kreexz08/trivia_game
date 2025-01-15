<?php ob_start(); ?>
<div class="score-board">
    <p>Puntuación: <?= htmlspecialchars($_SESSION['score']) ?></p>
</div>
<?php if (isset($_SESSION['feedback'])): ?>
    <div class="feedback">
        <p><?= htmlspecialchars($_SESSION['feedback']) ?></p>
    </div>
    <?php unset($_SESSION['feedback']); ?>
<?php endif; ?>

<?php if ($_SESSION['current_question'] < count($_SESSION['questions'])): ?>
    <?php $currentQuestion = $_SESSION['questions'][$_SESSION['current_question']]; ?>
    <form id="questionForm" method="POST" action="game.php">
        <div class="question">
            <p><?= htmlspecialchars($currentQuestion['texto']) ?></p>
            <?php foreach (explode('|', $currentQuestion['opciones']) as $opcion): ?>
                <label class="option">
                    <input type="radio" name="answer" value="<?= htmlspecialchars($opcion) ?>" required>
                    <?= htmlspecialchars($opcion) ?>
                </label><br>
            <?php endforeach; ?>
        </div>
        <input type="hidden" name="question_id" value="<?= htmlspecialchars($currentQuestion['id']) ?>">
        <button type="submit">Responder</button>
    </form>

    <div class="timer">
        <p>Tiempo restante: <span id="timer">30</span> segundos</p>
    </div>
<?php else: ?>
    <p>No hay más preguntas disponibles.</p>
<?php endif; ?>
<script src="scripts/game.js"></script>
<?php $content = ob_get_clean(); require 'layout.php'; ?>