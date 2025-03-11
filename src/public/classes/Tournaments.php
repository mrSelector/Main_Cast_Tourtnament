<?php

namespace MainCastTournament\App\classes;

use mysqli;

class Tournaments
{
    public function fetchAll()
    {
        $dbConnection = DataBase::getInstance()->getConnection();

        $stmt = $dbConnection->query("SELECT * FROM `tournaments`");
        if ($stmt === false) {
            throw new \Exception('Помилка отримання турнірів');
        }
        $result = $stmt->fetch_all(MYSQLI_ASSOC);

        return $result;
 }
}