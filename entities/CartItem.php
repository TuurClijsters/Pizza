<?php

//entities/CartItem.php

class CartItem {

    private static $idMap = array();

    private $id;
    private $pizza;
    private $quantity;
 
    public function __construct($id,$pizza,$quantity) {
        $this->id = $id;
        $this->pizza = $pizza;
        $this->quantity = $quantity;
    }

    public static function create($id,$pizza, $quantity) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new CartItem($id, $pizza, $quantity);
        }
        return self::$idMap[$id];
    }
 
    public function getId() {
        return $this->id;
    }

    public function getPizza(){ 
        return $this->pizza; 
    }
 
    public function getQuantity() {
        return $this->quantity;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPizza($pizza) {
        $this->genre = $pizza;
   }
 
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // public function verhoogAantal($aantal){
    //     if($aantal <= 0) {
    //         throw new NegatiefAantalException();
    //     }
    //     else {
    //     $this->quantity += $aantal;
    //     }
    // }
 
}
?>
