<?php

namespace Numaa\GamePhp\Models;

class User
{
    public $username;

    public function __construct($username)
    {
        $this->username = htmlspecialchars($username);
    }

    public function getUsername()
    {
        return $this->username;
    }
}
