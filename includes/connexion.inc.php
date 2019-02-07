<?php
$serv="localhost"; 
$user="root"; 
$pass=""; 
$db="challenge"; 
try{
  $bdd = new PDO("mysql:host=$serv;dbname=$db", $user, $pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
}
 catch (PDOException $e) {
     die($e->getMessage()); 
 }

?>