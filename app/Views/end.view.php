<?php ob_start(); ?>
<div class="end-game">
    <div class="result-card">
        <div class="confetti-container" id="confetti"></div>
        <div class="profile-circle">
        </div>
        <h2 class="animate-pop">Gracias por jugar, <?= htmlspecialchars($username) ?>!</h2>
        <div class="score-display">
            <div class="score-circle">
                <span id="final-score" data-score="<?= htmlspecialchars($score) ?>">0</span>
                <small>puntos</small>
            </div>
        </div>
        <p class="message animate-fade"><?= htmlspecialchars($message) ?></p>
        <br>
        <a href="index.php" class="btn btn-primary pulse">Jugar de nuevo</a>
    </div>

    <div class="leaderboard-card">
        <h2>🏆 Ranking de mejores puntuaciones</h2>
        <div class="leaderboard">
            <?php foreach ($topScores as $index => $topScore): ?>
                <div class="leaderboard-item <?= $index < 3 ? 'top-' . ($index + 1) : '' ?>">
                    <div class="rank"><?= $index + 1 ?></div>
                    <div class="player-info">
                        <span class="username"><?= htmlspecialchars($topScore['username']) ?></span>
                        <span class="score"><?= htmlspecialchars($topScore['score']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/2.9.3/tsparticles.bundle.min.js"></script>
<script src="scripts/end.js"></script>
<?php $content = ob_get_clean(); require 'layout.php'; ?>