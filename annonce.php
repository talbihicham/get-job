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
/////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_SESSION['groupe']))
{
?>
<!------------NavigationBar en html !!!!!!!------------->

<?php include("menuAdmin.php"); ?>

<!--------------------------------->
<?php
$req = $bdd->prepare('SELECT titre,contenu,date_annonce from annonces WHERE id=:id');
$req->execute(array('id' => $_GET['id']));
$resultat = $req->fetch();
echo '<h2>'.$resultat['titre'].'</h2>';
echo 'la date de l\'annonce:'.$resultat['date_annonce'].'<br />';
echo '<p>'.$resultat['contenu'].'</p>';
echo '<a href="supprimerAnnonce.php?id='.$_GET['id'].'"><button type="button" class="btn btn-success">supprimer</button></a>';


}
//////////////////////////////////////////////////////////////////////////////////////////

else 
{
	?>
<!------------NavigationBar en html !!!!!!!------------->

<?php include("menuVisiteur.php"); ?>

<!--------------------------------->
<?php

$req = $bdd->prepare('SELECT titre,contenu,date_annonce from annonces WHERE id=:id');
$req->execute(array('id' => $_GET['id']));
$resultat = $req->fetch();
echo '<h2>'.$resultat['titre'].'</h2>';
echo 'La date de l\'annonce :'.$resultat['date_annonce'].'<br />';
echo '<p>'.$resultat['contenu'].'</p>';
?>

<!------------formulaire de candidature--------------->
<form action="annoncePost.php?id_annonce=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
 

<!--- <div class="container">
    <h2>formulaire de candidature</h2>
    <p>Veuillez remplir ce formulaire postuler à ce poste.</p>
    <hr>
	
	<label for="nom"><b>NOM</b></label>
    <input type="text" placeholder="Entrer votre nom" name="nom" required><br />
	
	<label for="prenom"><b>PRENOM</b></label>
    <input type="text" placeholder="Entrer votre prenom" name="prenom" required><br />

    <label for="CV"><b>CURRICULUM VITAE</b></label>
    <input type="file" name="CV" /><br /> 
    
	<label for="lettre_motivation"><b>LETTRE DE MOTIVATION</b></label><br />
    <textarea name="lettre_motivation" rows="8" cols="45">entrez votre lettre de motivation ici.</textarea>

    
    <button type="submit" class="registerbtn">POSTULER</button>
  </div>--->



<div class="div1">
<form action="annoncePost.php?id_annonce=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">

<br>
<br>

<h3><b>Formulaire de candidature</b></h3>
<br>
<br>
    <p><h4>Veuillez remplir ce formulaire pour postuler à ce poste.</h4></p>
    <hr>

  <div class="form-group">
    <label for="nom"><b>Nom</b></label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer votre nom" name="nom" required><br />
  </div>

  <div class="form-group">
    <label for="prenom"><b>prenom</b></label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre prenom" name="prenom" required><br />
  </div>
<br>
<br>

  <label for="CV"><b>CURRICULUM VITAE    </b></label>
    <input type="file" name="CV" /><br />
	<p> (Attention ! le cv doit être sous format PDF) <p>
<br>
<br>

  <div class="form-group">
    <label for="lettre_motivation"><b>Lettre de motivation</b></label>
    <textarea class="form-control" name="lettre_motivation" rows="8" cols="45" placeholder="Ecrivez la lettre de motivation !"></textarea>
  </div

  <div>
   <button type="submit" class="btn btn-primary botona">Postuler</button>
  </div>
<br>
<br>
</form>

</div>












</form>

<?php 
}











 include("footerVisiteur.php"); ?>
</body>
</html>