<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';

use MainCastTournament\App\classes\Category;

$category = new Category();
print_r($category->fetchAll());
print_r(__DIR__);