<?php
		$title="listes de tous mes utilisateurs";
		require("testadmin.php");
		$header='adminpage';
		include("header.php");
		include("db_config.php");
		$role='user';

?>
		<h1>Supprimer un utilisateur</h1>

<?php 
		$SQL= "SELECT  * FROM users where role=?";
		$st= $db->prepare($SQL);
		$st->execute([$role]);
		echo "<table>";
		echo "<tr><th>Login</th><th>Mot De Passe</th><th>suppression d'un utilisateur</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$row[login]</td><td>$row[mdp]</td><td><a href='sup.php?uid=$row[uid]'> supprimer </td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>