<?php

//loginController.php
require_once ("business/KlantService.php");

session_start();

$klantSvc = new KlantService();

if (isset($_GET["action"]) && $_GET["action"] == "login") {

    $mail = $_POST["login_email"];
    $wachtwoord =md5($_POST["login_paswoord"]);

    $klant = $klantSvc->login($mail, $wachtwoord);
    if(isset($klant)){
        $serKlant = serialize($klant);
        $_SESSION['klant'] = $serKlant;
        header("Location: homeController.php");
    }else{

        $loginError ="Mail adres en/of wachtwoord zijn incorrect.";
    }
    // print("eeeeeeeee");
}
include("presentation/login.php");