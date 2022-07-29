<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
    <?php

        require_once __DIR__ . '/classes/Food.php';
        require_once __DIR__ . '/classes/DogHouse.php';
        require_once __DIR__ . '/classes/User.php';
        require_once __DIR__ . '/classes/Toy.php';


        $food = new Food('Crocchette', 10, 20);
        $food->description="Buonissime";

        $dogHouse = new DogHouse('Cuccia', 20, 'Grande');

        $toy = new Toy('Pallina', 5);
        $toy->isForTraining = true;

        $loggedUser = new User('Riccardo', 'Binotto', 'riccardo@email.it', true);
        $AnonUser = new User('Mister-X', 'Non lo so', 'test@mail.it', false);

        
        $loggedUser->addToCart($food);
        $loggedUser->addToCart($dogHouse);
        $loggedUser->setBalance(1000000);
        
        $AnonUser->addToCart($toy);
        $AnonUser->setBalance(1);
        
        $listOfProducts = [$food, $dogHouse, $toy];
        $listOfUsers = [$loggedUser, $AnonUser];
    ?>
    <main>
        <div class="container">
            <!-- List of products -->
            <div class="products">
                <h2>Prodotti</h2>
                <?php foreach($listOfProducts as $product) {?>                
                    <div class="product-layout">
                        <div class="product-content">
                            <div class="name">Nome: <?php echo $product->name;?></div>
                            <div class="price">Prezzo: <?php echo $product->price;?> &euro;</div>
                            <?php if ($product->description !== ''){ echo '<div class="description">Descrizione: ' . $product->description . '</div>';}?>
                            <?php if ($product instanceof Toy && $product->isForTraining){ echo '<div class="training">Categoria: Gioco per allenamento</div>';}?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="users-cart">
                <h2>Carrello utenti:</h2>
                <?php foreach($listOfUsers as $user) {?>                
                    <div class="user-cart-layout">
                        <div class="user-cart-content">
                            <div class="user-name">Nome Utente: <?php echo $user->name;?></div>
                            <div class="user-balance">Saldo: <?php echo $user->getBalance();?> &euro;</div>
                            <?php foreach($user->getCart() as $product) { ?>
                                    <div class="cart-product-name">Nome Prodotto: <?php echo $product->name; ?></div>
                                    <div class="user-price">Prezzo <?php if ($user->isRegistered){ echo 'scontato a ';}?>: <?php echo $product->price ?> &euro;</div>
                            <?php } ?>
                            
                        </div>
                        <h3><?php 
                                    try{
                                        if($user->doYouHaveEnoughMoney()){
                                            echo $user->name . ', Hai abbastanza soldi per comprare le cose';
                                        }
                                    }catch(Exception $err){
                                        echo $user->name . ', non hai abbastanza soldi per comprare le cose';
                                    } 
                                        ?></h3>                                     
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>
