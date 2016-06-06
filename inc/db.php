<?php
/**
 * http://phpfaq.ru/pdo#connect
 */

$dbHost = 'localhost';
$dbName = 'application';
$dbUser = 'root';
$dbPass = 'root';

$dsn = 'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8';

$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$pdo = new PDO($dsn, $dbUser, $dbPass, $opt);

return $pdo;
