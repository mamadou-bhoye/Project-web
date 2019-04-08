<?php
		$page_title="listes des evenements";
		include("testusers.php");
		$header='userpage';
		include("header.php");
		include("db_config.php");
?>
<h1>listes de tous vos evenements</h1>
<?php
		$SQL= "SELECT  * FROM evenements inner join categories 
		where evenements.cid=categories.cid";
			$st = $db->query($SQL);
		if($st && $st->rowCount()>0)
		{
		echo "<table>";
		echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categories</th><th>afficher</th></tr>";
		foreach($st as $row)
		{
		 echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td><td><a href='poin.php?eid=$row[eid]'>choisir</td></tr>";
		}
		}
		else
		{
			echo"erreur";
		}
		echo "</table>";
		include("footer.php");
?>
		
  