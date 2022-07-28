<?php

    class Product{
        public $name;
        public $description;
        public $price;

        public function __construct($_name, $_price){
            $this->name = $_name;
            $this->price = $_price;
        }
    }

?>
