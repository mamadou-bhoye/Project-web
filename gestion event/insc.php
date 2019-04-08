<?php
require("testadmin.php");
$header='inscrirepers';
include("header.php");
$page_title="Ajouter un utilisateur";
include("db_config.php");
$_SESSION['eid_eve']=$_GET['eid'];
?>

		<h1>Liste de toutes les personnes inscrites</h1>

<?php 
		$SQL= "SELECT  * FROM personnes";
		$st= $db->query($SQL);
		echo"<form action='validation_insc.php' method='post'>";
		echo "<table>";
		echo "<tr><th>cocher</th><th>nom</th><th>Prenom</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td><input type = 'checkbox' name='$row[pid]' value='true'></td><td>$row[nom]</td><td>$row[prenom]</td></tr>";
		}
		echo "</table>";
		echo "<table>";
		echo"<tr><th><button type='submit' value=envoie>Envoyer</th><th><button type='submit' value=annule>annuler</th></tr>";
		echo "</table>";
		echo"</form>";
		include("footer.php");
?>
