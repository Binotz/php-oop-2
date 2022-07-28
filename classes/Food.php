<?php
    require_once __DIR__ . '/Product.php';

    class Food extends Product{
        public $weight; 

        public function __construct($_name, $_price, $_weight){
            $this->name = $_name;
            $this->price = $_price;
            $this->weight = $_weight;
        }
    }
?>
