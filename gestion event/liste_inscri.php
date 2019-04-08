<?php
		$title="listes des personnes inscrites pour un evenement";
		require("testusers.php");
		$header='userpage';
		include("header.php");
		include("db_config.php");
		$role='user';
		$i=1;
?>
		<h1>Liste des personnes</h1>

<?php 
		$SQL= "SELECT DISTINCT p.nom n, p.prenom m,it.nom nn,id.valeur va FROM personnes p  
		inner join inscriptions i on i.pid=p.pid inner join identifications id on p.pid=id.pid inner join itypes it on id.tid=it.tid";

		$st= $db->query($SQL);
		echo "<table>";
		echo "<tr><th>N°</th><th>Nom</th><th>Prenom</th><th>type d'identifiant</th><th>Valeur</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td>$i</td><td>$row[n]</td><td>$row[m]</td><td>$row[nn]</td><td>$row[va]</td></tr>";
		 	$i++;
		}
		echo "</table>";
		include("footer.php");
?>
		
  