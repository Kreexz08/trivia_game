<?php

require __DIR__ . '/../app/Controllers/ScoreController.php';

use Numaa\GamePhp\Controllers\ScoreController;

$scoreController = new ScoreController();
$scores = $scoreController->getTopScores();

require '../app/Views/top-scores.view.php';
