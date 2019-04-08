<?php
		$header='adminpage';
		$page_title="modifier une personne";


		if(!isset( $_GET["pid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["pid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT * FROM personnes  where pid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);
			$res=$st->fetch();

		if ($res && $st -> rowCount()==0)
			{
				echo" Erreur dans pid";
				exit();
			}
			$username=$res['nom'];
			$var=$res['prenom'];

			$SQL="SELECT * FROM identifications  where pid=?";
			$stp=$db -> prepare($SQL);
			$stp->execute([$userid]);
			$req=$stp->fetch();

		if ($req && $stp -> rowCount()==0)
			{
				echo" Erreur dans pid ";
				exit();
			}
			$test=$req['valeur'];
		if (!isset($_POST["nom"]) || !isset($_POST["prenom"]) || !isset($_POST["ident"]) || !isset($_POST["valeur"]))
			{
					include("modpersform.php");
					include("footer.php");
					exit();
			}
			$username=$_POST['nom'];
			$test=$_POST['prenom'];
			$log=$_POST["ident"];
			$var=$_POST["valeur"];

		
			$SQL= "UPDATE  personnes p inner join identifications i  on 
				p.pid=i.pid inner join itypes it on i.tid=it.tid  SET p.nom=?, p.prenom=?, i.tid=? , i.valeur=? where p.pid=?";
				$st= $db->prepare($SQL);
				$res= $st->execute(array($username,$test,$log,$var,$userid));
			
			if(!$res)
			{
				echo"<p>erreur de modification</p>";
			}
			else 
			{
				echo"la modification a eté effectué";
			}
			$db=null;
			echo "<a href = \"adminpage.php\"> mes utilisateurs</a>";
		}
	
		include("footer.php");
?>
		
  