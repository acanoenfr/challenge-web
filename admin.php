<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Administration</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<?php
include('includes/header.admin.php');
?>
<section id='section1'>
<?php
include('includes/section.index.php');
?>
</section>
<script>
$(document).ready(function(){
  $('#bttn1').click(function(event){
    $('#section1').load('includes/messages.admin.php');
    event.preventDefault();
  });
});

$(document).ready(function(){
  $('#bttn2').click(function(event){
    $('#section1').load('includes/roles.admin.php');
    event.preventDefault();
  });
});
</script>
</body>
</html>
