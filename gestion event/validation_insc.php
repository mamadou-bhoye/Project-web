<?php
	require("testadmin.php");
	$header='pointevebatch';
	include("header.php");
	include("db_config.php");
	$page_title="soumission batch";

	$SQL="SELECT * FROM evenements WHERE eid=?";
	$st=$db -> prepare($SQL);
	$res=$st->execute([$_SESSION['eid_eve']]);

	if(!$res)
	{
		echo"erreur au niveaux de l'id de l'evenement";
	}
	else
	{
		$SQL = "SELECT * FROM personnes p";
		$st= $db->query($SQL);
		foreach ($st as $a ) 
		{
			if (isset($_POST[$a['pid']]) AND $_POST[$a['pid']] == 'true')
			{
				$SQL="INSERT INTO inscriptions VALUES(?,?,?)";
				$st=$db -> prepare($SQL);
				$res=$st->execute(array($a['pid'],$_SESSION['eid_eve'],$auth->userid));
					if(!$res)
					{
						echo "erreur d'inscriptions";
						include('footer.php');
						exit();
					}
					else
					{
						echo"inscrit avec succes";
						echo"<a href='adminpage.php'> revenir </a> à la page principale";
						include('footer.php');
					}
			}
		}
	}