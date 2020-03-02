<?php

//accountController.php



require_once ("entities/CartItem.php");
require_once ("business/PizzaService.php");
require_once ("business/CartItemService.php");
require_once ("business/KlantService.php");

session_start();

$pizzaSvc =  new PizzaService();
$cartItemSvc =  new CartItemService();
$klantSvc = new KlantService();


if(isset($_SESSION['klant'])){ 
    // $klant = $_SESSION['klant'];
    // $klantGegevens = unserialize($klant);
    print('ingelogd');
    header("Location: overzichtController.php");
}else{
    if (isset($_GET["action"]) && $_GET["action"] == "login") {
        $mail = $_POST["login_email"];
        $wachtwoord =md5($_POST["login_paswoord"]);
        $klant = $klantSvc->login($mail, $wachtwoord);
        if(isset($klant)){
            $serKlant = serialize($klant);
            $_SESSION['klant'] = $serKlant;
            header("Location: overzichtController.php");
        }else{
            $loginError ="Mail adres en/of wachtwoord zijn incorrect.";
        }
    }
    if (isset($_GET["action"]) && $_GET["action"] == "register") {

        if(isset($_POST["check"]))
            {
                // print("checkbox aan");
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
                
                }else{
                    $checkMail = $klantSvc->checkIfEmailExist($mail);
                    if($checkMail == null){
                        $klant = $klantSvc->voegNieuweKlantToe($naam, $voornaam, $mail,$straat, $huisnummer,$woonplaats_id, $telefoon, $wachtwoord);
                        $serKlant = serialize($klant);
                        $_SESSION['klant'] = $serKlant;
                        header("location: overzichtController.php");
                    }
                }
            }else{

                // print("checkbox uit");

                $naam = $_POST["registreer_naam"];
                $voornaam = $_POST["registreer_voornaam"];
                $mail = 0;
                $straat = $_POST["registreer_straat"];
                $huisnummer = $_POST["registreer_huisnummer"];
                $woonplaats_id = $klantSvc->createPlaats($_POST["registreer_plaats"],$_POST["registreer_postcode"]);
                $plaats = $_POST["registreer_plaats"];
                $postcode = $_POST["registreer_postcode"];
                $telefoon =$_POST["registreer_telefoon"];
                $wachtwoord = 0;
      

                $checkError = $klantSvc->validateAccount($naam, $voornaam, $straat, $huisnummer, $_POST["registreer_plaats"], $_POST["registreer_postcode"] , $telefoon);

                if(!empty($checkError)){
                
                }else{

                    $klant = $klantSvc->maakAccount($naam, $voornaam, $mail,$straat, $huisnummer,$woonplaats_id, $telefoon, $wachtwoord);
                    $serKlant = serialize($klant);
                    $_SESSION['klant'] = $serKlant;
                    header("location: overzichtController.php");
                }


            }


    }
}



include("presentation/account.php");