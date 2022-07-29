<?php

    require_once __DIR__ . '/Product.php';
    require_once __DIR__ . '/ForTraining.php';

    class Toy extends Product{
        use ForTraining;    
    }

?>
