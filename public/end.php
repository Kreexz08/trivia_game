<?php
require __DIR__ . '/../vendor/autoload.php';

use Numaa\GamePhp\Controllers\GameController;
use Numaa\GamePhp\Controllers\ScoreController;

$gameController = new GameController();
$gameController->endGame();