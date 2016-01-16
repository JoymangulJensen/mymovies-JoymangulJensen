<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Administration</title>
</head>

<body>

    <div class="container-fullwidth">
        <div class = "container-fullwidth">
            <?php include("../includes/header.php");
            include_once("../includes/Database.php");
            ?>
        </div>
    </div>

    <?php
        $database = new Database();
        // On récupère tout le contenu de la table movie
        $reponse = $database->getAllMovies();
    ?>


    <div class="container-fluid">
        <div class="jumbotron">
            <div class="col-lg-6 col-lg-offset-3 text-center"><h2>Administration</h2></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8  col-md-offset-2">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a data-toggle="tab" href="#film">Films</a></li>
                            <li><a data-toggle="tab" href="#utilisateurs">Utilisateurs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">



                        <div class="tab-content">
                            <div id="film" class="tab-pane fade in active">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Ttire</th>
                                                <th>Réalisateur</th>
                                                <th>Année de sortie</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                    while($donnee = $reponse->fetch())
                                                    {
                                                        $id = $donnee['mov_id'];
                                                        $url = '"edit_film.php?id=' . $id . '"';
                                                ?>
                                                    <td><?=$donnee['mov_title']?></td>
                                                    <td><?=$donnee['mov_director']?></td>
                                                    <td><?=$donnee['mov_year']?></td>
                                                    <td>
                                                        <a href=<?php echo $url ?> class="btn btn-info btn-xs" role="button"> <span class="glyphicon glyphicon-edit"></span></a>
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delModal"><span class="glyphicon glyphicon-remove"></span> </button>

                                                        <!-- Modal -->
                                                        <div id="delModal" class="modal fade" role="dialog">
                                                            <div class="modal-dialog modal-sm">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Alerte</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Voulez-vous supprimer le film <?=$donnee['mov_title']?></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="../includes/deleteFilmDatabase.php" method="post">
                                                                            <input type="hidden" name="mov_id" value="<?=$id ?>">
                                                                            <button type="submit" name="delete" class="btn btn-danger">Supprrimer</button>
                                                                        </form>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php } ?>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="utilisateurs" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Mail</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Joymangul</td>
                                                <td>Jensen</td>
                                                <td>32/13/-20</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> </button>
                                                    <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer">
            <?php include("../includes/footer.php"); ?>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
