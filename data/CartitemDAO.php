<?php

//Data/CartItemDAO.php

require_once 'DBConfig.php';
require_once 'entities/CartItem.php';
require_once 'PizzaDAO.php';

class CartItemDAO{

    // public function createCartItem($pizzaId, $quantity) {
    //     // $sql = "insert into mvc_boeken (titel, genre_id)
    //     // values (:titel, :genreId)";
    //     // $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,
    //     // DBConfig::$DB_PASSWORD);
    //     // $stmt = $dbh->prepare($sql);
    //     // $stmt->execute(array(':titel' => $titel, ':genreId' => $genreId));
    //     // $boekId = $dbh->lastInsertId();
    //     // $dbh = null;
    //     $pizzaDAO = new PizzaDAO();
    //     $pizza = $pizzaDAO->getById($pizzaId);
    //     $cartItem = CartItem::create($Id, $pizza, $quantity);
    //     return $cartItem;
    // }

}

// public function createCartItem() {
//     $sql = "insert into mvc_boeken (titel, genre_id)
//     values (:titel, :genreId)";
//     $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,
//     DBConfig::$DB_PASSWORD);
//     $stmt = $dbh->prepare($sql);
//     $stmt->execute(array(':titel' => $titel, ':genreId' => $genreId));
//     $boekId = $dbh->lastInsertId();
//     $dbh = null;
//     // $genreDAO = new GenreDAO();
//     // $genre = $genreDAO->getById($genreId);
//     // $boek = Boek::create($boekId, $titel, $genre);
//     return $boek;
// }

