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

<h1>Login</h1>

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

<form method="post" action="loginController.php?action=login" >

    <div class ="row">
        <label>Mail : </label>
        <input type ="text" name ="login_email" placeholder = "Vul je email in"  required>
    </div>
    <div class ="row">
        <label>Wachtwoord : </label>
        <input type = "text" name ="login_paswoord" placeholder ="Vul je wachtwoord in" required>
    </div>

    <input type="submit" value="LOGIN" class="btnAddAction" />     

</form>


<a href = "homeController.php">Terug naar Home</a>
    
</body>
</html>