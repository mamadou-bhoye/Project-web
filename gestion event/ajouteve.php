<?php
require("testadmin.php");
$header='adminpage';
include("verifdate.php");
include("header.php");
$page_title="Ajouter un Evenement";
if(!isset($_POST['intitule']) || !isset($_POST['description']) || !isset($_POST['datedebut']) || !isset($_POST['datefin'])|| !isset($_POST['type']) || !isset($_POST['categorie']))
{
	include("ajout_eve_form.php");
	include("footer.php");
	exit();
}
$passe=htmlspecialchars($_POST['intitule']);
$username=htmlspecialchars($_POST['description']);
$userid=htmlspecialchars($_POST['datedebut']);
$log=htmlspecialchars($_POST['datefin']);
$var=htmlspecialchars($_POST['type']);
$role=htmlspecialchars($_POST['categorie']);
$userid = verifDate($userid);
$log = verifDate($log);
if($log == NULL || $userid == NULL)
{	include("header.php");
	echo"<h5>date invalide</h5>";
	include("ajout_eve_form.php");
	include("footer.php");
	exit();

}

include("db_config.php");

	$SQL="INSERT INTO evenements VALUES (DEFAULT,?,?,?,?,?,?)";
		$spt=$db->prepare($SQL);
		$resultat=$spt->execute(array($passe,$username,$userid,$log,$var,$role));
		if($resultat)
	{
		echo"l'ajout a été effectué";
	echo"<a href='adminpage.php'> revenir </a> à la page principale";
	$db=null;
	}
	else {
		echo"erreur";
	}

	include("footer.php");
?>
	
