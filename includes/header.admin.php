<nav class="teal lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/starter-template/img/iut.png" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
      <li><a href="admin.php">Administration</a></li>
        <li><a href="gestionMessages.php">Gestion messages</a></li>
        <li><a href="roles.admin.php">Gestion rôles</a></li>
      </ul>
      <?php
      session_start();
      ?>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="/messages.php">Gestion messages</a></li>
        <li><a href="/roles.php">Gestion rôles</a></li>

      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>