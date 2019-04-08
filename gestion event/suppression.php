<?php

		$page_title="listes des personnes";
		$header='adminpage';
		require("testadmin.php");
		include("header.php");
		include("db_config.php");
		
?>
<h1>Veuillez choisir l'évènement à supprimer</h1>
<?php
		$SQL= "SELECT  * FROM evenements inner join categories 
		where evenements.cid=categories.cid";
			$st = $db->query($SQL);
		echo "<table>";
		echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categorie</th><th>Supprimer</th></tr>";
		foreach($st as $row)
		{
		 echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td><td><a href='supeve.php?eid=$row[eid]'>Supprimer</td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>
		
  