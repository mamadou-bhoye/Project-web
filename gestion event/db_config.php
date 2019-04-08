<?php

$host = "localhost";
$dbname = "u21514538";
$login = "u21514538";
$mdp = "JiAkad13M8";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
try{
$db = new PDO ("mysql:host=$host;dbname=$dbname",$login,$mdp);
}
catch(PDOException $e)
    {
    exit ("Erreur code connexion" .$e->getMessage());
    }
  ?>