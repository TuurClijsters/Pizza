<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        .totaalprijs{
            font-weight:bold;
            font-size:18px;
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
            <div>
                <form action = "loginController.php">
                    <input type="submit" value="Login" class="button" id="loginButton" />
                </form>
            </div>

            <div>
                <form action = "registreerController.php">
                    <input type="submit" value="Registreer" class="button" id="registerButton"/>
                </form>
            </div>
            <div>
                <form action = "logoutController.php">
                    <input type="submit" value="Uitloggen" class="button" id="logoutButton" />
                </form>
            </div>
        </div>

    </header>

    <main>
        <section class ="pizzaOverzicht">

            <?php
            if(isset($_SESSION['klant'])){
                echo "<h1> Dag ";
                print($klantGegevens->getNaam());
                echo " ";
                print($klantGegevens->getVoornaam());
                echo "</h1>";
            }
            ?>
            
            <h1>Overzicht</h1>

            <?php
                foreach ($pizzaLijst as $pizza) {
            ?>
                <form method="post" action="homeController.php?action=add" class = 'pizzaItem'>
                    
                    <div class = 'pizzaNaam'><?php print($pizza->getNaam()); ?>
                    </div >
                    <div class = "pizzaPrijs">€ <?php print($pizza->getPrijs()); ?>
                    </div >
                    <input type="number" name="quantity" placeholder = "Aantal" value ="1" min ="1">
                    <input type="hidden" name="product_id" value="<?php echo($pizza->getId())?>">
                    <input type="submit" value="Add to Cart" class="btnAddAction" />     
                </form>

            <?php
            }
            ?>
           

        </section>

        <section class = "winkelmand">

        <h1>Winkelmandje</h1>
             

        <?php
        if (!empty($_SESSION['winkelmand'])){
            $cartItems = ($_SESSION['winkelmand']);
            $totaalprijs = 0;
        ?>

            <?php
                foreach ($cartItems as $cartItem) {
            ?>   
                <form method="post" action="verwijderpizza.php?action=delete" class = "formclass">  

                    <div class = "pizzaOrder flex justify">
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
                    <input type="hidden" name="remove_id" value="<?php echo($cartItem->getId())?>">
                    <input type="submit" value="Verwijder" class = "verwijderen"/> 

                    <?php
                        $totaalprijs = $totaalprijs +($cartItem->getPizza()->getPrijs())*($cartItem->getQuantity());
                    ?>

                </form>
            <?php
            }
        }
        ?>

        <div class = 'afreken'>
        <?php
            if (empty($_SESSION['winkelmand'])){
                print ("Geen items in winkelmandje");
            } else{
                print('<div class="totaalprijs">Totaalprijs : €' . $totaalprijs . '</div>');
                

                print('<form method="post" action="accountController.php">
                <input type = "submit" value="Afrekenen" class ="afrekenen">');
            }
        ?>
        </div>


        </section>

        <?php
            if(!empty($errors)){
                foreach($errors as $error){
                    print $error;
                }
            }
        ?>
    </main>

    <script type="text/javascript">

            <?php if(isset($_SESSION['klant'])) : ?>
                document.getElementById("loginButton").style.display = "none";
                document.getElementById("registerButton").style.display = "none";
                document.getElementById("logoutButton").style.display = "block";
            <?php else : ?>
                document.getElementById("loginButton").style.display = "block";
                document.getElementById("registerButton").style.display = "block";
                document.getElementById("logoutButton").style.display = "none";
            <?php endif; ?>

    </script>




    </script>
    
</body>
</html>