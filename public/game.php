<?php

require __DIR__ . '/../vendor/autoload.php';

use Numaa\GamePhp\Controllers\GameController;

$controller = new GameController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->submitAnswer();
} else {
    $controller->startGame();
}
