<?php
	require("testusers.php");
	$header='pointevebatch';
	include("header.php");
	include("db_config.php");
	$page_title="soumission batch";

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
			$SQL = "SELECT * FROM personnes p inner join inscriptions i on p.pid=i.pid";
		$st= $db->query($SQL);
		foreach ($st as $a ) 
		{
		if (isset($_POST[$a['pid']]) AND $_POST[$a['pid']] == 'true')
		{
			$SQL="INSERT INTO inscriptions VALUES(?,?,?)";
			$st=$db -> prepare($SQL);
			$res=$st->execute(array($a['pid'],$_SESSION['eideve'],$auth->userid));
				if(!$res)
				{
					echo "erreur";
				}
				else
				{
					$SQL="INSERT INTO participations VALUES(DEFAULT,?,?,?,?)";
					$st=$db -> prepare($SQL);
					$res=$st->execute(array($_SESSION['eideve'],$a['pid'],date("Y-m-d H:i:s"),$auth->userid));
					if(!$res)
					{
						echo"non participe";
					}
					
				else{ echo"Participé avec succès";}
				}
		}
		
	}

	exit();	
	include("footer.php");
		}
		else
		{
			$SQL = "SELECT * FROM personnes";
	$st= $db->query($SQL);
	foreach ($st as $a ) 
	{
		if (isset($_POST[$a['pid']]) AND $_POST[$a['pid']] == 'true')
		{
			$SQL="INSERT INTO inscriptions VALUES(?,?,?)";
			$st=$db -> prepare($SQL);
			$res=$st->execute(array($a['pid'],$_SESSION['eideve'],$auth->userid));
				if(!$res)
				{
					echo "erreur";
				}
				else
				{
					$SQL="INSERT INTO participations VALUES(DEFAULT,?,?,?,?)";
					$st=$db -> prepare($SQL);
					$res=$st->execute(array($_SESSION['eideve'],$a['pid'],date("Y-m-d H:i:s"),$auth->userid));
					if(!$res)
					{
						echo"non participe";
					}
					
				else{ echo"Participé avec succès";}
				}
		}
		
	}

	exit();		
		}
		include("footer.php");
	}
	