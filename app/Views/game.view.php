<?php ob_start(); ?>
<div class="game-container">
    <div class="game-header">
        <div class="score-board">
            <div class="score">
                <span class="label">Puntuación</span>
                <span class="value"><?= htmlspecialchars($_SESSION['score']) ?></span>
            </div>
            <div class="timer">
                <div class="progress-ring">
                    <svg>
                        <circle class="progress-ring-circle" cx="30" cy="30" r="25"></circle>
                    </svg>
                    <span id="timer">30</span>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['feedback'])): ?>
        <div class="feedback <?= strpos($_SESSION['feedback'], '¡Correcto!') !== false ? 'correct' : 'incorrect' ?>">
            <div class="feedback-icon">
                <?= strpos($_SESSION['feedback'], '¡Correcto!') !== false ? '✓' : '✗' ?>
            </div>
            <p><?= htmlspecialchars($_SESSION['feedback']) ?></p>
        </div>
        <?php unset($_SESSION['feedback']); ?>
    <?php endif; ?>

    <?php if ($_SESSION['current_question'] < count($_SESSION['questions'])): ?>
        <?php $currentQuestion = $_SESSION['questions'][$_SESSION['current_question']]; ?>
        <div class="question-card">
            <div class="question-counter">
                Pregunta <?= $_SESSION['current_question'] + 1 ?>/<?= count($_SESSION['questions']) ?>
            </div>
            <form id="questionForm" method="POST" action="game.php">
                <div class="question">
                    <h3><?= htmlspecialchars($currentQuestion['texto']) ?></h3>
                    <div class="options-grid">
                        <?php foreach (explode('|', $currentQuestion['opciones']) as $index => $opcion): ?>
                            <label class="option-card">
                                <input type="radio" name="answer" value="<?= htmlspecialchars($opcion) ?>" required>
                                <span class="option-text">
                                    <span class="option-letter"><?= chr(65 + $index) ?></span>
                                    <?= htmlspecialchars($opcion) ?>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <input type="hidden" name="question_id" value="<?= htmlspecialchars($currentQuestion['id']) ?>">
                <button type="submit" class="btn btn-primary">Responder</button>
            </form>
        </div>
    <?php else: ?>
        <div class="no-questions">
            <p>No hay más preguntas disponibles.</p>
            <a href="index.php" class="btn btn-primary">Volver al inicio</a>
        </div>
    <?php endif; ?>
</div>
<script src="scripts/game.js"></script>
<?php $content = ob_get_clean(); require 'layout.php'; ?>