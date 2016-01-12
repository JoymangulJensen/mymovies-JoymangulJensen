<?php
include_once("../includes/Database.php");
$database = new Database();
if(isset($_POST['send'])) {
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(  substr(  strrchr($_FILES['mov_image']['name'], '.')  ,1)  );
    if ( in_array($extension_upload,$extensions_valides))
    {
        $nom = '../img/' . $_FILES['mov_image']['name'];
        $resultat = move_uploaded_file($_FILES['mov_image']['tmp_name'],$nom);
        if ($resultat)
        {
            $database->editMovie($_POST['mov_id'], $_POST['mov_title'], $_POST['mov_director'], $_POST['mov_description_short'], $_POST['mov_description_long'],$_POST['mov_year'],$nom);
        }
    }

    header('Location: ../index.php');
}


?>