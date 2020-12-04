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

<Body style="background : url(claudio-schwarz-purzlbaum-HUROgx3BSq4-unsplash.jpg);  background-size : cover; background-attachment : fixed; -moz-filter : blur(10px); ">
<form style="border : none; shadow : 20px 20px 20px;">
<body>




<!---<h2> liste des annonces </h2>--->
<br>
<br>
<br>
<br>
<br>


<?php
$req = $bdd->query('SELECT titre,id from annonces' );
	while ($donnees = $req->fetch())
		{?>

			
                      
                       
                       <!---- <div class="card" style="width: 50rem;">
                        <img src="624.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $donnees['titre']; ?></h5>
                          <p class="card-text">Consulter l'annonce pour voir les details et pouvoir postuler.</p>
                          <a href="annonce.php?id='.$donnees['id'].'" class="btn btn-primary">Consulter</a>
                        </div>
                        </div>--->
                       
                      
<div class="div1">                       
<div class="card carta" style="width: 50rem;">
  <div class="card-header">
    <h4> Annonce </h4>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $donnees['titre']; ?></h5>
    <p class="card-text">Consulter pour voir les details de l'annonce.</p>
    <a href="annonce.php?id=<?php echo $donnees['id']; ?>" class="btn btn-primary">Consulter</a>
  </div>
</div>
<br>
<br>
</div>






                        
                         
 


                       
<?php
                }	
		



  




 include("footerAdmin.php"); ?>				
</body>
</html>