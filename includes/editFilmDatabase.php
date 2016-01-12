<?php
include_once("../includes/Database.php");
$database = new Database();
$database->editMovie(1,'James Bond','Sam Mendes','dited shorted','long', 2006, 'toto');
header('Location: ../index.php');
//$database->editMovie($_GET['id'], $_POST['mov_title'], $_POST['mov_description_short'], $_POST['mov_description_long'],$_POST['mov_year'],"i'm edited");
?>