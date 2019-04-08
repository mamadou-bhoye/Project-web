<?php
		$title="listes de toute les personnes";
		$header='adminpage';
		require("testadmin.php");
		include("header.php");
		include("db_config.php");
		$i=1;

?>
		<h1>Liste de toute les personnes</h1>

<?php 
		$SQL= "SELECT  * FROM personnes";
		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>N°</th><th>Nom</th><th>Prenom</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td>$i</td><td>$row[nom]</td><td><a href='listeidpers.php?pid=$row[pid]'>$row[prenom]</td></tr>";
		 $i++;
		}
		echo "</table>";
		include("footer.php");
?>
		
  