<?php

require __DIR__ . '/../vendor/autoload.php';

use Numaa\GamePhp\Controllers\ScoreController;

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['score'])) {
    $username = $_SESSION['username'];
    $score = $_SESSION['score'];

    $scoreController = new ScoreController();
    $scoreController->saveScore($username, $score);

    // Obtener las mejores puntuaciones
    $topScores = $scoreController->getTopScores();

    // Destruir la sesión después de guardar el puntaje
    session_destroy();
} else {
    // Redirigir al inicio si no hay datos de sesión
    header('Location: index.php');
    exit;
}

require '../app/Views/end.view.php';