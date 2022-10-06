<?php 
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (!isset($_POST['lastname']) || trim($_POST['lastname']) === '') 
    ? $errors[] = 'Your lastname is required'
    : $_SESSION['lastname'] = $_POST['lastname'];
    (!isset($_POST['firstname']) || trim($_POST['firstname']) === '')
    ? $errors[] = 'Your firstname is required'
    : $_SESSION['firstname'] = $_POST['firstname'];
    (!isset($_POST['mail']) || trim($_POST['mail']) === '' || filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
    ? $errors[] = 'Your email is required'
    : $_SESSION['mail'] = $_POST['mail'];
    // if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
    (!isset($_POST['number']) || trim($_POST['number']) === '')
    ? $errors[] = 'Your phone number is required'
    : $_SESSION['number'] = $_POST['number'];
    (!isset($_POST['object']) || htmlentities($_POST['object']) === '')
    ? $errors[] = 'Select a destination'
    : $_SESSION['object'] = $_POST['object'];    
    (!isset($_POST['message']) || trim($_POST['message']) === '')
    ? $errors[] = 'We need to have informations to help you'
    : $_SESSION['message'] = $_POST['message'];

    if(empty($errors)){
        header('Location:thanks.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Form page</title>
  </head>
  <body>
    <form action='form.php' method="post"> 

    <?php // Affichage des éventuelles erreurs 
         if (count($errors) > 0) : ?>

                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
    <?php endif; ?>
   
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" minlength="3"
maxlength="20">
        </div>
        <div>
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" minlength="3"
maxlength="20" >
        </div>
        <div>
            <label for="mail">e-mail&nbsp;:</label>
            <input type="email" id="mail" name="mail" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$" >
        </div>
        <div>
            <label for="number">Téléphone :</label>
            <input type="tel" id="phoneNumber" name="number" pattern="[-+]?[0-9]*[.,]?[0-9]+" >
        </div>
        <div>
            <label for="object_selection">Objet :</label>
            <select name="object" id="object">
                <option value="">Destinations</option>
                <option value="Canada">Canada</option>    
                <option value="USA">USA</option>
                <option value="France">France</option>
                <option value="Germany">Allemagne</option>
            </select>
        </div>
        <div>
            <label for="msg">Message :</label>
            <textarea id="msg" name="message"></textarea>
        </div>
        <div class="button">
            <button type="submit">Envoyer le message</button>
        </div>
    </form>
  </body>
</html>