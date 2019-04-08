<?php
		$title="listes de tous mes utilisateurs";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");

?>
		<h1>Liste de tous mes Utilisateurs</h1>

<?php 
		$SQL= "SELECT  * FROM personnes";
		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>Nom</th><th>Prenom</th><th>modifier d'un utilisateur</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$row[nom]</td><td>$row[prenom]</td><td><a href='modd_pers.php?pid=$row[pid]'> modifier </td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>