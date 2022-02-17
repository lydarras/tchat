<?php

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

//Le header permet de rediriger vers la page index et en théorie, le message est inséré
header('Location: index.php');

?>