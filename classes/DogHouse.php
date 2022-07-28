<?php
    require_once __DIR__ . '/Product.php';
    class DogHouse extends Product{
        public $size;
        public $color;

        public function __construct($_name, $_price, $_size){
            $this->name = $_name;
            $this->price = $_price;
            $this->size = $_size;
        }
    }
?>
