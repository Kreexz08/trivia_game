<?php

require __DIR__ . '/../vendor/autoload.php';

use Numaa\GamePhp\Controllers\ScoreController;

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['score'])) {
    $username = $_SESSION['username'];
    $score = $_SESSION['score'];

    $scoreController = new ScoreController();
    $scoreController->saveScore($username, $score);

    $topScores = $scoreController->getTopScores();

    session_destroy();
} else {
    header('Location: index.php');
    exit;
}

require '../app/Views/end.view.php';