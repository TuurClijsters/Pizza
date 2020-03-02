<?php

//Business/CartItemService.php
require_once 'entities/Pizza.php';
require_once 'entities/CartItem.php';
require_once 'data/PizzaDAO.php';
require_once 'data/CartItemDAO.php';


class CartItemService {

    public function checkQuantity($aantal):bool{

        $valid = true;

        if($aantal <= 0){
            $valid = false;
        }else{
            $valid = true;
        }
        return $valid;
    }

    public function createCartItem($id, $aantal):CartItem{
        $pizzaDAO = new PizzaDAO();
        //$cartItemDAO = new CartItemDAO();
        $pizza = $pizzaDAO->getById($id);
        $cartItem = CartItem::create($id, $pizza, $aantal);
        return $cartItem;
    }


    public function addToCart($id, $aantal){

        if(!isset($_SESSION['winkelmand'])) {
            $_SESSION['winkelmand'] = array();
        }
        if(isset($_SESSION['winkelmand'])){

            $cartItem = $this->createCartItem($id, $aantal);
            array_push($_SESSION['winkelmand'],$cartItem);
        }
    }

    

    public function deleteCartItem(){

        if(isset($_SESSION['winkelmand'])) {

            $remove_id = $_POST['remove_id'];

            foreach($_SESSION['winkelmand'] as $key=>$value){
                $pizzaId = $value->getId();
                if ($remove_id == $pizzaId){
                    unset($_SESSION['winkelmand'][$key]);
                }
            }
        }

    }
}