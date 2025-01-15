<?php

namespace Numaa\GamePhp\Controllers;

use Numaa\GamePhp\Models\Database;

class ScoreController
{
    public function saveScore($username, $score)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('INSERT INTO scores (username, score) VALUES (:username, :score)');
        $stmt->execute(['username' => $username, 'score' => $score]);
    }

    public function getTopScores($limit = 10)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT username, score FROM scores ORDER BY score DESC LIMIT :limit');
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
