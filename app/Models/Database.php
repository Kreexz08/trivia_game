<?php

namespace Numaa\GamePhp\Models;

use PDO;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (!self::$instance) {
            $dsn = 'pgsql:host=localhost;port=5432;dbname=trivia;';
            $user = 'postgres';
            $password = '12345678';

            self::$instance = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }

        return self::$instance;
    }
}