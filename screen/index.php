<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

  
  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
</head>
<body>

    <script>
        $(document).ready(function(){
            $('.carousel').carousel();
            
            //function for auto play carousel-slider
            setInterval(function(){
                   $('.carousel').carousel('next');
            }, 5000);
        });
    </script>
    
    <style>
         *{
            font-family: 'Oswald', sans-serif;

        }
        html {
            height: 100%;
            width: 100%;
        }
        body{
            height: 100%;
            width: 100%;
        }
        .carousel{
            height: 100% !important;
        }
        .flex{
            display: flex;
            flex-wrap: nowrap;
        }
        .firstElement{
            background-color: white;
            padding-left: 2%;
            padding-right: 2%;
            width: 35% !important;

        }
        .image{
            width: 65% !important;
        }
        h3{
            text-align:center;
            font-weight:bold;
        }

        h5{
            text-align:center;
            color:#bfbfbf;
            font-style:italic;
            border-bottom:solid 1px black;
            padding-bottom:6%;
            margin-top:6%;

        }
        p{
            font-size:30px !important;
            text-align:justify;
            
        }
        #paraSansPhoto{

        }
        .carousel-item{
            background-color:#FFFFFF;
        }

        .carousel-item h5{
            margin-top:0;
            padding-bottom:2%;
        }

        #txtAlone{
            width:60%;
            margin:auto;
        }

    </style>
         <?php 
            include('inc/connexion.php' );
            include('inc/fonctions.php');
            $sql = "SELECT * FROM messages";
            $prep = $pdo->prepare($sql);
            $prep->execute();
            $data = $prep->fetchAll();
            /*
            echo $data['id'];
            echo $data['content'];
            echo $data['image'];
            echo $data['created_at'];
            echo $data['user_id'];
         */ ?>
    <div class="carousel carousel-slider" data-indicators="true">
        <?php
            foreach($data as $element){
                $id = $element[4];
                $utilisateur = getUsers($id, $pdo);
            
                if(isset($element[2])){
        ?>
                    <div class="flex carousel-item">
                        <div class="firstElement">
                        <h3><?php echo $utilisateur[1]; ?></h3>
                        <h5><?php echo $element[3]; ?></h5>
                        <p><?php echo $element[1]; ?></p>
                    </div>

                    <div class="image"><center><?php echo "<img src='".$element[2]."'>"; ?></center></div>
                        
                        ?>
                    </div>
        <?php 
                }
                else{
        ?>          <div class="carousel-item" >
                        <div id="txtAlone">
                            <h3><?php echo $utilisateur[1]; ?></h3>
                            <h5><?php echo $element[3]; ?></h5>
                            <p class="paraSansPhoto"><?php echo $element[1]; ?></p>      
                        </div>     
                    </div>
          <?php 
                                  
                }   
            }  
        ?>
    </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
