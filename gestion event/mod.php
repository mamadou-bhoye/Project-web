<?php
		require("testadmin.php");
			$header='adminpage';
		$page_title="modifier un utilisateur";


		if(!isset( $_GET["uid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["uid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM users WHERE uid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);

		if ($st -> rowCount()==0)
			{
				echo"<p> Erreur dans uid </p>";
			}
			if(!isset($_POST['password']) || !isset($_POST['password2']))
				{
					include("modifform.php");
					include("footer.php");
					exit();
				}
				

		if ($_POST['password'] != ($_POST['password2']))
		{
		    echo "<p>Mots de passe différents\n</p>";
		   include("modifform.php");
		   include("footer.php");
		   exit();
		}
		else
		{	
			$password=sha1($_POST['password']);
			$SQL= "UPDATE  users SET mdp=? WHERE uid=?";
			$st= $db->prepare($SQL);
			$res= $st->execute(array($password,$userid));
			
			if(!$res)
			{
				echo"<p>erreur de modification</p>";
			}
			else 
			{
				echo"<p> la modification a eté effectué </p>";
			}
			$db=null;
			echo "<a href = \"users.php\"> mes utilisateurs</a>";
		}
	}
		include("footer.php");
?>
		
  