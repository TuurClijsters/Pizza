<?php

// entities/Woonplaats.php


class Woonplaats {

    private static $idMap = array();
    
    private $id;
    private $plaats;
    private $postcode;

    private function __construct($id, $plaats, $postcode) {
        $this->id = $id;
        $this->plaats = $plaats;
        $this->postcode = $postcode;
    }

    public static function create($id, $plaats, $postcode) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Woonplaats($id, $plaats, $postcode);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getPlaats() {
        return $this->plaats;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPlaats($plaats) {
        $this->plaats = $plaats;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

}