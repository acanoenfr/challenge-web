<?php 
    include("includes/connexion.inc.php"); 
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="css/interface.css">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <div class="container">
        <div class="row">
            <form method="post" action="message.php" enctype="multipart/form-data">
        <div class="col-sm-10">
            <div class="row">
                Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
            </div>
         <div class="row">
            <textarea id="message" name="message" value=""></textarea>
            <input type="hidden" id="id" name="id" class="" value="">
        </div>
    </div>
    <div class="col-sm-2">
        <button type="submit" class="">Envoyer</button>
    </div>
</form>
    <a href="interface.php?id=<??>"><button>Modifier</button></a>
    <a href="interface.php?id=<??>"><button>Supprimer</button></a>
</div>
</div>
