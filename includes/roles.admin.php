<?php require('connexion.inc.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $role = $_POST['role'];

    $req = $bdd->prepare("UPDATE users SET role = :role WHERE id = :id");
    $req->execute([
      "role" => $role,
      "id" => $id
    ]);

    header('Location: ../admin.php');
    exit();

  }

?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="center-align">
        <a href="admin.php" class="waves-effect waves-light btn-small center" >Retour en arrière</a>
      </div>
      <h1 class="header center teal-text">Utilisateurs</h1>
      <table>
        <thead>
          <tr>
              <th>Nom d'utilisateur</th>
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
          $bdd = new PDO('mysql:host=localhost;dbname=broadcaster;charset=utf8', 'root', 'root');    
          $req = $bdd->query('SELECT * FROM users');
          while ($donnees = $req->fetch())
          {
            $isAdmin = ($donnees['role'] === "admin") ? "selected" : "";
            $isUser = ($donnees['role'] === "user") ? "selected" : "";
            switch ($donnees['role']) {
              case "admin":
                  $role="Administrateur";
                  break;
              case "user":
                  $role="Utilisateur";
                  break;
             }
            echo '<tr>
            <td>'.$donnees['username'].'</td>
            <td>'.$role.'</td>
            <td> <form action="includes/roles.admin.php" method="post">
                   <div class="input-field col s12" id"choix">
                      <select name="role">
                        <option value="admin" '.$isAdmin.'>Administrateur</option>
                        <option value="user" '.$isUser.'>Utilisateur</option>
                      </select>
                      <input type="hidden" name="id" value="'.$donnees['id'].'">
                      <button type="submit" class="waves-effect waves-light btn">Changer le rôle</button>
                    </div>
                  </form>
              </td>
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

