<?php

//Business/KlantService.php
require_once 'entities/Klant.php';
require_once 'data/KlantDAO.php';


class KlantService {

    public function createPlaats($registreer_plaats, $registreer_postcode) {
        
        $klantDAO = new KlantDAO();
        $plaatsId = $klantDAO->bestaatWoonplaats($registreer_plaats, $registreer_postcode);
        
        if ($plaatsId === null ) {
            $plaatsId = $klantDAO->createWoonplaats($registreer_plaats, $registreer_postcode);
            return $plaatsId;
        } else {
            return $plaatsId;
        }
    }

    public function validateRegistration(
        string  $naam,
        string  $voornaam,
        string  $email,
        string  $straat,
        string  $huisnummer,
        string  $plaats,
        string  $postcode,
        string  $telefoon,
        string  $wachtwoord,
        string  $checkWachtwoord):?array{
        $valid = true;
        $errorMessage = array();

        $emailCheck = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailCheck, FILTER_VALIDATE_EMAIL)){
        }else{
            $errorMessage[] = 'Gelieve een correct mail adres in te vullen.';
            $valid = false;
        }
        if(preg_match("/^[0-9]{4}$/", $postcode)) {
            // $phone is valid
        }else{
            $errorMessage[] = 'Gelieve een correcte postcode in te vullen (4 cijfers).';
            $valid = false;
        }
        if($wachtwoord != $checkWachtwoord){
            $errorMessage[] = 'Wachtwoorden komen niet overeen.';
            $valid = false;
        }
        if($valid == false){
            return $errorMessage;
        }else{
            return null;
        }

    }
    
    public function validateAccount(
        string  $naam,
        string  $voornaam,
        string  $straat,
        string  $huisnummer,
        string  $plaats,
        string  $postcode,
        string  $telefoon):?array{
        $valid = true;
        $errorMessage = array();


        if(preg_match("/^[0-9]{4}$/", $postcode)) {
        }else{
            $errorMessage[] = 'Gelieve een correcte postcode in te vullen (4 cijfers).';
            $valid = false;
        }
    
        if($valid == false){
            return $errorMessage;
        }else{
            return null;
        }

    }
    public function maakAccount($naam, $voornaam, $email,$straat, $huisnummer,$woonplaats_id, $telefoon, $wachtwoord):?Klant{

        $klant = new Klant(
            $klantId,
            $naam,
            $voornaam,
            $email,
            $straat,
            $huisnummer,
            $woonplaats_id,
            $telefoon,
            $wachtwoord
        );

        return $klant;

    }

    public function voegNieuweKlantToe($naam, $voornaam, $email,$straat, $huisnummer,$woonplaats_id, $telefoon, $wachtwoord):?Klant {
        $klantDAO = new KlantDAO();
        $klant = $klantDAO->createKlant($naam, $voornaam,$email ,$straat , $huisnummer ,$woonplaats_id,$telefoon ,$wachtwoord);
        return $klant;
    }

    public function checkIfEmailExist($email):?array{
        $errorMessage = array();
        $klantDAO = new KlantDAO();
        $emailExist = $klantDAO->getEmail($email);

        if($emailExist == false){
            return null;
        }else{
            $errorMessage[] = 'Dit mail adres wordt al gebruikt.';
            return $errorMessage;
        }
    }
     public function login($mail, $wachtwoord):?klant{

        $klantDAO = new KlantDAO();
        $klant = $klantDAO->getUserByEmail($mail, $wachtwoord);

        if(isset($klant)){
            return $klant;
        }else{
            return null;
        }
     }


}