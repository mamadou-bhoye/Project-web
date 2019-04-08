<?php
	require("testusers.php");
	$header='pointeve';
	include("header.php");
	$header='adminpage';
	include("db_config.php");
	$page_title="modifier un utilisateur";
		if(!isset($_GET["pid"]))
		{
			echo"<p>Erreur du pid<p>\n";
		}
		else
		{
			$userid= $_GET["pid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM personnes p inner join identifications i on p.pid=i.pid inner join itypes it on i.tid=it.tid WHERE p.pid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);
			$res=$st->fetch();

		if ($st -> rowCount()==0)
			{
				echo"<p> Erreur dans pid </p>";
			}
			if(!isset($_POST['ident']) || !isset($_POST['valeur']))
				{
					include("verif_id_form.php");
					include("footer.php");
					exit();
				}

		if ($res['valeur'] != $_POST['valeur'] || $res['tid'] != $_POST['ident'])
		{
			echo"<p class='info'>erreur d'identifiant</p>";
		   include("verif_id_form.php");
		   echo"<p class='aligner'> <a  href=\"addpersuser.php\"> voulez vous vous inscrire</a></p>";
		   include("footer.php");
		   exit();
		}
		else
		{	
			$SQL="INSERT INTO inscriptions VALUES(?,?,?)";
			$st=$db -> prepare($SQL);
			$res=$st->execute(array($userid,$_SESSION['eve'],$auth->userid));
				if(!$res)
				{
					echo "erreur";
				}
				else
				{
					$SQL="INSERT INTO participations VALUES(DEFAULT,?,?,?,?)";
					$st=$db -> prepare($SQL);
					$res=$st->execute(array($_SESSION['eve'],$userid,date("Y-m-d H:i:s"),$auth->userid));
					if(!$res)
					{
						echo"non participe";
					}
					else{ echo"Participé avec succès";}
				}
		}
	}
		include("footer.php");
?>
		
  