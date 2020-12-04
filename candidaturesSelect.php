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
?>
<!------------NavigationBar en html !!!!!!!------------->

<?php include("menuAdmin.php"); ?>

<!--------------------------------->

<Body style="background : url(razvan-chisu-Ua-agENjmI4-unsplash.jpg);  background-size : cover; background-attachment : fixed; -moz-filter : blur(10px); ">
<form style="border : none; shadow : 20px 20px 20px;">
<body>


<?php 
$req = $bdd->query('SELECT selection.id as id_select,nom,prenom,lettre_motivation,cv,date_entretien,candidatures.id as idcand
                      FROM selection INNER JOIN candidatures ON id_cand=candidatures.id');
while($resultat = $req->fetch())
{
	?>
<div class="div1">
<br>
<br>
	<p><strong>Nom:</strong>  <?php echo $resultat['nom'];?> <p>
	<p><strong>Prenom:</strong>  <?php echo $resultat['prenom'];?> <p>
	<p><strong>lettre de motivation: </strong>  <?php echo $resultat['lettre_motivation'];?> <p>
	<p><strong>Curriculum Vitae: </strong>  <a href="download.php?idcand=<?php echo $resultat['idcand'];?>"> Voir CV </a> <p>
	<p><strong>Date d'entretien: </strong>  <?php echo $resultat['date_entretien'];?> <p>
	
	 <a href="supprimerPost.php?id_select=<?php echo $resultat['id_select'];?>"><button type="button" class="btn btn-success botona">supprimer</button></a>
	
	<hr>
</div>	
<?php
}






 include("footerAdmin.php"); ?>
</body>
</html>