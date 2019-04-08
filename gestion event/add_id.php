<?php
require("testadmin.php");
$header=null;

$page_title="Ajouter un identifiant";
if(!isset($_POST['identifiant']))
{	
	include("header.php");
	include("add_idform.php");
	include("footer.php");
	exit();
}
$passe=$_POST['identifiant'];
include("db_config.php");
include("header.php");
$SQL="SELECT *FROM itypes WHERE nom=?";
$stp=$db-> prepare($SQL);
$res=$stp->execute([$passe]);

if($res && $stp->rowCount() >=1)
{	
	echo"<h5>cet identifiant existe dejà</h5>";
	echo"<h5>veuillez saisir un autre</h5>";
	include("add_idform.php");
	include("footer.php");
	exit();

}

$SQL="INSERT INTO itypes VALUES (DEFAULT,?)";
$st=$db->prepare($SQL);
$res=$st->execute([$passe]);

if(!$res)
{
	include("header.php");
	echo"Erreur d'ajout";
}
else
{	include("header.php");
	echo"l'ajout a été effectué";
	echo"<a href='adminpage.php'> revenir </a> à la page principale";
	$db=null;
}