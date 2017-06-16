<?php
//$mysqli =  @new Mysqli("localhost", "root", "", "quaidesvaps");
$mysqli =  @new Mysqli("localhost", "cloe_quaidesvaps", "quaidesvaps123", "cloe_quaidesvaps");
//$mysqli =  @new Mysqli("db552324068.db.1and1.com", "dbo552324068", "Lokisalle", "db552324068");
//$mysqli =  @new Mysqli("localhost", "cloe_legoube", "Herbalife1804", "cloe_lokisalle");
// On se connecte et on crée un objet mysqli
// Ici l'@ nous permet de gérer nous même l'erreur s'il y en a une.
 
 $mysqli->query("SET NAMES UTF8");
 /* Modification du jeu de résultats en utf8 */

 if (!$mysqli->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
} 

 
if($mysqli->connect_error)
	{
		die('Un problème est survenu lors de la tentative de connexion à la BDD');
	}
	
// Avec le DIE, on lui demande de ne rien afficher excepté la phrase donnée ci-dessus.