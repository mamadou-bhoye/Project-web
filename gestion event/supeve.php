<?php
$page_title="Suppression d'evenement";
require("testadmin.php");
$header='suppression';
include("header.php");

if(!isset($_GET["eid"]))
{
	echo"<p>Erreur</p>\n";
}
$userid=$_GET["eid"];
if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]))
{
	include("sup_form.php");
}
else if (isset($_POST["annuler"]))
{
	echo"Operation annulee";
}
else
	{
	include("db_config.php");
	$SQL="DELETE FROM evenements WHERE eid=?";
	$st=$db->prepare($SQL);
	$res=$st->execute([$userid]);
	if(!$res)
	{
		echo"<p>Erreur de suppression</p>";
	}
	$db=null;
	echo "<a href='adminpage.php'>supprimé!!! Revenir </a> à la page d'acceuil";
}

include("footer.php");