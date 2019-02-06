<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text">Rôles</h1>
      <table>
        <thead>
          <tr>
              <th>Username</th>
              <th>Password</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=challenge;charset=utf8', 'root', '');    
          $req = $bdd->query('SELECT * FROM users');
          while ($donnees = $req->fetch())
          {
            echo '<tr>
            <td>'.$donnees['username'].'</td>
            <td>'.$donnees['password'].'</td>
            </tr>';
          }
         ?>
        </tbody>
      </table>
      <br><br>

    </div>
  </div>

