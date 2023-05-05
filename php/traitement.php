<?php
require "./bdd.php";
$idUser = $_SESSION['id'];

$recupUser = $bdd->prepare("SELECT * FROM favoris WHERE id_utilisateur = ?");
$recupUser->execute([$idUser]);
$result = $recupUser->fetchAll(PDO::FETCH_ASSOC);
$resultJson = json_encode($result);
echo $resultJson;
?>