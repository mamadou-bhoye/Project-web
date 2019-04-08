<?php
		//require("auth.php");
		$header='tab_bor_pers';
		require("testadmin.php");
		$header='tabboreve';
		include("header.php");
		$page_title="tableau de bord";


		if(!isset( $_GET["eid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["eid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM evenements p inner join  categories c on p.cid=c.cid WHERE p.eid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);
			$res = $st ->fetch();

		if ($res && $st -> rowCount()==0)
			{
				echo"<p> Erreur dans eid </p>";
			}
			$username=$res['intitule'];
			$passe=$res['description'];
			$log=$res['dateDebut'];
			$var=$res['dateFin'];
			$role=$res['type'];
			$test=$res['nom'];
			
			$SQL= "SELECT DISTINCT p.nom,p.prenom,p.pid FROM personnes p INNER JOIN inscriptions i on p.pid=i.pid inner join participations pa on i.pid <> pa.pid where i.eid=?";
				$stp= $db->prepare($SQL);
				$req=$stp->execute([$userid]);
		

			
			if(!$req )
			{
				echo"personnes n'est inscrit sur cet evenement";
			}
			else 
			{
				echo "<table>";
				echo "<tr><th>Nom de l'evenement</th></tr>";
				echo"</table>";
				echo "<table>";
				echo "<tr><th>intitule</th><th>Description</th><th>Date de debut</th><th>Date de fin</th><th>Type</th><th>categories</th></tr>";
				echo "<tr><th>$username</th><th>$passe</th><th>$log</th><th>$var</th><th>$role</th><th>$test</th></tr>";
				echo"</table>";
				echo "<table>";
				echo "<tr><th>Liste des personnes inscrites qui n'ont pas Participé</th></tr>";
				echo"</table>";
				echo"<table>";
				echo "<tr><th>Nom</th><th>Prenom</th></tr>";
				while ($row = $stp -> fetch())
				{
		 		echo"<tr><td>$row[nom] </td><td>$row[prenom]</td></tr>";
				}
				echo "</table>";
			}
			$db=null;
			
		}

		include("footer.php");
?>
		
  