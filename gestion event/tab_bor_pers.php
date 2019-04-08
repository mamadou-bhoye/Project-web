<?php
		$title="listes de toutes les personnes";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");

?>
		<h1>Liste de toutes les Personnes</h1>

<?php 
		$SQL="SELECT  *FROM personnes";
		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>Nom</th><th>Prenom</th><th>Tableau de bord</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$row[nom]</td><td>$row[prenom]</td><td><a href='tabbor.php?pid=$row[pid]'> Afficher </td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>