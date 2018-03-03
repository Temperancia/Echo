<?php session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=echo', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '. $e->getMessage());
}

$nom = $_SESSION['nom'] = $_POST['nom'];
$prenom = $_SESSION['prenom'] = $_POST['prenom'];
$genre = $_SESSION['genre'] = $_POST['genre'];
$jour = $_POST['jour'];
$mois = $_POST['mois'] + 1;
$annee = $_POST['annee'];
$date = $_SESSION['date'] = $annee . '-' . $mois . '-' . $jour;
$email = $_SESSION['email'] = $_POST['email'];
$pseudo = $_SESSION['pseudo'] = $_POST['pseudo'];
$motDePasse = $_POST['motDePasse'];

if ($genre == "homme")
{
	$sql = "INSERT INTO utilisateurs(Nom, Prenom, Genre, DateDeNaissance, Email, Pseudo, MotDePasse)
	VALUES ('$nom', '$prenom', 1, '$date', '$email', '$pseudo', '$motDePasse')";
}
else
{
	$sql = "INSERT INTO utilisateurs(Nom, Prenom, Genre, Email, Pseudo, MotDePasse)
	VALUES ('$nom', '$prenom', 0, '$email', '$pseudo', '$motDePasse')";
}
$cmd = $bdd->query($sql);

header('Location: accueil.php');
?>