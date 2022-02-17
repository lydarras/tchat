<?php

//Connexion de la BDD
require_once("connexionPDO.php");

//Requête pour faire afficher les messages
$requete = "SELECT * FROM message";
$stmt = $pdo->query($requete);
$listeMessages = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Le tableau de mois pour avoir le mois en français (par défaut en anglais)
$mois = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
//date n permet d'avoir le mois le chiffre (ex : Janvier = 1)
$nbMois = date("n");

//compte le nombre de messages
echo $stmt->rowCount()." messages jusque là !<br/>";

//Une boucle pour retourner toutes les messages
foreach($listeMessages as $message){

    /*
    Pour afficher la date et l'heure, $date sera concatené :
    - $date("d") pour récupérer le jour
    - $mois pour récupérer le mois en chiffre mais à ajouter un -1 comme le tableau commence par 0
    - $message['date_enregistrement'] = AAAA-MM-JJ HH-MM-SS
    - Y pour récupérer l'année, H pour l'heure, i pour minute et s pour seconde
    */
    $date = date("d")." ".$mois[$nbMois-1].date(" Y H:i:s",strtotime($message['date_enregistrement']));

    //Un code HTML pour afficher le message
    //date heure Pseudo : (en gras) message
    echo "<p>".$date." <span id='pseudo'>".$message['pseudo']." : </span>".$message['message']."</p>";
}

?>