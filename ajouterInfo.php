<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/interface.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>


        <div class="container">
            <div class="row">
                <h2>Ajouter information</h2>
            </div> 
            <div class="row">
                <form class="col s12" method="post" action="message.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="titre" id="Titre" name="titre" type="text" class="validate">
                            <label for="titre">Titre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="content"  name="content" class="materialize-textarea"></textarea>
                            <label for="content">Content</label>
                        </div>
                    </div>
                    <div class="row">             
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input id="image" name="image" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" class="" value="">
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>           
    </body>
</html>