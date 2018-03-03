<!DOCTYPE html>
<html>
  <head>
    <title>Echo - Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/960_12_col.css"/>
	<meta charset="utf-8"/>
	<style type="text/css">
		@font-face {
			font-family: 'Ruthie';
			src: url('Ruthie.otf');
		}
		body {
			font-family: Georgia, Times, serif;
			background-image: url(background.jpeg);
		}
		header {
			height: 20px;
			padding-top: 2px;
			padding-right: 5px;
			font-family: Ruthie;
			font-size: 300%;
		}
		footer {
			padding-top: 150px;
		}
		form {
			background-color: #e5fff7;
			background-image: -webkit-linear-gradient(#95cccc, #e5fff7);
			border : 1px solid #dcdcdc;
			border-radius: 20px;
		}
		select {
			height: 30px;
			margin-top: 5px;
			border-radius: 20px;
		}
		div {
			margin: 20px;
			padding-bottom: 5px;
		}
		#content {
			overflow: auto;
			height: 100%;
		}
		.column1 {
			width: 320px;
			height: 600px;
			float: left;
			margin-left: 500px;
		}
		.column2 {
			width: 320px;
			height: 250px;
			float: left;
			margin-left: 300px;
			margin-top: 150px;
		}
		.title {
			float: left;
			width: 200px;
			text-align: left;
		}
		input[type=text], input[type=password] {
			border-radius: 20px;
			width: 250px;
			height: 25px;
			font-size: 1.2em;
		}
		input:hover, select:hover {
			border: none;
		}
		input[type=submit] {
			width: 250px;
			height: 30px;
			color: white;
			background: #00cc00;
			cursor: pointer;
			text: #ffffff;
		}
		#login {
			color: #ff0000;
			margin-left: 110px;
		}
		a.info{
			position: relative;
			z-index:24;
			color:#000;
			text-decoration:none
		}
		a.info:hover{
			z-index:25;
		}		 
		a.info span{
			display: none
		} 
		a.info:hover span{
			display:block;
			position:absolute;
			top:2em; left:2em; width:15em;
			border:1px solid #000;
			background-color:#FFF;
			color:#000;
			text-align: justify;
			font-weight:none;
			padding:5px;
		}
		#erreurDate {
			margin-left: 68px;
		}
	</style>
  </head>
  <body>
	<script type="text/javascript">
	function surligne(champ, erreur)
	{
		if (erreur)
		{
			champ.style.backgroundColor = "#fba";
			champ.style.backgroundPosition = "200px 0px";
		}
		else
			champ.style.backgroundColor = "";
	}

	function verifNom(nom)
	{
		if (document.getElementById('nom').value =='')
		{
			surligne(nom, true);
			return false;	
		}
		else
		{
			surligne(nom, false);
			return true;
		}
	}
	
	function verifPrenom(prenom)
	{
		if (document.getElementById('prenom').value == '')
		{
			surligne(prenom, true);
			return false;
		}
		else
		{
			surligne(prenom, false);
			return true;
		}
	}

	function verifGenre()
	{
		if (document.getElementById('Homme').checked == false
		&& document.getElementById('Femme').checked == false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function verifDate()
	{
		var jour = document.getElementById('jour').value;
		var mois = document.getElementById('mois').value;
		var annee = document.getElementById('annee').value;
		var now = new Date();
		if (now.getFullYear() - 14 < annee
		|| now.getFullYear() - 14 == annee && now.getMonth() < mois
		|| now.getFullYear() - 14 == annee && now.getMonth() == mois && now.getDate() < jour)
			alert("Vous devez avoir minimum 14 ans pour vous inscrire sur Echo.");
		return true;
	}

	function verifMail(mail)
	{
		var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
		if(!regex.test(mail.value))
		{
			surligne(mail, true);
			return false;
		}
		else
		{
			surligne(mail, false);
			return true;
		}
	}
	
	function verifPseudo(pseudo)
	{
		if (document.getElementById('pseudo').value == '' ||
		pseudo.value.length > 25)
		{
			surligne(pseudo, true);
			return false;
		}
		else
		{
			surligne(pseudo, false);
			return true;
		}
	}
	
	function verifMotDePasse(motDePasse, cMotDePasse)
	{
		premierMdpRempli = document.getElementById('motDePasse').value != '';
		secondMdpRempli = document.getElementById('cMotDePasse').value != '';
		if (!premierMdpRempli)
		{
			surligne(motDePasse, true);
		}
		else
		{
			surligne(motDePasse, false);
		}
		if (!secondMdpRempli)
		{
			surligne(cMotDePasse, true);
			return false;
		}
		else
		{
			surligne(cMotDePasse, false);
		}
		if (motDePasse.value != cMotDePasse.value)
		{
			surligne(cMotDePasse, true);
			return false
		}
		else
		{
			surligne(cMotDePasse, false);
			return true;
		}
	}
	
	function verifInscri(f)
	{
		var nomOk = verifNom(f.nom);
		var prenomOk = verifPrenom(f.prenom);
		var genreOk = verifGenre();
		var dateOk = verifDate();
		var mailOk = verifMail(f.email);
		var pseudoOk = verifPseudo(f.pseudo);
		var motDePasseOk = verifMotDePasse(f.motDePasse, f.cMotDePasse);

		if (nomOk && prenomOk && genreOk && dateOk && mailOk && pseudoOk && motDePasseOk)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	</script>
	<header align="right">E</header>
	<h1 align="center">Bienvenue sur Echo.</h1>
	<h3 align="center">Pour la s&eacutecurit&eacute de tous, la votre y compris, veuillez remplir votre profil avec la plus grande honn&ecirctet&eacute.<br>
	L'&eacutequipe d'Echo vous remercie d'avance.</h3>
	<div id="content">
	<div class="article column1">
		<h2 align="center">Inscription</h2>
	<form method="post" action="register.php" onsubmit="return verifInscri(this);">
		<div>
			<input type="text" name="nom" id="nom" size="15" maxlength="30" placeholder=" Nom"/>
		</div>
		<div>
			<input type="text" name="prenom" id="prenom" size="15" maxlength="30" placeholder=" Prénom"/>
		</div>
		<div>
			<label>Genre :</label>
			<input type="radio" name="genre" value="homme" id="Homme" style="width:20px;height:20px"/>
			<label for="homme">Homme</label>
			<input type="radio" name="genre" value="femme" id="Femme" style="width:20px;height:20px"/>
			<label for="femme">Femme</label>
		</div>
		<div>
			<label for="dateDeNaissance" class="title">Date de naissance :</label><br>
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
					
					echo '<select name="annee" id="annee">';
					for ($i = 2015 ; $i >= 1915 ; $i--)
					{
						echo '<option value="', $i, '">', $i, '</option>';
					}
					echo '</select>';
				?>
				<a class="info" href="#"><img src="infobulle.jpg" id="erreurDate"/><span>Un âge minimum de 14 ans est requis pour la création d'un compte Echo.</span></a>
		</div>
		<div>
			<input type="text" name="email" size="15" maxlength="30" placeholder=" Email"/>
			<span id="erreurEmail"></span><br>
		</div>
		<div>
			<input type="text" name="pseudo" id="pseudo" size="15" maxlength="30" placeholder=" Pseudo"/>
			<a class="info" href="#"><img src="infobulle.jpg" id="erreur"/><span>Doit être inférieur à 25 caractères.</span></a>
			<span id="erreurPseudo"></span><br>
		</div>
		<div>
			<input type="password" name="motDePasse" id="motDePasse" size="15" maxlength="30" placeholder=" Mot de passe"/>
			<span id="erreurMotDePasse"></span><br>
		</div>
		<div>
			<input type="password" name="cMotDePasse" id="cMotDePasse" size="15" maxlength="30" placeholder=" Confirmez le mot de passe"/>
			<span id="erreurCMotDePasse"></span><br>
		</div>
		<div align="center" class="submit">
			<input type="submit" value="Rejoindre"/>
		</div>
	</form>
	</div>
	<div class="article column2">
		<h2 align="center">Déjà inscrit ?</h2>
	<form action="login.php" method="post">
		<div>
			<input type="text" name="pseudo" size="15" maxlength="30" placeholder=" Pseudo"/><br>
		</div>
		<div>
			<input type="password" name="motDePasse" size="15" maxlength="30" placeholder=" Mot de passe"/><br>
		</div>
		<div align="center" class="submit">
			<input type="submit" value="Connexion" id="connexion"/>
		</div>
		<?php
		if (isset($_GET['message']) && $_GET['message'] == '1')
			echo "<span id='login'>login incorrect</span>";
		else if (isset($_GET['message']) && $_GET['message'] == '2')
			echo "<span id='login'>mot de passe incorrect</span>";
		?>
	</div>
	</form>
	</div>

	<footer>
	<p align="center">Echo - 2015</p>
	</footer>
	</body>
</html>
