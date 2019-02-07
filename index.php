<?php session_start();
  
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $username = trim(htmlentities(stripcslashes(htmlspecialchars($_POST['username']))));
      $password = trim(htmlentities(stripcslashes(htmlspecialchars($_POST['password']))));
      $found = 0;
      $conn = ldap_connect("10.10.28.101", 389);
      ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
      $dn = "dc=iutcb, dc=univ-littoral, dc=fr";
      $res = ldap_search($conn, "OU=Groups, $dn", "(CN=lpdim)", ["memberuid"]);
      $data = ldap_get_entries($conn, $res);
      foreach ($data[0]["memberuid"] as $member) {
          if ($username === $member) {
              $found = 1;
              break;
          }
      }
      if ($found) {
          $connected = ldap_bind($conn, "uid=$username, ou=Users, $dn", $password);
          if ($connected) {
              $db = new PDO("mysql:host=localhost;dbname=broadcaster", "root", "root");
              $is_logged = $db->prepare("SELECT * FROM users WHERE username = :username");
              $is_logged->execute([
                  "username" => $username
              ]);
              if ($is_logged->rowCount() == 0) {
                  $req = $db->prepare("INSERT INTO users(username) VALUES(:username)");
                  $req->execute([
                      "username" => $username
                  ]);
              }
              $user = explode('.', $username);
              $user[0] = strtoupper($user[0]);
              $user[1] = ucfirst($user[1]);
              $user = implode(' ', $user);
              $_SESSION['auth'] = [
                  "id" => $db->lastInsertId(),
                  "username" => $username,
                  "displayname" => $user
              ];
              header('Location: admin.php');
              exit();
          } else {
              $_SESSION['flash'] = "Votre mot de passe est incorrect !";
              header('Location: index.php');
              exit();
          }
      } else {
          $_SESSION['flash'] = "Vous n'avez pas l'autorisation pour accéder à cet interface !";
          header('Location: index.php');
          exit();
      }
      ldap_close($conn);
  }

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
        <div id="main-container">
            <main class="" role="main">
                <div class="homepage-content">
                    <section class="homepage-sign-in-section">
                        <div class="homepage-sign-in-container">
                            <div class="homepage-logo-container">
                            <img class="homepage-platform-logo" src="img/iutlittoral.jpg" alt="Logo">
                            </div>
                            <div class="homepage-sign">
                                   <div class="row">
                                   <form method="post" action="" class="">
                                        <?php if (array_key_exists('flash', $_SESSION)) { ?>
                                            <p><?= $_SESSION['flash'] ?></p>
                                        <?php unset($_SESSION['flash']); } ?>
                                        <div class="row">
                                            <div class="input-field col s10">
                                                <input id="first_name" type="text" name="username" class="validate">
                                                    <label for="first_name">Nom d'utilisateur</label>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="input-field col s10">
                                                <input id="password" type="password" name="password" class="validate">
                                                <label for="password">Mot de passe</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <button type="submit" class="waves-effect waves-light btn">Connexion</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="homepage-create-section">
                            <div class="homepage-welcome">
                                <h2 class="homepage-welcome-title">Hello !
                                </h2>
                                <div class="homepage-headline">
                                    <p>EMPLOI DU TEMPS ETUDIANT</p>
                                    <div class="list-calen">
                                    <ul class="edit-list">
                                        <li class="adim-gestion-com"><a href="#">GACO</a></li>
                                        <li class="adim-gestion-com"><a href="#">GEA</a></li>
                                        <li class="adim-gestion-com"><a href="#">TC</a></li>
                                        <li class="electr-auto-info"><a href="#">GEII</a></li>
                                        <li class="electr-auto-info"><a href="#">INFO</a></li>
                                         <li class="industrielles-materiaux"><a href="#">GIM</a></li>
                                         <li class="chimie-biologie"><a href="#">BIO</a></li>
                                         <li class="travaux-public-energie"><a href="#">GTE</a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div> 
            </main>
        </div>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    </body>
  </html>