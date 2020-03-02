<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .gegevens{
            margin:5px;
        }
    </style>
</head>
<body>
<header class ="flex space">
        <div>
            <h1>PIZZA</h1>
        </div>
        <div class = "loginRegistreer flex">

        </div>

</header>
    <h1>Overzicht van je bestelling</h1>

    <main>


        <section class ="overzichtGegevens column">
        <form method="post" action="accountController.php?action=register" class = "" id ="geenAccount">          
            <div class ="row">
                <label>Naam : </label>
                <div><?php  print($klantGegevens->getNaam()); ?></div>

            </div>
            <div class ="row">
                <label>Voornaam : </label>
                <div><?php  print($klantGegevens->getVoornaam()); ?></div>
            </div>
            <div class ="row">
                <label>Straatnaam : </label>
                <div><?php  print($klantGegevens->getStraat()); ?></div>
            </div>
            <div class ="row">
                <label>Huisnummer : </label>
                <div><?php  print($klantGegevens->getHuisnummer()); ?></div>
            </div>




            <input type="submit" value="REGISTREER" class="btnAddAction color2 hidden" id="registreer" /> 

        </form>
                <?php
                    // print_r($klantGegevens);
                ?>


        
        </section>

        <section class ="winkelmand">
            <h1>Winkelmandje</h1>
            <?php
                if (!empty($_SESSION['winkelmand'])){
                    $cartItems = ($_SESSION['winkelmand']);
                    $totaalprijs = 0;
                ?>
                    <?php
                        foreach ($cartItems as $cartItem) {
                    ?>   
                        <div class = "pizzaOrder formclass flex justify">
                            <div class = 'pizzaNaam'>
                                    <?php
                                        print($cartItem->getPizza()->getNaam());
                                    ?>
                            </div >
                            <div class = ''>
                                    <?php
                                        print('x' . $cartItem->getQuantity());
                                    ?>
                            </div >
                            <div class = ''>
                                    <?php
                                        print("€" . ($cartItem->getPizza()->getPrijs())*($cartItem->getQuantity()));
                                    ?>
                            </div >
                        </div>
                        <?php
                            $totaalprijs = $totaalprijs +($cartItem->getPizza()->getPrijs())*($cartItem->getQuantity());
                        ?>
                    <?php
                    }
                    print('<div class="totaalprijs">Totaalprijs : €' . $totaalprijs . '</div>');
                    print('<div class="wijzig"><a href="homeController.php">Wijzig winkelmandje</a></div>');

                }
                ?>

        </section>
    </main>
</body>
</html>