<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" />
    <title>Tchat</title>
</head>
<body>
    <div class="messagerie">
    <?php
    //La session sera utile pour afficher les erreurs
    session_start();

    //Dans le cas où y a une valeur dans l'index alerte
    //On fera afficher le message
    if(isset($_SESSION['alerte']))
        echo $_SESSION['alerte'];

    //Charge le fichier showMessage qui consiste à faire afficher les messages
    require_once("showMessage.php");
    ?>
    </div>

    <div id="formulaire">
    <form method="post" action="createMessage.php">
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo">
        <label for="message">Votre message:</label>
        <textarea id="message" name="message"></textarea>
        <input type="submit" value="Valider">
    </form>
    </div>
</body>
</html>