<?php
require("testusers.php");
$header='userpage';
include("header.php");
include("db_config.php");
$page_title="Ajouter d'une personne";
if(!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['ident']) || !isset($_POST['valeur']))
{
	include("add_pers_form.php");
	include("footer.php");
	exit();
}

$passe=$_POST['nom'];
$username=$_POST['prenom'];
$userid=$_POST['ident'];
$log=$_POST['valeur'];
include("db_config.php");

$SQL="INSERT INTO personnes VALUES (DEFAULT,?,?)";
$st=$db->prepare($SQL);
$res=$st->execute(array($passe,$username));
$var=$db->lastInsertId();


if($res)
{
	$SQL="SELECT  identifications WHERE tid=? and valeur=?  ";
	$sp=$db->prepare($SQL);
	$req=$sp->execute(array($userid,$log));

	if($req)
	{
		echo"<h5>Valeur d'identifiants Invalides</h5>";
		include("add_pers_form.php");
		include("footer.php");
		exit();
	}

	$SQL="INSERT INTO identifications VALUES (?,?,?)";
	$spt=$db->prepare($SQL);
	$resultat=$spt->execute(array($var,$userid,$log));
	if($resultat)
	{
		echo"l'ajout a été effectué";
	echo"<a href='userpage.php'> revenir </a> à la page principale";
	$db=null;
	}
}
	include("footer.php");
?>
	
