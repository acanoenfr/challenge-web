<?php session_start();
  if (!array_key_exists("auth", $_SESSION)) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Ajout de message</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<?php
include('includes/header.admin.php');
if(!empty($_POST) && !empty($_FILE)){ 
    $nom = "/img/";
    $name = $_FILES['image']['name'];
    $envoi = move_uploaded_file($_FILES['image']['tmp_name'],$nom.$name);
    if ($envoi){
        echo "Transfert réussi";
    } else {
        echo "Echec du transfert";
    }
    $contenu = $_POST['content'];
    $date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO messages(content, date) VALUES(:content, :date)');
    $req->execute(array(
            'content' => $content,
            'created_at' => $date,
        ));
  }
?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <section id='section2'>
      <div class="center-align">
      <h1 class="header center teal-text">Ajouter un message</h1>

            <div class="row">
                <form name="add-form" action="ajout.message.php" enctype="multipart/form-data" class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="content">Content</label>
                            <textarea id="content"  name="content" class="materialize-textarea"></textarea>
                            <div class="comments"></div>
                        </div>
                    </div>
                    <div class="row">             
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input id="image" name="image" type="file">
                                <div class="comments"></div>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" class="" value="">
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="add">Publier
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
      <br><br>
      </section>
    </div>
  </div>
</body>
</html>