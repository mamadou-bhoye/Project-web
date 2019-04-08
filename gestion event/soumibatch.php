<?php
		$title="listes de tous mes utilisateurs";
		require("testusers.php");
		$header='userpage';
		include("header.php");
		include("db_config.php");
		$_SESSION['eideve']=$_GET['eid'];
?>
		<h1>Liste de toutes les personnes inscrites</h1>

<?php 
		$SQL="SELECT * FROM evenements WHERE eid=?";
		$st=$db -> prepare($SQL);
		$res=$st->execute([$_SESSION['eideve']]);

		if(!$res)
		{
			echo"erreur au niveaux de l'id de l'evenement";
		}
		else
		{
			$res=$st -> fetch();
			if($res['type']=='ferme')
			{
			$SQL= "SELECT  DISTINCT p.nom,p.prenom,p.pid FROM personnes p inner join inscriptions i on p.pid=i.pid where i.eid=?";
				$st=$db -> prepare($SQL);
				$res=$st->execute([$_SESSION['eideve']]);
			echo"<form action='validation.php' method='post'>";
			echo "<table>";
			echo "<tr><th>cocher</th><th>nom</th><th>Prenom</th></tr>";
			foreach ($st as $row)
				{
				 echo"<tr><td><input type = 'checkbox' name='$row[pid]' value='true'></td><td>$row[nom]</td><td>$row[prenom]</td></tr>";
				}
				echo "</table>";
				echo "<table>";
				echo"<tr><th><button type='submit' value=envoie>Envoyer</th><th><button type='submit' value=annule>annuler</th></tr>";
				echo "</table>";
				echo"</form>";
			}
			else
			{
			$SQL= "SELECT  * FROM personnes";
			$st= $db->query($SQL);
			echo"<form action='validation.php' method='post'>";
			echo "<table>";
			echo "<tr><th>cocher</th><th>nom</th><th>Prenom</th></tr>";
			foreach ($st as $row)
				{
				 echo"<tr><td><input type = 'checkbox' name='$row[pid]' value='true'></td><td>$row[nom]</td><td>$row[prenom]</td></tr>";
				}
				echo "</table>";
				echo "<table>";
				echo"<tr><th><button type='submit' value=envoie>Envoyer</th><th><button type='submit' value=annule>annuler</th></tr>";
				echo "</table>";
				echo"</form>";
			}
		}
			include("footer.php");
?>
		
   