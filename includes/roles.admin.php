<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="center-align">
        <a href="admin.php"" class="waves-effect waves-light btn-small center" >Retour en arrière</a>
      </div>
      <h1 class="header center teal-text">Utilisateurs</h1>
      <table>
        <thead>
          <tr>
              <th>Username</th>
              <th>Password</th>
              <th>Rôle</th>
              <th>Choisir un rôle</th>
          </tr>
        </thead>
        <tbody>
        <script>
            $(document).ready(function(){
            $('select').formSelect();
            });
          </script>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=challenge;charset=utf8', 'root', '');    
          $req = $bdd->query('SELECT * FROM users');
          while ($donnees = $req->fetch())
          {
            switch ($donnees['role']) {
              case 0:
                  $role="Administrateur";
                  break;
              case 1:
                  $role="Professeur";
                  break;
             }
            echo '<tr>
            <td>'.$donnees['username'].'</td>
            <td>'.$donnees['password'].'</td>
            <td>'.$role.'</td>
            <td> <form action="roles.admin.php" method="post">
                   <div class="input-field col s12" id"choix">
                      <select>
                        <option value="1">Administrateur</option>
                        <option value="2">Professeur</option>
                      </select>
                  </form>
              </div></td>
            </tr>';
            ?>
            <script>
              var instance = M.FormSelect.getInstance(elem);
              instance.getSelectedValues();
            </script>
          <?php
          }
         ?>
        </tbody>
      </table>
      <br><br>
    </div>
  </div>

