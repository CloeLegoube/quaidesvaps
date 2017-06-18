<?php
$link = mysqli_connect("localhost", "root", "root");

$sql = 'CREATE DATABASE rushtest4';

if (mysqli_query($link, $sql))
{
$mysqli =  @new Mysqli("localhost", "root", "root", "rushtest4");
c
// On se connecte et on crée un objet mysqli
// Ici l'@ nous permet de gérer nous même l'erreur s'il y en a une.
mysqli_query($mysqli , "SET NAMES UTF8");
 /* Modification du jeu de résultats en utf8 */
 if (!mysqli_set_charset($mysqli , "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($mysqli));
}

if(mysqli_connect_error())
{
		die('Un problème est survenu lors de la tentative de connexion à la BDD');
}

$link = mysqli_connect("localhost", "root", "root", "rushtest4");
$query = file_get_contents("http://localhost:8080/Rush_branch/rush00_19h30.sql");

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

	$mysqli =  @new Mysqli("localhost", "root", "root", "rushtest4");

	// On se connecte et on crée un objet mysqli
	// Ici l'@ nous permet de gérer nous même l'erreur s'il y en a une.
	mysqli_query($mysqli , "SET NAMES UTF8");
	 /* Modification du jeu de résultats en utf8 */
	 if (!mysqli_set_charset($mysqli , "utf8")) {
	    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($mysqli));
	}

	if(mysqli_connect_error())
	{
			die('Un problème est survenu lors de la tentative de connexion à la BDD');
	}
}
// Avec le DIE, on lui demande de ne rien afficher excepté la phrase donnée ci-dessus.
