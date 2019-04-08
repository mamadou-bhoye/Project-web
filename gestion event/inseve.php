<?php
		$title="listes de toute les personnes";
		require("testadmin.php");
		include("header.php");
		include("db_config.php");
		$i=1;
		if(!isset($_GET["eid"]))
		{
			echo"erreur";
		}
		$session['AUTH_USER_ID']= $_GET["eid"];

?>
		<h1>Liste de toute les personnes</h1>

<?php 
		$SQL= "SELECT  * FROM personnes";
		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>N°</th><th>Nom</th><th>Prenom</th><th>Ajout</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td>$i</td><td>$row[nom]</td><td>$row[Prenom]</td><td><a href='insc.php?pid=$row[pid]'>Ajouter</td></tr>";
		 	$i++;
		}
		echo "</table>";
		include("footer.php");
?>
		
  