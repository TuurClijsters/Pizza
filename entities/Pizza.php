<?php

//entities/Pizza.php


class Pizza {

    private static $idMap = array();
    
    private $id;
    private $naam;
    private $prijs;

    private function __construct($id, $naam, $prijs) {
        $this->id = $id;
        $this->naam = $naam;
        $this->prijs = $prijs;
    }

    public static function create($id, $naam, $prijs) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Pizza($id, $naam, $prijs);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }

}