<?php 
global $pdo;

$host = 'localhost';
$dbName = 'koze';
$username = 'root';
$password = 'root';

if (!isset($pdo)) $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

?>