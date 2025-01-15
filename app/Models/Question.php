<?php

namespace Numaa\GamePhp\Models;

use PDO;

class Question
{
    public function getRandomQuestions($limit = 5)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM preguntas ORDER BY RANDOM() LIMIT :limit');
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCorrectAnswer($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT correcta FROM preguntas WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn();
    }
}
