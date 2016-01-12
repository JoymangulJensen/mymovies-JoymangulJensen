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
    $reponse = $database->gerMovie($id);
    $donnee = $reponse->fetch();

    if(isset($_POST['submit']))
    {
        header('Location: ../index.php');
        $database->editMovie(1,'James Bond','Sam Mendes','dited shorted','long', 2006, 'toto');
        $database->editMovie($_GET['id'], $_POST['mov_title'], $_POST['mov_description_short'], $_POST['mov_description_long'],$_POST['mov_year'],"i'm edited");
    }

    ?>

    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form name="form1" method="post" action="../includes/editFilmDatabase.php">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-4" for="mov_title">Nom du film </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mov_title" value="<?=$donnee['mov_title'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4"  for="mov_description_short">Description courte </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows=3 id="mov_description_short"><?=$donnee['mov_description_short'] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4"  for="mov_description_long">Description longue </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows=5 id="mov_description_long"><?=$donnee['mov_description_long'] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4" for="mov_director">Réalisateur </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mov_director" value="<?=$donnee['mov_director'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4" for="mov_year">Année de sortie </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="mov_year" value="<?=$donnee['mov_year'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4" for="mov_image">Image </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="mov_image">
                                    </div>
                                </div>

                                <input type="submit" name="insert" value="insert" />

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
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>