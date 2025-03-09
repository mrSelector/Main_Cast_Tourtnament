<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';

use MainCastTournament\App\classes\Category;

$category = new Category();
print_r($category->fetchAll());
print_r(__DIR__);
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
                <a href="?" data-category="all" class="category-items-link category-tournament-link" data-posts="-1">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo tournament-logo-all"></span>
                        <span class="tournament-logo-name">All</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament">
                <a href="?grouptournaments=csgo-ua" data-category="csgo-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/09/csgo-1.svg');"></span>
                        <span class="tournament-logo-name">CS:GO</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament empty-league">
                <a href="?grouptournaments=dota2-ua" data-category="dota2-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/09/dota-1.png');"></span>
                        <span class="tournament-logo-name">Dota2</span>
                    </div>
                </a>
            </li>

            <li class="category-item-tournament">
                <a href="?grouptournaments=valorant-ua" data-category="valorant-ua" data-posts="-1" class="category-items-link category-tournament-link">
                    <div class="tournament-nav-box">
                        <span class="tournament-logo" style="background-image: url('https://maincast.com/wp-content/uploads/2021/03/valorant_logo.png');"></span>
                        <span class="tournament-logo-name">Valorant</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

</body>
</html>
