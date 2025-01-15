<?php

namespace Numaa\GamePhp\Models;

use PDO;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (!self::$instance) {
            require_once __DIR__ . '/../../loadEnv.php'; 
            loadEnv(__DIR__ . '/../../.env'); 

            $dsn = 'pgsql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'] . ';';
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];

            self::$instance = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }

        return self::$instance;
    }
}