<p>Gracias por jugar, <?= htmlspecialchars($username) ?>!</p>
<p>Puntuación total: <?= htmlspecialchars($score) ?></p>
<a href="index.php">Jugar de nuevo</a>

<h2>Ranking de Mejores Puntuaciones</h2>
<ol>
    <?php foreach ($topScores as $topScore): ?>
        <li><?= htmlspecialchars($topScore['username']) ?>: <?= htmlspecialchars($topScore['score']) ?></li>
    <?php endforeach; ?>
</ol>
<?php $content = ob_get_clean(); require 'layout.php'; ?>