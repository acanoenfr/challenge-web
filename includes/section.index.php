<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text">Bonjour, <?= $_SESSION['auth']['displayname'] ?> !</h1>
      <div class="row center">
      <a class="default btn-large" id='bttn1'>Messages</a>
      <?php if ($_SESSION['auth']['role'] !== 'user') { ?>
      <a class="default btn-large" id='bttn2'>Utilisateurs</a>
      <?php } ?>
      </div>
      <br><br>
    </div>
  </div>
    </div>
    <br><br>
  </div>