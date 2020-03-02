<?php

//verwijderpizza.php

require_once ("business/PizzaService.php");
require_once ("business/CartItemService.php");


session_start();

$pizzaSvc =  new PizzaService();
$cartItemSvc =  new CartItemService();

if (isset($_GET["action"]) && $_GET["action"] == "delete") {

    $cartItemSvc->deleteCartItem();
}

header("location: homecontroller.php");