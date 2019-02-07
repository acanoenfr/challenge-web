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
include('includes/connexion.inc.php');
define('ROOT', dirname(__FILE__));
define('TARGET', '/img/');
define('MAX_SIZE', 100000);    // Taille max en octets du fichier
define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels 
    $id = $_SESSION['auth']['id'];
    $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
    $infosImg = array();
    $extension = '';
    $message = '';
    $nomImage = '';
if(!empty($_POST) && (!empty($_FILES))) { 
    if( !empty($_FILES['image']['name']) )
    {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['image']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['image']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['image']['error']) 
            && UPLOAD_ERR_OK === $_FILES['image']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['image']['tmp_name'], ROOT."/img/".$nomImage))
            {
              $message = 'Upload réussi !';
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO messages(content, image, created_at,user_id) VALUES(:content, :image, :created_at, :user_id)');
    $req->execute(array(
            'content' => $content,
            'image' => $nomImage,
            'created_at' => $date,
            'user_id' => $id,
        ));
  }
  elseif(!empty($_POST) && (empty($_FILES))) {
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO messages(content, created_at,user_id) VALUES(:content, :created_at, :user_id)');
    $req->execute(array(
            'content' => $content,
            'created_at' => $date,
            'user_id' => $id,
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