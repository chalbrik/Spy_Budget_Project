<?php

//custom composer scripts - to jest plik który jest wykonywany przez rozszerzenie composer

$driver = 'mysql';

$config = http_build_query(data: [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'budget_app'
], arg_separator: ';');

$dsn = "{$driver}:{$config}";
$username = 'root';
$password = ''; //pamietaj żeby potem ustawić tu hasło kiedy bedziemy przekazywać to na publiczny serwer

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Unable to connect to database");
}


echo "Connected to database";
