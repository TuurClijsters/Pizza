<?php

//entities/Klant.php

class Klant {

        // private static $idMap = array();

        private $id;
        private $naam;
        private $voornaam;
        private $email;
        private $straat;
        private $huisnummer;
        private $woonplaats_id;
        private $telefoon;
        private $wachtwoord;

        public function __construct($id, $naam,$voornaam, $email, $straat,$huisnummer,$woonplaats_id,$telefoon,$wachtwoord) {
            $this->id = $id;
            $this->naam = $naam;
            $this->voornaam = $voornaam;
            $this->email = $email;
            $this->straat = $straat;
            $this->huisnummer = $huisnummer;
            $this->woonplaats_id = $woonplaats_id;
            $this->telefoon = $telefoon;
            $this->wachtwoord = $wachtwoord;
        }

        // public static function create($id, $naam, $voornaam, $email, $straat, $huisnummer, $woonplaats_id, $telefoon, $wachtwoord) {
        //     if (!isset(self::$idMap[$id])) {
        //         self::$idMap[$id] = new Klant($id, $naam, $voornaam, $email, $straat, $huisnummer, $woonplaats_id, $telefoon, $wachtwoord);
        //     }
        //     return self::$idMap[$id];
        // }

        public function getId()
        {
            return $this->id;
        }
        public function getNaam()
        {
            return $this->naam;
        }
        public function getVoornaam()
        {
            return $this->voornaam;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getStraat()
        {
            return $this->straat;
        }
        public function getHuisnummer()
        {
            return $this->huisnummer;
        }
        public function getWoonplaats_id()
        {
            return $this->woonplaats_id;
        }
        public function getTelefoon()
        {
            return $this->telefoon;
        }
        public function getWachtwoord()
        {
            return $this->wachtwoord;
        }


        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNaam($naam)
        {
            $this->naam = $naam;
        }
        public function setVoornaam($voornaam)
        {
            $this->voornaam = $voornaam;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setStraat($straat)
        {
            $this->straat = $straat;
        }
        public function setHuisnummer($huisnummer)
        {
            $this->huisnummer = $huisnummer;
        }
        public function setWoonplaats_id($woonplaats_id)
        {
            $this->woonplaats_id = $woonplaats_id;
        }
        public function setTelefoon($telefoon)
        {
            $this->telefoon = $telefoon;
        }
        public function setWachtwoord($wachtwoord)
        {
            $this->wachtwoord = $wachtwoord;
        }

    }