<?php
include_once("../includes/Database.php");
$database = new Database();
$database->delMovie($_POST['mov_id']);
header('Location: ../lib/administration.php');
?>