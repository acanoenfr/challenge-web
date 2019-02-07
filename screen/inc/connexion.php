<?php 

$serv="localhost";
$user="root";
$pass="root";
$db="broadcaster";

$pdo = new PDO("mysql:host=$serv;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>