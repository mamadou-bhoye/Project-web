<?php
		$title="listes de tous mes utilisateurs";
		$header='adminpage';
		require("testadmin.php");
		include("header.php");
		include("db_config.php");
		$role='user';

?>
		<h1>Liste de tous les users</h1>

<?php 
		$SQL= "SELECT  * FROM users where role=?";
		$st= $db->prepare($SQL);
		$st->execute([$role]);
		echo "<table>";
		echo "<tr><th>Login</th><th>Mot De Passe</th><th>modification du user</th></tr>";
		foreach ($st as $row)
		{
		 echo"<td>$row[login]</td><td>$row[mdp]</td><td><a href='mod.php?uid=$row[uid]'> Modifier </td></tr>";
		}
		echo "</table>";
		include("footer.php");
?>