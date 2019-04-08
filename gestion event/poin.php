<?php
require("testusers.php");
$header='pointeve';
include("header.php");
$header=null;
$page_title="pointage sur un évenement";
if(!isset( $_GET["eid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		$_SESSION['eve']=$_GET['eid'];


include("db_config.php");

$SQL="SELECT *FROM evenements WHERE eid=?";
$st=$db->prepare($SQL);
$res= $st->execute([$_SESSION['eve']]);
	$res=$st->fetch();
if($res['type']=='ferme')
{
	$SQL="SELECT DISTINCT p.nom,p.prenom,p.pid FROM personnes p inner join inscriptions i on p.pid=i.pid";
	$st=$db->query($SQL);
	$st->fetch();
	if($st && $st ->rowCount()<0 )
	{
		echo"erreur";
	}
	echo"<table>";
	echo"<tr><td>listes de toutes les personnes</td></tr>";
	echo"</table>";
	echo"<table>";
				while ($row = $st -> fetch())
				{
		 		echo"<tr><td>$row[nom]</td><td>$row[prenom]</td><td><a href='validepoinfer.php?pid=$row[pid]'>Pointer</td></tr>";
				}
	echo "</table>";
}
else
{	

	$SQL="SELECT *FROM personnes";
	$res=$db->query($SQL);
	echo"<table>";
		echo"<tr><td>listes de toutes les personnes</td></tr>";
	echo"</table>";

	echo"<table>";
				foreach ($res as $row)
				{
		 		echo"<tr><td>$row[nom]</td><td>$row[prenom]</td><td><a href='validepoin.php?pid=$row[pid]'>Pointer</td></tr>";
				}
			echo"</table>";

}

	
	echo"<a href='userpage.php'> Revenir </a> à la page principale";
	$db=null;
