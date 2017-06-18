<?php
$link = mysqli_connect("localhost", "root", "root");
$sql = 'CREATE DATABASE  rush00_4';

if(mysqli_query($link, $sql))
{
	$mysqli =  @new Mysqli("localhost", "root", "root", "rush00_4");
	$mysqli->query("SET NAMES UTF8");
	if (!$mysqli->set_charset("utf8")) {
		printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
	}
	if($mysqli->connect_error)
	{
		die('Un problème est survenu lors de la tentative de connexion à la BDD');
	}
	$link = mysqli_connect("localhost", "root", "root", "rush00_4");
	$query = file_get_contents("http://localhost:8080/rush00_4/rush00_18h30.sql");
	$array = explode(";\n", $query);
	for ($i=0; $i < count($array) ; $i++)
	{
		$str = $array[$i];
		if ($str != '')
		{
			$str .= ';';
			mysqli_query($link, $str);
		}
	}
}
else
{
	$mysqli =  @new Mysqli("localhost", "root", "root", "rush00_4");
	$mysqli->query("SET NAMES UTF8");
	if (!$mysqli->set_charset("utf8"))
	{
		printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
	}
	if($mysqli->connect_error)
	{
		die('Un problème est survenu lors de la tentative de connexion à la BDD');
	}
}
