<?php
		$page_title="listes des personnes";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");
		
?>
<h1>Choisissez l'évènement à modifier</h1>
<?php
		$SQL= "SELECT  * FROM evenements inner join categories 
		where evenements.cid=categories.cid";
			$st = $db->query($SQL);
		echo "<table>";
		echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categorie</th><th>Modifier</th></tr>";
		foreach($st as $row)
		{
		 echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td><td><a href='modifevenement.php?eid=$row[eid]'>Modifier</td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>
		
  