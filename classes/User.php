<?php 

    class User{
        public $name;
        public $lastName;
        public $email;
        public $isRegistered;
        public $discount = 0;
        protected $cart = [];

        public function __construct($_name, $_lastName, $_email, $_isRegistered){
            $this->name = $_name;
            $this->lastName = $_lastName;
            $this->email = $_email;
            $this->isRegistered = $_isRegistered;
            //If logged, discount is set to 20%
            if($_isRegistered){
                $this->discount = 20;
            }
        }

        public function getCart(){
            return $this->cart;
        }

        public function addToCart($product){
            $this->cart[] = $product;
        }
    }

?>
