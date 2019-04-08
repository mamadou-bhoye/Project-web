<?php
$page_title="Suppression personnes";
require("testadmin.php");
$header='adminpage';
include("header.php");

if(!isset($_GET["pid"]))
{
	echo"<p>Erreur</p>\n";
}
$userid=$_GET["pid"];
if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]))
{
	include("sup_form.php");
}
else if (isset($_POST["annuler"]))
{
	echo"Operation annulee";
	echo "<a href='adminpage.php'> Revenir </a> à la page d'acceuil";
}
else
	{
	include("db_config.php");
	$SQL="DELETE FROM personnes WHERE pid=?";
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