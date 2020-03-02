<?php

//Data/KlantDAO.php

require_once 'DBConfig.php';
require_once 'entities/Klant.php';

class KlantDAO{

    public function createWoonplaats($registreer_plaats, $registreer_postcode):int
    {
        $sql = "INSERT INTO `woonplaats` (`plaats`, `postcode`) VALUES (:plaats, :postcode);";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':plaats' => $registreer_plaats, 
            ':postcode' => $registreer_postcode
        ));

        $woonplaats_id = $dbh->lastInsertId();
        $dbh = null;

        return $woonplaats_id;
    }

    public function bestaatWoonplaats($registreer_plaats, $registreer_postcode) :?int
    {
        $sql = "SELECT `id` FROM `woonplaats` WHERE plaats = :plaats AND postcode = :postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':plaats' => $registreer_plaats,
            ':postcode' => $registreer_postcode
        ));
        
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $woonplaatsId = $rij['id'];
        $dbh = null;

        if (!empty($rij)){
            return $woonplaatsId;
        }else{
            return null;
        }
    }
    
    public function getPlaatsById($id){

        $sql = "SELECT `plaats` FROM `woonplaats` WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':id' => $id,
        ));
        
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $plaats = $rij['plaats'];
        $dbh = null;

        if (!empty($rij)){
            return $plaats;
        }else{
            return null;
        }

    }

    public function createKlant(string $naam, string $voornaam, $email, string $straat, int $huisnummer, int $woonplaats_id, string $telefoon, $wachtwoord ):?Klant {

    $sql = "INSERT INTO `klanten` (`naam`, `voornaam`, `email`,`straat`, `huisnummer`, `woonplaats_id`, `telefoon`, `wachtwoord`) VALUES (:naam, :voornaam, :email, :straat, :huisnummer, :woonplaats_id, :telefoon, :wachtwoord);";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ':naam' => $naam, 
        ':voornaam' => $voornaam,
        ':email' => $email,
        ':straat' => $straat, 
        ':huisnummer' => $huisnummer, 
        ':woonplaats_id' => $woonplaats_id, 
        ':telefoon' => $telefoon, 
        ':wachtwoord' => $wachtwoord         
    ));


    $klantId = $dbh->lastInsertId();
    $dbh = null;

    $klant = new Klant(
        $$klantId,
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

    public function getEmail(string $email):bool{
        $exist = false;
        $sql = "SELECT * FROM klanten WHERE email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':email' => $email
        ));
        $rij = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $aantal = count($rij);
        if ($aantal > 0){
            $exist = true;
        }
        return $exist;

    }
    public function getUserByEmail(string $email, string $wachtwoord):?Klant{
        $sql = "SELECT * FROM klanten WHERE email = :email AND wachtwoord = :wachtwoord";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':email' => $email,
            ':wachtwoord' => $wachtwoord
        ));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($rij)){
            $klant = new Klant(
                $rij["id"],
                $rij["naam"],
                $rij["voornaam"],
                $rij["email"],
                $rij["straat"],
                $rij["huisnummer"],
                $rij["woonplaats_id"],
                $rij["telefoon"],
                $rij["wachtwoord"]
            );
            return $klant;
        }else{
            return null;
        }

    }

}
