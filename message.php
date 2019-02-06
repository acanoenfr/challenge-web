<?php 
include("includes/connexion.inc.php"); 

//$id= $_POST['id']; 
//$message = $_POST['message']; 

$query = "SELECT id FROM users";
 	$prepare = $bdd->prepare($query);
 	$prepare->execute();
 	$data = $prepare->fetch();
 	$user_id = $data['id'];

	if (isset($_POST['message']) && !empty($_POST['message']))
	{
		if(isset( $_POST['id']) && !empty( $_POST['id']))
		{
			$query = 'UPDATE messages SET content=:content WHERE id=:id';
			$prep = $bdd->prepare($query);
			$prep->bindValue(':content', $_POST['message']);
			$prep->bindValue(':id', $_POST['id']);
			$prep->execute();
		}
		else
		{
			$query = 'INSERT INTO messages (content,user_id) VALUES (:content,:user_id)';
			$prep = $bdd->prepare($query);
			$prep->bindValue(':content', $_POST['message']);
			$prep->bindValue(':user_id', $user_id);
			$prep->execute();
 		}
	}
	header('Location: modification.php');
    exit();

?>