<?php

namespace Numaa\GamePhp\Controllers;

use Numaa\GamePhp\Models\Question;

class GameController
{
    public function startGame()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header('Location: index.php');
            exit;
        }

        // Reiniciar variables de sesión para un nuevo usuario
        if (!isset($_SESSION['initialized']) || $_SESSION['initialized'] !== $_SESSION['username']) {
            $questionModel = new Question();
            $_SESSION['questions'] = $questionModel->getRandomQuestions();
            $_SESSION['current_question'] = 0;
            $_SESSION['score'] = 0;
            $_SESSION['initialized'] = $_SESSION['username'];
        }

        require '../app/Views/game.view.php';
    }

    public function submitAnswer()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar y sanitizar entradas del usuario
            $userAnswer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);
            $questionId = filter_input(INPUT_POST, 'question_id', FILTER_VALIDATE_INT);

            if ($userAnswer === false || $questionId === false) {
                // Manejar error de validación
                $_SESSION['feedback'] = "Entrada inválida.";
                header('Location: game.php');
                exit;
            }

            $questionModel = new Question();
            $correctAnswer = $questionModel->getCorrectAnswer($questionId);

            if ($userAnswer === $correctAnswer) {
                $_SESSION['score'] += 10;
                $feedback = "¡Correcto!";
            } else {
                $feedback = "Incorrecto. La respuesta era: $correctAnswer.";
            }

            $_SESSION['feedback'] = $feedback;
            $_SESSION['current_question']++;

            if ($_SESSION['current_question'] >= count($_SESSION['questions'])) {
                header('Location: end.php');
            } else {
                header('Location: game.php');
            }
            exit;
        }
    }

    public function endGame()
    {
        session_start();
        $score = $_SESSION['score'];
        session_destroy();
        require '../app/Views/end.view.php';
    }
}