  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text">Messages</h1>
      <table>
        <thead>
          <tr>
              <th>Contenu</th>
              <th>Image</th>
              <th>Créé le</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=challenge;charset=utf8', 'root', '');    
          $req = $bdd->query('SELECT * FROM messages');
          while ($donnees = $req->fetch())
          {
            echo '<tr>
            <td>'.$donnees['content'].'</td>
            <td>'.$donnees['image'].'</td>
            <td>'.$donnees['created_at'].'</td>
            </tr>';
          }
         ?>
        </tbody>
      </table>
      <br><br>

    </div>
  </div>

