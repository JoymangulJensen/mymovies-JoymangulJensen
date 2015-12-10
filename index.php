<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Mon premier site dynamique</title>
</head>

<body>

    <!--la barre de navigation en haute de la page-->
    <div class="container-fullwidth">
        <?php include("includes/header.php"); ?>
    </div>
    
    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=mymovies;charset=utf8', 'mymovies_user', 'secret');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    ?>

    <?php
    // On récupère tout le contenu de la table movie
        $reponse = $bdd->query('SELECT * FROM movie');
    ?>

    <div class="container">

        <div class="content">
           <?php
                while($donnee = $reponse->fetch())
                {
                    echo '<h2>' . $donnee['mov_title'] .'</h2>' ;
                    echo '<p>'. $donnee['mov_description_short'] .'</p>';
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
