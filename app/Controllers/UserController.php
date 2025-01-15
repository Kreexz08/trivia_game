<?php

namespace Numaa\GamePhp\Controllers;

class UserController
{
    public function login()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['username'] = htmlspecialchars($_POST['username']);
            $_SESSION['score'] = 0;
            header('Location: /game_php/public/game.php');
            exit;
        }

        require __DIR__ . '/../../app/Views/index.view.php';
    }
}
