<?php
		$page_title="Gestion de la Personne";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");


?>
		<h1>Gestion de la personne</h1>

<?php 
		$userid=$_GET["pid"];
		$SQL= "SELECT  *FROM personnes p inner join identifications i on 
		p.pid=i.pid inner join itypes t on i.tid=t.tid where p.pid=?" ;
		$st= $db->Prepare($SQL);
		$res=$st->execute([$userid]);
		if($res)
		{
		echo "<table>";
		echo "<tr><th>Nom et Prenom de La personne</th><th>liste de mes identifiants</th><th>valeur de l'identifiant</th><th>gestion de mes Identifiants</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td>$row[prenom]</td><td>$row[nom]</td><td>$row[valeur]</td><td><a href='modd_pers.php?pid=$row[pid]'>Gerer</td></tr>";
		}
		echo "</table>";
		}
		else{
		echo" j'y arrive pas";
	}
		include("footer.php");
?>
		
  