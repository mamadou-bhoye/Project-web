<?php
		require("testadmin.php");
		$header='particip';
		include("header.php");
		$page_title="tableau de bord";
			
			$SQL= "SELECT  DISTINCT pe.nom,pe.prenom FROM participations p INNER JOIN personnes pe on p.pid=pe.pid ";
			$stp= $db->query($SQL);
				echo"<table>";
				echo "<tr><th>Nom</th><th>Prenom</th></tr>";
				while ($row = $stp -> fetch())
				{
		 		echo"<tr><td>$row[nom]</td><td>$row[prenom]</td></tr>";
				}
				echo "</table>";
			$db=null;
			
		

		include("footer.php");
?>
		
  