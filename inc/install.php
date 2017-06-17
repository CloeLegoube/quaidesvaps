<?php
	include("connexion_bdd_inc.php");
	include("fonction_inc.php");
	session_start(); //soit on crée la session soit on l'ouvre si elle existe.

	define("RACINE_SITE", "http://e2r6p19.42.fr:8080/rush00/"); // On écrit le chemin de notre site. Si on le change de place, on aura simplement à changer cette constante.
	//echo RACINE_SITE;

	define("RACINE_SITE2", "/ifocop/"); // On écrit le chemin de notre site. Si on le change de place, on aura simplement à changer cette constante.
	//echo RACINE_SITE;

	$msg =""; // créer une variable egale à rien qui va servir à communiquer avec l'internaute concernant les messages d'erreur.
	$msg_page ="";
	$msg2 ="";
	$contenu ="";
	$nav_en_cours ="";
	$fil ="";


	//******************************************************************************
			//Est-ce que l'internaute a cliqué sur Deconnexion dans le menu (on va chercher si les paramètres de l'URL sont présents).
			if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
			{
				session_destroy();
				header("location:index.php");
			}


			if(isset($_POST['envoi_recherche'])){
				header("location:recherche.php?recherche=".$_POST['recherche']."");

			};
