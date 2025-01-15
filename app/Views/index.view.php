<?php ob_start(); ?>
<div class="start-game">
    <div class="welcome-card">
        <h2>Bienvenido a Trivia Games!</h2>
        <p class="intro-text">Preparate para poner a prueba tus conocimientos</p>

        <form method="POST" action="index.php" class="login-form">
            <div class="input-group">
                <input type="text" id="username" name="username" required placeholder="Ingresa tu usuario">
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="button-text">Comenzar desafio</span>
                <span class="button-icon">→</span>
            </button>
        </form>
    </div>
</div>
<script src="scripts/index.js"></script>
<?php $content = ob_get_clean();
require 'layout.php'; ?>