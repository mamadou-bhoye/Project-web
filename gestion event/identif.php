<?php
		$title="listes de tous mes utilisateurs";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");
		$i=1;
?>
		<h1>Liste de tous mes Identifiants</h1>

<?php 
		$SQL= "SELECT  * FROM itypes ";
		$st=$db->query($SQL);
		echo "<table>";
		echo "<tr><th>N° de l'identifiant</th><th>nom de l'identifiant</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$i</td><td>$row[nom]</td></tr>";
		 	$i++;
		}
		echo "</table>";
		include("footer.php");
?>