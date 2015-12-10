<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Hello world with Bootstrap</title>
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
            <h2>Underworld</h2>
            <p>Selene est une guerrière vampire puissante. Dans la lutte qui oppose depuis des siècles son peuple à celui des Lycans, des loups-garous, elle est reconnue pour être l'une des tueuses les plus efficaces. Jusqu'au jour où elle tombe amoureuse de Michael Corvin, un humain qui se retrouve pris malgré lui dans l'affrontement des deux clans. Mordu par l'un des loups- garous, il devient rapidement l'un d'entre eux. Entre passion et devoir, Selene doit alors choisir son camp..</p>

            <a href='lib/movie.html'><h2>007 Spectre</h2></a>

            <p>Un message cryptique surgi du passé entraîne James Bond dans une mission très personnelle à Mexico puis à Rome, où il rencontre Lucia Sciarra, la très belle veuve d’un célèbre criminel. Bond réussit à infiltrer une réunion secrète révélant une redoutable organisation baptisée Spectre. Pendant ce temps, à Londres, Max Denbigh, le nouveau directeur du Centre pour la Sécurité Nationale, remet en cause les actions de Bond et l’existence même du MI6, dirigé par M. Bond persuade Moneypenny et Q de l’aider secrètement à localiser Madeleine Swann, la fille de son vieil ennemi, Mr White, qui pourrait détenir le moyen de détruire Spectre. Fille de tueur, Madeleine comprend Bond mieux que personne… En s’approchant du cœur de Spectre, Bond va découvrir qu’il existe peut-être un terrible lien entre lui et le mystérieux ennemi qu’il traque…</p>


            <h2>Seul sur Mars</h2>
            <p>Lors d’une expédition sur Mars, l’astronaute Mark Watney (Matt Damon) est laissé pour mort par ses coéquipiers, une tempête les ayant obligés à décoller en urgence. Mais Mark a survécu et il est désormais seul, sans moyen de repartir, sur une planète hostile. Il va devoir faire appel à son intelligence et son ingéniosité pour tenter de survivre et trouver un moyen de contacter la Terre. A 225 millions de kilomètres, la NASA et des scientifiques du monde entier travaillent sans relâche pour le sauver, pendant que ses coéquipiers tentent d’organiser une mission pour le récupérer au péril de leurs vies.</p>
        </div>
        

        <!--Le bas de page-->
        <div class="footer">
            <?php include("includes/footer.php"); ?>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
