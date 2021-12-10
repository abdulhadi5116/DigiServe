<?php 

$database = getConfig('database');
$host = $database['host'];
$port = $database['port'];
$db = $database['database'];

try {
    $connection = new PDO("mysql:host=$host:$port;dbname=$db", $database['username'], $database['password']);
} catch (PDOException $e) {
    echo 'Failed Connectiong to Database. Caused by : ' . $e->getMessage() . PHP_EOL;
}
