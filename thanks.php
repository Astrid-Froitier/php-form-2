<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks page</title>
</head>
<body>
<div>
    Merci <?= $_SESSION['lastname']?> <?= $_SESSION['firstname']?>  de nous avoir contacté à propos de votre destination : <?= $_SESSION['object'] ?>.
    Un de nos conseiller vous contactera soit à l’adresse <?= $_SESSION['mail']?> ou par téléphone au <?= $_SESSION['number'] ?> dans les plus brefs délais pour traiter votre demande : 
    <?= $_SESSION['message'] ?> 
</div>
</body>
</html>