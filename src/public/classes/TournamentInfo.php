<?php
//  Створити клас для отримання інформації про турнір
//  Включаючи Логотип, назву турніру, опис, актуальні матчі та команди які беруть участь в турнірі.
//
//  Назва турніру та опис турніру (в текстовому форматі)
//
//  Початок та кінець турніру (тип даних dd/mm/yyyy)
//
//  Призовий фонд має бути в текстовому форматі з розділенням на тисячу до прикладу: 100,000,000$ (string)
//
//  Назва турніру текстом (string)
//
//  Формат турніру - текстове поле з enum для вибору можливих турнірів.
//
//  Учасники турніру : вивести список команд

namespace MainCastTournament\App\classes;


class TournamentInfo
{
    private $tournamentName;

    public function __construct($tournamentName){

        $this->tournamentName = $tournamentName;

        $this->cleanInputFromXSS();
    }

    private function cleanInputFromXSS(){
        $this->tournamentName = htmlspecialchars(strip_tags($this->tournamentName));
    }

    // Метод який повертає інформацію про турнір по назві турніру
    public function getTournamentsInfo()
    {
        // Підкючаємося до бази даних та робимо виборку

        $dbConnection = DataBase::getInstance()->getConnection();
        $stmt = $dbConnection->prepare("SELECT name, description, logo_path,DATE_FORMAT(start_date, '%d/%m/%Y') start_date,DATE_FORMAT(end_date, '%d/%m/%Y') end_date, prize_pool, format FROM tournaments_info WHERE name = ?");
        if ($stmt === false) {
            throw new \Exception("Помилка підготовки запиту до БД");
        }
        $stmt->bind_param("s", $this->tournamentName);

        if (!$stmt->execute()) {
            throw new \Exception('Помлика отримання інформаціі про турнір');
        }
        $result = $stmt->get_result()->fetch_assoc();
        if (!$result) {
            throw new \Exception("Турнір з таким ім'ям не знайдено");
        }
        //форматуємо призовий фонд
        $result['prize_pool'] = number_format($result['prize_pool'], 0, '.', ','). "$";
        return $result;
    }
    // Метод що повертає команди з БД
    public function getTeams()
    {
        // Підкючаємося до бази даних та робимо виборку команд по назві турніру
        $dbConnection = DataBase::getInstance()->getConnection();
        $stmt = $dbConnection->prepare("SELECT teams FROM tournaments_info WHERE name = ?");
        if ($stmt === false) {
            throw new \Exception('Помилка підготовки запиту до бази даних');
        }
        $stmt->bind_param("s", $this->tournamentName);
        if (!$stmt->execute()) {
            throw new \Exception('Помилка отримання списку команд');
        }
        $result = $stmt->get_result()->fetch_assoc();
        // Декодуємо JSON у масив
        if ($result) {
            return json_decode($result['teams'], true);
        } else {
            return [];
        }

    }
    // Метод який повертає матчі по назві турніру
    public function getMatches()
    {
        // Підкючаємося до бази даних та робимо виборку матчів по назві турніру
        $dbConnection = DataBase::getInstance()->getConnection();
        $stmt = $dbConnection->prepare("SELECT team1, team2, DATE_FORMAT(match_date, '%d/%m/%Y')match_date FROM matches WHERE tournament_name = ?");
        if ($stmt === false) {
            throw new \Exception('Помилка підготовки запиту до бази даних');
        }
        $stmt->bind_param("s", $this->tournamentName);
        if (!$stmt->execute()) {
            throw new \Exception('Помилка отримання матчів');
        }
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

}