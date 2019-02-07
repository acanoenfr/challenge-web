  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="center-align">
        <a href="admin.php" class="waves-effect waves-light btn-small center" >Retour en arrière</a>
      </div>
      <section id='section2'>
      <div class="center-align">
      <h1 class="header center teal-text">Messages</h1>
      <a class="waves-effect waves-light-green btn-small center" style="background-color: #8bc34a" id="ajoutBttn">Ajouter un message</a>
      </div>
      <script>
        $(document).ready(function(){
        $('#ajoutBttn').click(function(event){
        $('#section2').load('includes/ajout.message.php');
        event.preventDefault();
        });
        });
      </script>
      <table>
        <thead>
          <tr>
              <th>Contenu</th>
              <th>Image</th>
              <th>Créé le</th>
              <th>Modifier</th>
              <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=broadcaster;charset=utf8', 'root', 'root');    
          $req = $bdd->query('SELECT * FROM messages');
          while ($donnees = $req->fetch())
          {
            echo '<tr>
            <td>'.$donnees['content'].'</td>
            <td>'.$donnees['image'].'</td>
            <td>'.$donnees['created_at'].'</td>
            <td>'.$donnees['created_at'].'</td>
            <td><a class="btn-small center" href="suppression.php?id='.$donnees['id'].'">Supprimer</a>
            </td>
            </tr>';
          }
         ?>
        </tbody>
      </table>
      <br><br>
      </section>
    </div>
  </div>

