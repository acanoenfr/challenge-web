<?php 
include("includes/connexion.inc.php"); 

$id= $_POST['id']; 
$message = $_POST['message'];
$file = $_POST['file']; 

$query = "SELECT id FROM users where id = $id'";
 	$prepare = $pdo->prepare($query);
 	$prepare->execute();
 	$data = $prepare->fetch();
 	$user_id = $data['id'];

	if (isset($message) && !empty($message))
	{
		if(isset($id) && !empty($id))
		{
			$query = 'UPDATE messages SET content=:content WHERE id=:id';
			$prep = $pdo->prepare($query);
			$prep->bindValue(':contenu', $message);
			$prep->bindValue(':id', $id);
			$prep->execute();
		}
		else
		{
			$query = 'INSERT INTO messages (content,image,user_id) VALUES (:contenu,:image,:user_id)';
			$prep = $pdo->prepare($query);
			$prep->bindValue(':content', $_POST['message']);
			$prep->bindValue(':image', $_POST['file']);
			$prep->bindValue(':user_id', $user_id);
			$prep->execute();
 		}
	}
	header('Location: modification.php');
 		exit();
?>
?>