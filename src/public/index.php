<?php

declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';

use App\pagination\PaginatorView;
use App\request\CommandReader;
use App\validator\CommandValidation;
const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';
$commandReader = new CommandReader();
$commandValidation = new CommandValidation();

if ($commandValidation->checkCommand($commandReader->getCommand())){

}else {
    echo 'wrong command PREPARE TO DIE ';
}




try {
    $perPage = isset($_GET['per_page']) ? $_GET['per_page'] : 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $paginatorView = new PaginatorView($perPage, $page);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


