<?php ob_start(); ?>
<div class="end-game">
    <h2>¡Gracias por jugar, <?= htmlspecialchars($username) ?>!</h2>
    <p>Puntuación total: <span id="final-score"><?= htmlspecialchars($score) ?></span></p>
    <p><?= htmlspecialchars($message) ?></p>
    <a href="index.php" class="btn">Jugar de nuevo</a>

    <h2>Ranking de Mejores Puntuaciones</h2>
    <ol id="top-scores-list">
        <?php foreach ($topScores as $topScore): ?>
            <li><?= htmlspecialchars($topScore['username']) ?>: <?= htmlspecialchars($topScore['score']) ?></li>
        <?php endforeach; ?>
    </ol>
</div>
<script src="scripts/end.js"></script>
<?php $content = ob_get_clean(); require 'layout.php'; ?>