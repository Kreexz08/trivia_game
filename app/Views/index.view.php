<?php ob_start(); ?>
<div class="start-game">
    <form method="POST" action="index.php">
        <label for="username">Ingresa tu nombre:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Comenzar</button>
    </form>
</div>
<script src="scripts/index.js"></script>
<?php $content = ob_get_clean(); require 'layout.php'; ?>