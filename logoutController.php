<?php 
session_start();
$_SESSION["klant"] = "";
unset($_SESSION["klant"]);
// session_destroy();
header("Location: homeController.php");