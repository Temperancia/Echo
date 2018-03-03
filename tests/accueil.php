<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>Echo - Accueil</title>
	<link rel="stylesheet" type="text/css" href="css/960_12_col.css"/>
	<meta charset="utf-8"/>
	<style type="text/css">
		@font-face {
			font-family: 'Ruthie';
			src: url('Ruthie.otf');	
		}
		@font-face {
			font-family: 'Acknowledgement';
			src: url('Acknowledgement.otf');
		}
		header {
			height: 50px;
			padding-top: 2px;
			padding-right: 5px;
			font-family: Ruthie;
			font-size: 300%;
		}
		.column2 {
			float: left;
			margin-left: 860px;
		}
		.column3 {
			float: left;
			margin-left: 800px;
		}
		body {
			font-family: Georgia, Times, serif;
			background-image: url(background.jpeg);
		}
		#connexion {
			font-family: Acknowledgement;
		}
		.deconnexion {
			margin-left: 1750px;
			display: block;
			width: 150px;
			border: 1px solid #000;
			border-radius: 20px;
			background-image: -webkit-linear-gradient(#95cccc, #e5fff7);
			cursor: pointer;
			font-size: 1.2em;
		}
		.deconnexion:link {
			text-decoration: none;
		}
		#onglets
		{
			font : bold 30px Batang, arial, serif;
			list-style-type : none;
			padding-bottom : 24px;
			border-bottom : 1px solid #9EA0A1;
			margin-left : 0;
		}
	</style>
	</head>
	<body>
		<header>
		<div class="column2">E C H O</div>
		<div class="column3">E</div>
		</header>
		<a class="deconnexion" align="center" href="inscription.php">Déconnexion</a>
		<div id="menu">
			<ul id="onglets">
				<li class="active"><a href="Alsace-Champagne-Ardenne-Lorraine.php">ACAL</a></li>
				<li><a href="Aquitaine-Limousin-Poitou-Charentes.php">ALPC</a></li>
				<li><a href="Auvergne-Rhône-Alpes.php">ARA</a></li>
				<li><a href="Bourgogne-Franche-Comté.php">ALPC</a></li>
				<li><a href="Île-de-France.php">IDF</a></li> 
			</ul>
		</div>
		<?php
		if ($_SESSION['genre'] == 1)
		{
			?><p id="connexion">Connecté.</p><?php
		}
		else
		{
			?><p id="connexion">Connectée.</p><?php
		}
		if (date("G") > 6 && date("G") < 19)
		{
			?> Bonjour <?php echo($_SESSION['pseudo'])?>. Belle journée, n'est-ce pas ?</p><?php
		}
		else
		{
			?> Bonsoir <?php echo($_SESSION['pseudo'])?>. Belle soirée, n'est-ce pas ?</p><?php
		}?>
		
		<footer>
			<p align="center">Echo - 2015</p>
		</footer>
	</body>
</html>
