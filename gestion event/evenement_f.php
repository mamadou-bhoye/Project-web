<?php
		$page_title="listes des personnes";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");
		$type='ferme';
?>


<h1>listes de tous vos evenements Fermés</h1>

<?php
		$SQL= "SELECT  * FROM evenements inner join categories 
		where evenements.cid=categories.cid and type=?";
			$st = $db->prepare($SQL);
			$st-> execute([$type]);
		echo "<table>";
		echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categories</th></tr>";
		foreach($st as $row)
		{
		 echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>
		
  