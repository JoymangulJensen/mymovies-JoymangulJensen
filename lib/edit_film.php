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
    if (isset($_GET['id']))
    {
        $id= $_GET['id'] ;
    }
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
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-4" for="mov_title">Nom du film </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mov_title">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-4"  for="mov_description_short">Description courte </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows=3 id="mov_description_short"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4"  for="mov_description_short">Description courte </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows=3 id="mov_description_short"></textarea>
                                </div>
                            </div>

                        </div>
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