<?php

//Business/BoekService.php

require_once 'data/PizzaDAO.php';


class PizzaService {

    public function haalPizzaOp($id) {
        $pizzaDAO = new PizzaDAO();
        $pizza = $pizzaDAO->getById($id);
        return $pizza;
    }
    
    public function getPizzaOverzicht() {
        $pizzaDAO = new PizzaDAO();
        $lijst = $pizzaDAO->getAll();
        return $lijst;
    }

    // public function voegNieuwBoekToe($titel, $genreId) {
    //     $boekDAO = new BoekDAO();
    //     $boekDAO->create($titel, $genreId);
    // }

    // public function verwijderBoek($id) {
    //     $boekDAO = new BoekDAO();
    //     $boekDAO->delete($id);
    // }

    // public function updateBoek($id, $titel, $genreId) {
    //     $genreDAO = new GenreDAO();
    //     $boekDAO = new BoekDAO();
    //     $genre = $genreDAO->getById($genreId);
    //     $boek = $boekDAO->getById($id);
    //     $boek->setTitel($titel);
    //     $boek->setGenre($genre);
    //     $boekDAO->update($boek);
    // }

}