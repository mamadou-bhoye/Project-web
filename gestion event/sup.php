<?php
$page_title="Suppression d'utilisateurs";
require("testadmin.php");
$header='users';
include("header.php");

if(!isset($_GET["uid"]))
{
	echo"<p>Erreur</p>\n";
}
$userid=$_GET["uid"];
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
	$SQL="DELETE FROM users WHERE uid=?";
	$st=$db->prepare($SQL);
	$res=$st->execute([$userid]);
	if(!$res)
	{
		echo"<p>Erreur de suppression</p>";
	}
	$db=null;
	echo "<a href='adminpage.php'>supprimé Revenir </a> à la page d'acceuil";
}

include("footer.php");