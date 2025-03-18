<?php

namespace MainCastTournament\App\classes;

use mysqli;

// Клас для підключення до бази даних
class Database
{
    private static $instance;
    private $mysqli;

    // Метод для підключення до БД
    public function __construct()
    {
        $this->mysqli = new mysqli("mysql", "default", "secret", "default");
        if ($this->mysqli->connect_errno) {
            die("Connect failed: " .$this->mysqli->connect_error);
        }
    }
    // Метод для створення об'єкту з підключенням до БД
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    // Метод який повертає підключення до БД
    public function getConnection(){
        return $this->mysqli;
    }
}