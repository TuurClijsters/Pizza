<?php

//Data/PizzaDAO.php

require_once 'DBConfig.php';
require_once 'entities/Pizza.php';

class PizzaDAO {

    public function getById($id) {
        $sql = "SELECT * FROM producten where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $pizza = Pizza::create($rij["id"], $rij["naam"], $rij["prijs"]);
        $dbh = null;
        return $pizza;
    }

    public function getAll() {
        $sql = "SELECT * FROM producten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $pizza = Pizza::create($rij["id"], $rij["naam"], $rij["prijs"]);
            array_push($lijst, $pizza);
        }
        $dbh = null;
        return $lijst;
    }

}