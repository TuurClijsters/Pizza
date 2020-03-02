<?php

//home.php

require_once ("business/KlantService.php");

session_start();

$klantSvc =  new KlantService();

if (isset($_GET["action"]) && $_GET["action"] == "registreer") {

    $naam = $_POST["registreer_naam"];
    $voornaam = $_POST["registreer_voornaam"];
    $mail = $_POST["registreer_mail"];
    $straat = $_POST["registreer_straat"];
    $huisnummer = $_POST["registreer_huisnummer"];
    $woonplaats_id = $klantSvc->createPlaats($_POST["registreer_plaats"],$_POST["registreer_postcode"]);
    $telefoon =$_POST["registreer_telefoon"];
    $wachtwoord = md5($_POST["registreer_wachtwoord"]);
    $checkWachtwoord = md5($_POST["registreer_wachtwoord_confirm"]);


    $checkError = $klantSvc->validateRegistration($naam, $voornaam, $mail, $straat, $huisnummer,$_POST["registreer_plaats"],$_POST["registreer_postcode"] , $telefoon, $wachtwoord, $checkWachtwoord);
    if(!empty($checkError)){
        // print_r($checkError);
    }else{
        $checkMail = $klantSvc->checkIfEmailExist($mail);
        if($checkMail == null){
            $klant = $klantSvc->voegNieuweKlantToe($naam, $voornaam, $mail,$straat, $huisnummer,$woonplaats_id, $telefoon, $wachtwoord);
            $serKlant = serialize($klant);
            $_SESSION['klant'] = $serKlant;
            header("location: homeController.php");
        }
    }
}
include("presentation/registreer.php");