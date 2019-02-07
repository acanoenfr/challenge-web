<?php
include ('includes/connexion.inc.php');
$id = $_GET['id'];
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $query = 'DELETE FROM messages WHERE id=:id';
  $prep = $bdd->prepare($query);
  $prep->bindValue(':id',$id);
  $prep->execute();
}
header('Location: admin.php');
?>