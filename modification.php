<?php 
    include("includes/connexion.inc.php"); 
?>
<div class="row">
<form method="post" action="message">
    <div class="col-sm-10">
        <div class="">
            <textarea id="message" name="message" value=""></textarea>
            <input type="hidden" id="id" name="id" class="" value="">
        </div>
         <div class="">
            <textarea id="message" name="message" value=""></textarea>
             <input type="file" id="file" name="file" class="" value="">
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