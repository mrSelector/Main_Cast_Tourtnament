<?php

namespace MainCastTournament\App\tests;

use MainCastTournament\App\classes\DataBase;
use PHPUnit\Framework\TestCase;

class DataBaseTest extends TestCase
{
    private $db;
    protected function setUp(): void
    {
        $this->db = new DataBase();
    }
    public function testDatabaseConnection(){
        $this->assertNotNull($this->db->getConnection());
    }

    public function  testRetrieve(){
        $category = "Valorant";
        $tournament = "VALORANT Champions Tour 2024EMEA League - Stage 1";

        $stmt = $this->db->getConnection()->prepare("SELECT * FROM `tournaments` WHERE `name` = ?");
        $stmt->bind_param("s", $category);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $this->assertNotEmpty($category,$row["name"]);
        $this->assertNotEmpty($tournament,$row["description"]);
    }
}
