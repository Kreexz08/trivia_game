<?php

require __DIR__ . '/../vendor/autoload.php';

use Numaa\GamePhp\Controllers\UserController;

$controller = new UserController();
$controller->login();
