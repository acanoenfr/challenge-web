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
            
            $target_dir = "img/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1; 
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
            
            if(isset($_POST["submit"])){
                $check = getimagesize($_FILES["fileToUpload"]["temp_name"]);
                
                if($check !== false) {
                    echo "File is an image - ".$check["mine"]."."; 
                    $uploadOK = 1;
                } else {
                    echo "File is not an image. "; 
                    $uploadOK = 0;
                }
            }
            
 		}
	}
	//header('Location: modification.php');
   // exit();

?>