<?php

//entities/Cart.php

class Cart {

        private static $idMap = array();

        private $id;
        private $products;

        private function __construct($id, $products) {
            $this->id = $id;
            $this->naam = $products;
        }

        public static function create($id, $products) {
            if (!isset(self::$idMap[$id])) {
                self::$idMap[$id] = new Cart($id, $products);
            }
            return self::$idMap[$id];
        }

        public function getProducts()
        {
            return $this->products;
        }

        public function addProduct(Product $product)
        {
            $this->products[] = $product;
        }


        public function getId()
        {
            return $this->id;
        }


        public function setId($id)
        {
            $this->id = $id;
        }

        


    }