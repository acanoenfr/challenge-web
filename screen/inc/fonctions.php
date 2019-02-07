<?php 

function getUsers($id, $pdo){
	$sql = "SELECT * FROM users WHERE id=:id";
	$prep = $pdo->prepare($sql);
	$prep->bindParam(':id', $id);
	$prep->execute();
	$data = $prep->fetch();
	return $data;
}
?>