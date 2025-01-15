<?php ob_start(); ?>
<form method="POST" action="index.php">
    <label for="username">Ingresa tu nombre:</label>
    <input type="text" id="username" name="username" required>
    <button type="submit">Comenzar</button>
</form>
<?php $content = ob_get_clean(); require 'layout.php'; ?>
