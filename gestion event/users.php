<?php
		$title="listes de tous mes utilisateurs";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");
		$role='user';
		$i=1;
?>
		<h1>Liste de tous mes Utilisateurs</h1>

<?php 
		$SQL= "SELECT  * FROM users where role=?";
		$st= $db->prepare($SQL);
		$st->execute([$role]);
		echo "<table>";
		echo "<tr><th>N°</th><th>Login</th><th>Mot De Passe</th></tr>";
		foreach ($st as $row)
		{
		 echo"<tr><td>$i</td><td>$row[login]</td><td>$row[mdp]</td></tr>";
		 $i++;
		}
		echo "</table>";
		include("footer.php");
?>
		
  