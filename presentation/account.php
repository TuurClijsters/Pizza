<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<header class ="flex space">
        <div>
            <h1>PIZZA</h1>
        </div>
        <div class = "loginRegistreer flex">

        </div>

</header>

<main>

    <section class ="accountDetails column">

        <h1>Gegevens nodig voor je bestelling af te ronden.</h1>

        <h2 class ="titel">Ik heb een account</h2>

        <?php
        if (isset($loginError)) {
        ?>	
            <div class="error_message">
                <?php 
                    echo $loginError . "<br/>";
                ?>
            </div>
        <?php
        }
        ?>
        <!-- <button onclick="hebAccount()" class ="button" >Ik heb een account</button> -->
        <form method="post" action="accountController.php?action=login" class = "" id ="hebAccount">          
            <div class ="row">
                <label>Mail : </label>
                <input type ="text" name ="login_email" placeholder = "Vul je email in"  required>
            </div>
            <div class ="row">
                <label>Wachtwoord : </label>
                <input type = "password" name ="login_paswoord" placeholder ="Vul je wachtwoord in" required>
            </div>
            <input type="submit" value="LOGIN" class="btnAddAction color1" />   

        </form>

        <h2 class ="titel2">Ik heb geen account</h2>

        <?php
    if (!empty($checkError)) {
    ?>	
        <div class="error_message">
            <?php 
            foreach($checkError as $error) {
                echo $error . "<br/>";
            }
            ?>
        </div>
    <?php
    }
    ?>
<?php
if (!empty($checkMail)) {
?>	
    <div class="error_message">
        <?php 
        foreach($checkMail as $mailError) {
            echo $mailError . "<br/>";
        }
        ?>
    </div>
    <?php
    }
    ?>

        <!-- <button onclick="geenAccount()" class = "button" >Ik heb geen account</button> -->
        <form method="post" action="accountController.php?action=register" class = "" id ="geenAccount">          
            <div class ="row">
                <label>Naam : </label>
                <input type ="text" name ="registreer_naam" placeholder = "Vul je naam in"
                value ="<?php if(isset($_POST['registreer_naam'])) echo $_POST['registreer_naam']; ?>" required>
            </div>
            <div class ="row">
                <label>Voornaam : </label>
                <input type ="text" name ="registreer_voornaam" placeholder = "Vul je voornaam in" 
                value ="<?php if(isset($_POST['registreer_voornaam'])) echo $_POST['registreer_voornaam']; ?>"required>
            </div>
            <div class ="row">
                <label>Straatnaam : </label>
                <input type ="text" name ="registreer_straat" placeholder = "Vul je straat in"
                value ="<?php if(isset($_POST['registreer_straat'])) echo $_POST['registreer_straat']; ?>"required>
            </div>
            <div class ="row">
                <label>Huisnummer : </label>
                <input type ="number" name ="registreer_huisnummer" placeholder = "Vul je huisnummer in"
                value ="<?php if(isset($_POST['registreer_huisnummer'])) echo $_POST['registreer_huisnummer']; ?>"required>
            </div>
            <div class ="row">
                <label>Woonplaats : </label>
                <input type ="text" name ="registreer_plaats" placeholder = "Vul je woonplaats in"
                value ="<?php if(isset($_POST['registreer_plaats'])) echo $_POST['registreer_plaats']; ?>"required>
            </div>
            <div class ="row">
                <label>Postcode : </label>
                <input type ="number" name ="registreer_postcode" placeholder = "Vul je postcode in"
                value ="<?php if(isset($_POST['registreer_postcode'])) echo $_POST['registreer_postcode']; ?>"required>
            </div>
            <div class ="row">
                <label>Telefoonnummer : </label>
                <input type = "number" name ="registreer_telefoon" placeholder ="Vul je telefoonnummer in"
                value ="<?php if(isset($_POST['registreer_telefoon'])) echo $_POST['registreer_telefoon']; ?>"required>
            </div>
            <div class ="row">
                <label>Maak account :</label>
                <input type="checkbox" name="check" id='check' onclick="validate()">
            </div>

            <div class ="row hidden" id="mail">
                <label>Mail : </label>
                <input type ="text" name ="registreer_mail" placeholder = "Vul je mailadres in" class = "require"
                value ="<?php if(isset($_POST['registreer_mail'])) echo $_POST['registreer_mail']; ?>">
            </div>
            <div class ="row hidden" id="wachtwoord">
                <label>Wachtwoord : </label>
                <input type ="password" name ="registreer_wachtwoord" placeholder = "Vul je wachtwoord in" class = "require" >
            </div>
            <div class ="row hidden" id="herhaalwachtwoord">
                <label>Herhaal wachtwoord : </label>
                <input type ="password" name ="registreer_wachtwoord_confirm" placeholder = "Herhaal je wachtwoord" class = "require">
            </div>

            <input type="submit" value="GA VERDER" class="btnAddAction color2" id="verderKnop" /> 
            <input type="submit" value="REGISTREER" class="btnAddAction color2 hidden" id="registreer" /> 

        </form>

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

    <script type="text/javascript">


        var requires = document.querySelectorAll(".require");

        function validate() {
            if (document.getElementById('check').checked) {
                var element = document.getElementById("wachtwoord");
                element.classList.toggle("hidden");
                var element = document.getElementById("herhaalwachtwoord");
                element.classList.toggle("hidden");
                var element = document.getElementById("mail");
                element.classList.toggle("hidden");
                var element = document.getElementById("verderKnop");
                element.classList.toggle("hidden");
                var element = document.getElementById("registreer");
                element.classList.toggle("hidden");

                for (var i = 0; i < requires.length; i++) {
                requires[i].required = true;
                }
            }
            if(document.getElementById('check').checked === false) {
                var element = document.getElementById("wachtwoord");
                element.classList.add("hidden");
                var element = document.getElementById("herhaalwachtwoord");
                element.classList.add("hidden");
                var element = document.getElementById("mail");
                element.classList.add("hidden");
                var element = document.getElementById("verderKnop");
                element.classList.remove("hidden");
                var element = document.getElementById("registreer");
                element.classList.add("hidden");

                for (var i = 0; i < requires.length; i++) {
                requires[i].required = false;
                }
            }
        }
    </script>


    
</body> 
</html>