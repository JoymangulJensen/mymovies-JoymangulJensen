<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css"  rel="stylesheet">
    <title>Ajouter un film</title>
</head>
<body>

<div class = "container-fullwidth">
    <?php include("../includes/header.php");
    include_once("../includes/Database.php");
    ?>
</div>

<?php
$database = new Database();

?>

<div class="container">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="../includes/addFilmDatabase.php" method="post" enctype="multipart/form-data">
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-4" for="mov_title">Nom du film </label>
                                <div class="col-sm-8">
                                    <input type="text" name="mov_title"  class="form-control"  id ="mov_title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4"  for="mov_description_short">Description courte </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows=3 name="mov_description_short"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4"  for="mov_description_long">Description longue </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows=5 name="mov_description_long"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4" for="mov_director">Réalisateur </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="mov_director"/">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4" for="mov_year">Année de sortie </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="mov_year"/">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4" for="mov_image">Image </label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="mov_image">
                                </div>
                            </div>

                            <button type="submit" name="send" class="btn btn-primary">Ajouter</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <?php include("../includes/footer.php"); ?>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>