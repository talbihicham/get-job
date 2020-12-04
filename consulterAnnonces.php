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

<?php include("menuVisiteur.php"); ?>

<!--------------------------------->

<Body style="background : url(header-image.jpg);  background-size : cover; background-attachment : fixed; -moz-filter : blur(10px); ">
<form style="border : none; shadow : 20px 20px 20px;">
<div style="border : none;">
<body>
  <section>

<?php 
if(!isset($_SESSION['id'])) //le visiteur doit se connecter d'abord
{
?>
<br>
<br>
<br>
     <div class="div1">
	  <div class="alert alert-danger" role="alert">
            <?php  echo '<p strong>vous devez se connecter si vous avez déjà un compte dans notre site, sinon vous devez s\'inscrire';?>
          </div>






       <div class="carousel-caption">
	    <a href="s'inscrire.php"><button type="button" class="btn btn-primary botona">S'inscrire</button></a>
<br>
<br>

        <a href="seConnecter.php"><button type="button" class="btn btn-success botona">Se connecter</button></a>
       </div>

     </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</section>
<?php
 include("footerVisiteur.php"); 
}
else 
{
?>



<!---<h2> Les annonces </h2>---->
<pre>
<br>
<br>
</pre>

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
<br>
<br>                       
                      
<div class="div1">                       
<div class="card carta" style="width: 50rem;">
  <div class="card-header">
    <h3> Annonce </h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $donnees['titre']; ?></h5>
    <p class="card-text">Consulter l'annonce pour voir les details et pouvoir postuler.</p>
    <a href="annonce.php?id=<?php echo $donnees['id']; ?>" class="btn btn-primary">Consulter</a>
  </div>
</div>
<br>








                        
                         
 

</div>
</section>                       
<?php
                }
 include("footerAdmin.php"); 	
}		
?>


  



</div>


				
</body>



</html>

<!----  <?php include("footerVisiteur.php"); ?> ----->



















