<?php
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		$page_title="tableau de bord";
			
			$SQL= "SELECT  DISTINCT e.intitule,e.description,e.dateDebut,e.dateFin,e.type,c.nom FROM participations p INNER JOIN evenements e on p.eid=e.eid inner join categories c on e.cid=c.cid ";
			$stp= $db->query($SQL);
			
				echo"<table>";
				echo "<tr><th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>type</th><th>Categorie</th></tr>";
				while ($row = $stp -> fetch())
				{
		 		echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td></tr>";
				}
				echo "</table>";
			$db=null;
			
		

		include("footer.php");
?>
		
  