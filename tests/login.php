<?php session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=echo', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '. $e->getMessage());
}

$sql = "SELECT * from utilisateurs where pseudo = :pseudo";
$reponse = $bdd->prepare($sql);
$pseudo = htmlentities(addslashes($_POST['pseudo']));
$motDePasse = htmlentities(addslashes($_POST['motDePasse']));
$reponse->bindValue(':pseudo', $pseudo);
$reponse->execute();
$nombre_ligne = $reponse->rowCount();
$donnees = $reponse->fetch();
$reponse->closeCursor();
if ($nombre_ligne == 0)
	header('Location: inscription.php?message=1');
else if ($_POST['motDePasse'] == $donnees['MotDePasse'])
{
	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['genre'] = $donnees['Genre'];
	header('Location: accueil.php');		
}
else
{
	header("location: inscription.php?message=2");
}
?>