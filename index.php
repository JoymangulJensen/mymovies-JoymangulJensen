<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Bienvenue sur MyMoviese</title>
</head>

<body>

    <!--la barre de navigation en haute de la page-->
    <div class="container-fullwidth">
        <?php include("includes/header.php");
        include_once("includes/Database.php");
        ?>

    </div>


    <?php
    $database = new Database();
    // On récupère tout le contenu de la table movie
        $reponse = $database->getAllMovies();

    ?>

    <div class="container">

        <div class="content">
           <?php
                while($donnee = $reponse->fetch())
                {
                    $id = $donnee['mov_id'];

                    echo '<a href="lib/movie.php?id='. $id  . '"</a> <h2>' . $donnee['mov_title'] .'</h2></a>' ;
                    echo '<p>'. $donnee['mov_description_short'] .'</p>';
                    echo '<p>'. $id  .'</p>';

                }
                $reponse->closeCursor();
            ?>
        </div>
        

        <!--Le bas de page-->
        <div class="footer">
            <?php include("includes/footer.php"); ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </div>



</body>

</html>
