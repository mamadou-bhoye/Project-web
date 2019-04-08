<?php
		$title="listes de toute les Personnes";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");

?>
		<h1>Liste de toute les Personnes</h1>

<?php 
		$SQL= "SELECT  * FROM personnes";
		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>Nom</th><th>Prenom</th><th>suppression d'un utilisateur</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$row[nom]</td><td>$row[prenom]</td><td><a href='supp_pers.php?pid=$row[pid]'> supprimer </td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>