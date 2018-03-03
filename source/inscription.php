<!DOCTYPE html>
<html>
  <head>
    <title>Echo - Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/960_12_col.css"/>
	<meta charset="utf-8"/>
	<style type="text/css">
		body {
			font-family: Georgia, Times, serif;
		}
		header {
			padding-top: 2px;
			padding-right: 5px;
			font-family: Ruthie;
			font-size: 300%;
		}
		footer {
			padding-top: 150px;
		}
		@font-face {
			font-family: 'Ruthie';
			src: url('Ruthie.otf');
		}
		form {
			background-color: #efefef;
			border : 1px solid #dcdcdc;
			border-radius: 10px;
		}
		div {
			margin: 10px;
			padding-bottom: 10px;
		}
		#content {
			overflow: auto;
			height: 100%;
		}
		.column1, .column2 {
			width: 48%;
			float: left;
			margin: 10px;
		}
		.column1 {
			height: 500px;
		}
		.column2 {
			height: 250px;
			margin-top: 150px;
		}
		.title {
			float: left;
			width: 150px;
			text-align: left;
		}
		.submit {
			padding-left: 400px;
		}
	</style>
  </head>
  <body>
	<header align="right">E</header>
	<h1 align="center">Bienvenue sur Echo.</h1>
	<h3 align="center">Pour la s&eacutecurit&eacute de tous, la votre y compris, veuillez remplir votre profil avec la plus grande honn&ecirct&eacute.<br>
	L'&eacutequipe d'Echo vous remercie d'avance.</h3>
	<div id="content">
	<div class="article column1">
		<h2 align="center">Inscription</h2>
	<form action="formulaire.php" method="post">
		<div>
			<label class="title">Nom :</label>
			<input type="text" name="nom" size="15" maxlength="30"/><br>
		</div>
		<div>
			<label class="title">Pr&eacutenom :</label>
			<input type="text" name="prenom" size="15" maxlength="30"/><br>
		</div>
		<div>
			<span class="title">Sexe :</span>
			<input type="radio" name="sexe" value="homme" id="homme"/> <label for="homme">H</label>
			<input type="radio" name="sexe" value="femme" id="femme"/> <label for="femme">F</label><br>
		</div>
		<div>
			<label for="dateDeNaissance" class="title">Date de naissance :</label>
				<?php
					echo '<select name="jour" id="jour">';
					for ($i = 1 ; $i <= 31 ; $i++)
					{
						echo '<option value="', $i, '">', $i, '</option>';
					}
					echo '</select>';

					$mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
					echo '<select name="mois" id="mois">';
					for ($i = 0 ; $i < 12 ; $i++)
					{
						echo '<option value="', $i, '">', $mois[$i], '</option>';
					}
					echo '</select>';
					
					echo '<select name="annee" id="année">';
					for ($i = 2015 ; $i >= 1915 ; $i--)
					{
						echo '<option value="', $i, '">', $i, '</option>';
					}
					echo '</select>';
				?><br>
		</div>
		<div>
			<label class="title">Email :</label>
			<input type="text" name="email" size="15" maxlength="30"/><br>
		</div>
		<div>
			<label class="title">Pseudo :</label>
			<input type="text" name="pseudo" size="15" maxlength="30"/><br>
		</div>
		<div>
			<label class="title">Mot de passe :</label>
			<input type="password" name="motDePasse" size="15" maxlength="30"/><br>
		</div>
		<div>
			<label class="title">Confirmez le<br>mot de passe :</label>
			<input type="password" name="motDePasse" size="15" maxlength="30"/><br>
		</div>
		<div class="submit">
			<input type="submit" value="Rejoindre" id="submit"/>
		</div>
	</form>
	</div>
	<div class="article column2">
		<h2 align="center">Déjà inscrit ?</h2>
	<form action="formulaire.php" method="post">
		<div>
			<label class="title">Pseudo :</label>
			<input type="text" name="pseudo" size="15" maxlength="30"/><br>
		</div>
		<div>
			<label class="title">Mot de passe :</label>
			<input type="password" name="motDePasse" size="15" maxlength="30"/><br>
		</div>
		<div class="submit">
			<input type="submit" value="Connexion" id="submit"/>
		</div>
	</form>
	</div>
	</div>
  </body>
  <footer>
	<p align="center">Echo - 2015</p>
	</footer>
</html>
