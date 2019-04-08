<?php
		require("testadmin.php");
		$header='tab_bor_pers';
		$header='adminpage';
		include("header.php");
		$page_title="tableau de bord";


		if(!isset( $_GET["pid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["pid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM personnes WHERE pid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);
			$res = $st ->fetch();

		if ($res && $st -> rowCount()==0)
			{
				echo"<p> Erreur dans pid </p>";
			}
			$username=$res['nom'];
			$passe=$res['prenom'];
			
			$SQL="SELECT DISTINCT *FROM personnes p INNER JOIN inscriptions i on p.pid=i.pid inner join evenements e on i.eid = e.eid inner join categories c on e.cid=c.cid WHERE p.pid=? and p.pid not in (select pid from participations )";
			$stp= $db->prepare($SQL);
			$req=$stp->execute([$userid]);
		

			
			if(!$req )
			{
				echo"Cette personne n'est pas inscrite pour un évenement";
			}
			else 
			{
				
				echo "<table>";
				echo "<tr><th>$username</th></tr><tr><th>$passe</th></tr>";
				echo"</table>";
				echo"<table>";
				echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categories</th></tr>";
				while ($row = $stp -> fetch())
				{
		 		echo"<tr><td>$row[intitule]</td><td>$row[description]</td><td>$row[dateDebut]</td><td>$row[dateFin]</td><td>$row[type]</td><td>$row[nom]</td></tr>";
				}
				echo "</table>";
			}
			$db=null;
			
		}

		include("footer.php");
?>
		
  