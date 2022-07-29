<?php 

    class User{
        public $name;
        public $lastName;
        public $email;
        public $isRegistered;
        public $discount = 0;
        protected $cart = [];
        protected $balance = 0;

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
            $currentProduct = clone $product;
            //apply the discount as soon as the product is added to the cart
            $currentProduct->price -= ($currentProduct->price * $this->discount)/100;
            $this->cart[] = $currentProduct;
        }

        public function setBalance($bigMoney){
            $this->balance = $bigMoney;
        }
        public function getBalance(){
            return $this->balance;
        }

        public function doYouHaveEnoughMoney(){
            $cartTotalPrice = 0;
            foreach($this->cart as $product){
                $cartTotalPrice += $product->price;
            }
            // if($this->balance > $cartTotalPrice){
            //     return true;
            // }
            // return false;
            if($this->balance > $cartTotalPrice){
                return true;
            } else {
                throw new Exception("Utente: $this->name: Saldo non disponibile sulla carta");
            }
        }
    }

?>
