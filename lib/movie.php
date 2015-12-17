<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css"  rel="stylesheet">        
        <title>Hello world with Bootstrap</title>    
    </head>
    <body>
        
        <div class = "container-fullwidth">
            <?php include("../includes/header.php");
            include_once("../includes/Database.php");
            ?>
        </div>

        <?php
            if (isset($_GET['id'])) // On a le nom et le prénom
            {
                $id= $_GET['id'] ;            }
            else
            {
                echo 'Il faut renseigner un nom et un prénom !';
            }

            $database = new Database();
            // On récupère tout le contenu de la table movie
            $reponse = $database->gerMovie($id);
        $donnee = $reponse->fetch()

        ?>
        
        <div class="container">
            <div class="jumbotron">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                              <img class = "img-thumbnail" src="../img/spectre.jpg" >
                        </div>
                        <div class="col-md-6">
                            <h2><strong><?=$donnee['mov_title'] ?></strong></h2>
                            <blockquote>
                                <p><?=$donnee['mov_director'] ?></p>
                            </blockquote>
                            <p><?=$donnee['mov_description_long'] ?></p>
                            <p><a href=edit_film.php?id=<?=$id?>" class="btn btn-primary" role="button">Editer</a></p>
                        </div>
                    </div>
                  </div>
            </div>

            <div class="footer">
                <?php include("../includes/footer.php"); ?>
            </div>   
            
        </div>
       
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>