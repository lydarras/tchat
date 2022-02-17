<?php
session_start();
echo "Pseudo : ".$_POST['pseudo']."<br/>";
echo "Message ".$_POST['message']."<br/>";
echo strlen(trim($_POST['message']));

//condition pour assurer si les saisies sont vides ou non
if(!empty($_POST['pseudo']) && strlen(trim($_POST['message'])) != 0){

//Connexion de la BDD
    require_once("connexionPDO.php");

    //La reqûete SQL pour insérer
    $requete = "INSERT INTO message(id_message, pseudo, message, date_enregistrement) VALUES (NULL,:pseudo,:message,NOW())";

    //Le statement permet d'abord de préparer la reqûete
    //le : est un marqueur nominatif pour assigner la variable
    $stmt = $pdo->prepare($requete);

    //le bindParam permet d'affecter le marqueur nominatif, les valeurs POST qui sont censés d'être saisies
    $stmt->bindParam(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
    $stmt->bindParam(':message',$_POST['message'], PDO::PARAM_STR);

    //Une fois affecté les, la reqûete d'insertion sera executé
    $stmt->execute();

    //Si l'utilisateur n'a fait aucun saisi précédemment ou sur l'un des deux
    //Dans le cas où toutes les conditions sont remplies, on peur retirer le message d'alerte
    if(isset($_SESSION['alerte'])){
        unset($_SESSION['alerte']);
    }

    //Le header permet de rediriger vers la page index et en théorie, le message est inséré
    header('Location: index.php');
}
else{
    //fera affiche le message  alerte quand on sera redirigé vers l'index
    $_SESSION['alerte'] = "Priez de remplir toutes les champs !<br/>";
    header('Location: index.php');
}


?>