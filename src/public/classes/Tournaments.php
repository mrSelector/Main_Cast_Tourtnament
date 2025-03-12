<?php

namespace MainCastTournament\App\classes;

use mysqli;

class Tournaments
{
    private $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getTournaments(){
        if ($this->category !== 'all'){
            return $this->fetchByCategory();
        }
        else {return $this->fetchAll();}
        }
    private function fetchAll()
    {
        $dbConnection = DataBase::getInstance()->getConnection();

        $stmt = $dbConnection->query("SELECT * FROM `tournaments`");
        if ($stmt === false) {
            throw new \Exception('Помилка підготовки запиту до бази даних');
        }
        $result = $stmt->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    private function fetchByCategory()
    {
        $dbConnection = DataBase::getInstance()->getConnection();
        $stmt = $dbConnection->prepare("SELECT * FROM `tournaments` WHERE `name` = ?");
        if ($stmt === false) {
            throw new \Exception('Помилка підготовки запиту до бази даних');
        }
        $stmt->bind_param("s", $this->category);
        if (!$stmt->execute()) {
            throw new \Exception('Помилка отримання турнірів');}
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}