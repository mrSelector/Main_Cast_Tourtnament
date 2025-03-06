<?php

namespace MainCastTournament\App\classes;

use mysqli;

class DataBase
{
    private static $instance;
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('mysql', 'default', 'secret','default');
        if ($this->mysqli->connect_errno) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->mysqli;
    }
}