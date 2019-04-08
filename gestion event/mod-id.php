<?php
	require("testadmin.php");
		$header='adminpage';
		$page_title="modifier un identifiant";


		if(!isset( $_GET["tid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["tid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM itypes WHERE tid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);

		if ($st -> rowCount()==0)
			{
				echo"<p> Erreur dans uid </p>";
			}
		if (!isset($_POST["identifiant"]))
		{
				include("mod_id.php");
				exit();
		}
			$username=$_POST["identifiant"];
		
			
			$SQL= "UPDATE  itypes SET nom=? WHERE tid=?";
			$st= $db->prepare($SQL);
			$res= $st->execute(array($username,$userid));
			
			if(!$res)
			{
				echo"<p>erreur de modification</p>";
			}
			else 
			{
				echo"<p> la modification a eté effectué </p>";
			}
			$db=null;
			echo "<a href = \"adminpage.php\"> mes utilisateurs</a>";
		}
	
		include("footer.php");
?>
		
  