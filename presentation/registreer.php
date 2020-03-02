<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>

</style>
<body>

<h1>Registratie</h1>

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

<form method="post" action="registreerController.php?action=registreer" class = 'registratieForm'>
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
        <label>Mail : </label>
        <input type ="text" name ="registreer_mail" placeholder = "Vul je mailadres in"
        value ="<?php if(isset($_POST['registreer_mail'])) echo $_POST['registreer_mail']; ?>"required>
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
        <label>Wachtwoord : </label>
        <input type ="password" name ="registreer_wachtwoord" placeholder = "Vul je wachtwoord in" required>
    </div>
    <div class ="row">
        <label>Herhaal wachtwoord : </label>
        <input type ="password" name ="registreer_wachtwoord_confirm" placeholder = "Herhaal je wachtwoord" required>
    </div>

    <input type="submit" value="REGISTREER" class="btnAddAction" />     

</form>

<a href = "homeController.php">Terug naar Home</a>
    
</body>
</html>