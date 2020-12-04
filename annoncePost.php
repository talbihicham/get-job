<?php 

session_start();  
?>
<!------------NavigationBar en html !!!!!!!------------->

<?php include("menuVisiteur.php"); ?>

<!--------------------------------->
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetpfa;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Vérification de la validité des informations
if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['lettre_motivation']))
{
	$nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
	$lettre_motivation=htmlspecialchars($_POST['lettre_motivation']);
	$id_annonce=htmlspecialchars($_GET['id_annonce']);

	// Testons si le fichier qui contient le cv a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['CV']) AND $_FILES['CV']['error'] == 0)
		{
			// Testons si le fichier n'est pas trop gros
            if ($_FILES['CV']['size'] <= 5000000)
            {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['CV']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('pdf');
                if (in_array($extension_upload, $extensions_autorisees))
                {
					$chemin='uploads/'.$_SESSION['user_name'].'.'.$extension_upload;
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['CV']['tmp_name'],$chemin);
                      
						// isertion dans la bd
						$req = $bdd->prepare('INSERT INTO candidatures(id_annonce,id_visiteur,nom,prenom,lettre_motivation,cv,date_cand) VALUES (?,?,?,?,?,?,NOW())');
                        $req->execute(array( $id_annonce,$_SESSION['id'],$nom,$prenom,$lettre_motivation,$chemin));
		                echo '<strong>vous avez bien postuler, votre candidature est enregistrée</strong>';
						header('Location: suivreCandidature.php');
		
                }
				else
				{
					echo'<stong>l\'extension de votre fichier n\'est pas accepté !</strong>';
					echo '<a class="nav-link" href="annonce.php">retour à l\'annonce</a>';
				}
            }
			else
			{
				echo'<stong>la taille de votre fichier est supérieure à 5 mo</strong>';
				echo '<a class="nav-link" href="annonce.php">retour à l\'annonce</a>';
			}
        }

	
	
}

?>

</body>
</html>




