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



<!------------formulaire de candidature--------------->
   <form action="ajouterPost.php" method="post" enctype="multipart/form-data">
<!----  <div class="container">
	
	<label for="titre"><b>TITRE DE L'ANNONCE</b></label>
    <input type="text" placeholder="Entrez le titre ici" name="titre" required><br />
    
	<label for="contenu"><b>CONTENU DE L'ANNONCE</b></label><br />
    <textarea name="contenu" rows="8" cols="45">entrez le contenu de l'annonce ici.</textarea>

    
    <button type="submit" class="registerbtn">Enregistrer</button>
  </div>
</form>---->



<div class="div1">
<div class="form-group">
<br>
<br>
    <label for="nom"><b>TITRE DE L'ANNONCE</b></label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le titre de l'annonce" name="titre" required><br />
  </div>

  
<br>
<br>

  

  <div class="form-group">
    <label for="lettre_motivation"><b>LE CONTENU DE L'ANNONCE</b></label>
    <textarea class="form-control" name="contenu" rows="8" cols="45" placeholder="Ecrivez le contenu de l'annonce ici !"></textarea>
  </div

  <div>
   <button type="submit" class="btn btn-success botona">Enregistrer</button>
  </div>
<br>
<br>
</div>











<?php include("footerAdmin.php"); ?>
</body>
</html>