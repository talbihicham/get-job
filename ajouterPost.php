<?php 
session_start(); 

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetpfa;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO annonces(titre,contenu,date_annonce) VALUES (?,?,CURDATE()) ');
$req->execute(array($_POST['titre'],$_POST['contenu']));
header('Location: annoncesActuelles.php'); 
?>