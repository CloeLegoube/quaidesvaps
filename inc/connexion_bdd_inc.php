<?php
$link = mysqli_connect("localhost", "root", "root");
$sql = 'CREATE DATABASE rush001';

if (mysqli_query($link, $sql))
{
$mysqli =  @new Mysqli("localhost", "root", "root", "rush001");
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
$link = mysqli_connect("localhost", "root", "root", "rush001");
$query = file_get_contents("http://localhost:8080/Rush00/rush00_18h30.sql");
    $array = explode(";\n", $query);
    for ($i=0; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
             $str .= ';';
              mysqli_query($link, $str);
        }
    }
}
else {
	$mysqli =  @new Mysqli("localhost", "root", "root", "rush001");
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
}



// Avec le DIE, on lui demande de ne rien afficher excepté la phrase donnée ci-dessus.
