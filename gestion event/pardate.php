<?php
	require("testadmin.php");
		$header='particip';
		include("header.php");
		$page_title="tableau de bord";
			
			$SQL= "SELECT  DISTINCT p.date,e.intitule FROM participations p INNER JOIN evenements e on p.eid=e.eid ";
			$stp= $db->query($SQL);
				echo"<table>";
				echo "<tr><th>Date de Participations</th><th>nom de l'evenement</th></tr>";
				while ($row = $stp -> fetch())
				{
		 		echo"<tr><td>$row[date]</td><td>$row[intitule]</td></tr>";
				}
				echo "</table>";
			$db=null;
			
		

		include("footer.php");
?>
		
  