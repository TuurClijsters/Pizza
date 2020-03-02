<?php

//homeController.php

require_once ("entities/CartItem.php");
require_once ("business/PizzaService.php");
require_once ("business/CartItemService.php");
require_once ("business/KlantService.php");

session_start();

$pizzaSvc =  new PizzaService();
$cartItemSvc =  new CartItemService();
$pizzaLijst = $pizzaSvc->getPizzaOverzicht();


if(isset($_SESSION['klant'])){ 
    $klant = $_SESSION['klant'];
    $klantGegevens = unserialize($klant);
}



if (isset($_GET["action"]) && $_GET["action"] == "add") {

    $product_id = (int)$_POST['product_id'];
    $product_quantity = (int)$_POST['quantity'];

    if(!isset($_SESSION['winkelmand'])) {
        $_SESSION['winkelmand'] = array();
    }

    if(isset($_SESSION['winkelmand'])){

        $errors = array();
        $product_id = (int)$_POST['product_id'];
        $product_quantity = (int)$_POST['quantity'];

        if ($product_quantity <= 0){
            $errorMessage[] = 'Ongeldig aantal';
            array_push($errors, $errorMessage);

            // header("location: homeController.php?error=titelbestaat");
 
        }else{

            $winkelmandItem = $cartItemSvc->createCartItem($product_id, $product_quantity);

            // prepare once
            $cartItems = $_SESSION['winkelmand'];
            foreach ($cartItems as $cartItem) {
                $cartItems[$cartItem->getId()] = $cartItem;
            }
            // lookup often
            if (isset($cartItems[$product_id])) {

                // print("Product al in winkelmand");
                $ok = $cartItems[$product_id];
                $aantal = $cartItems[$product_id]->getQuantity();
            
                $ok->setQuantity($aantal + $product_quantity);
                //$e = $ok->verhoogAantal($product_quantity);

            }else{
                array_push($_SESSION['winkelmand'],$winkelmandItem);
            }

        }
    }
}
// unset($_SESSION['winkelmand']);
include("presentation/home.php");


