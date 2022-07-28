<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        require_once __DIR__ . '/classes/Food.php';
        require_once __DIR__ . '/classes/DogHouse.php';


        
        $crocchette = new Food('Crocchette', 10, 20);
        $cuccia = new DogHouse('Cuccia', 20, 'Grande');
        var_dump($crocchette);
        var_dump($cuccia);
    ?>

</body>
</html>
