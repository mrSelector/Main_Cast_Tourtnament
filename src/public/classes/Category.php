<?php

namespace MainCastTournament\App\classes;


class Category
{
    public static function fetchAll()
    {
        // Підключаємося до бази даних
        $db = DataBase::getInstance();

        // Беремо з бази даних усі категорії
        $result = $db->getConnection()->query("SELECT * FROM category");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}