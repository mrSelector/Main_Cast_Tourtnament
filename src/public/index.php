<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';

use MainCastTournament\App\classes\Tournaments;
// Беремо категорію з суперглобального масиву GET
$category = $_GET["category"] ?? 'all';

// Створюємо екземпляр класу Tournaments та передаємо йому категорію
$trn = new Tournaments($category);

// Викликаємо метод який повертає турніри
$res = $trn->getTournaments();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Categories</title>
    <style>
        .category-item-tournament {
            list-style: none;
            display: inline-block;
            margin: 10px;
        }
        .tournament-nav-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .tournament-logo {
            width: 50px;
            height: 50px;
            display: inline-block;
            background-color: #ccc;
        }
    </style>
</head>
<body>

<div class="row">
    <div class="col-12">
        <ul class="category-items-tournament">
            <li id="category-item-tournament-all" class="category-item-tournament category-item-tournament-current">
                <a href="?category=all" data-category="all" class="category-items-link category-tournament-link" data-posts="-1">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo tournament-logo-all"></span>
                        <span class="tournament-logo-name">All</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament">
                <a href="?category=CS:GO" data-category="csgo-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/09/csgo-1.svg');"></span>
                        <span class="tournament-logo-name">CS:GO</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament empty-league">
                <a href="?category=Dota2" data-category="dota2-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/09/dota-1.png');"></span>
                        <span class="tournament-logo-name">Dota2</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament">
                <a href="?category=Valorant" data-category="valorant-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/03/valorant_logo.png');"></span>
                        <span class="tournament-logo-name">Valorant</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<h2>Список турнірів:</h2>
<ul>
    <?php foreach ($res as $discipline): ?>
        <li>
            <strong><?= htmlspecialchars($discipline['name']) ?></strong>:
            <?= htmlspecialchars($discipline['description']) ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
