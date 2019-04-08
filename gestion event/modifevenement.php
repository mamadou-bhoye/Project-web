<?php
		$header='adminpage';
		$page_title="modifier un evenement";


		if(!isset( $_GET["eid"]))
		{
			echo"<p>Erreur<p>\n";
		}
		else
		{
			$userid= $_GET["eid"];
			include("db_config.php");
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$SQL="SELECT* FROM evenements WHERE eid=?";
			$st=$db -> prepare($SQL);
			$st->execute([$userid]);
			$res = $st ->fetch();

		if ($res && $st -> rowCount()==0)
			{
				echo"<p> Erreur dans eid </p>";
			}
			$passe=$res['intitule'];
			$log=$res['description'];
			$var=$res ['dateDebut'];
			$role=$res['dateFin'];
			$username=$res['type'];
		if(!isset($_POST['intitule']) || !isset($_POST['description']) || !isset($_POST['datedebut']) || !isset($_POST['datefin'])|| !isset($_POST['type']) || !isset($_POST['categorie']))
		{
				include("modifeve_form.php");
				include("footer.php");
				exit();
		}
			$passe=htmlspecialchars($_POST['intitule']);
			$log=htmlspecialchars($_POST['description']);
			$var=htmlspecialchars($_POST ['datedebut']);
			$role=htmlspecialchars($_POST['datefin']);
			$username=htmlspecialchars($_POST['type']);
			$test=htmlspecialchars($_POST['categorie']);
		
			
			$SQL= "UPDATE  evenements SET intitule=?, description=?, dateDebut=?,
			dateFin=? ,type=? ,cid=? WHERE eid=?";
			$st= $db->prepare($SQL);
			$res= $st->execute(array($passe,$log,$var,$role,$username,$test,$userid));
			
			if(!$res)
			{
				echo"erreur de modification";
			}
			else 
			{
				echo" la modification a eté effectué ";
			}
			$db=null;
			echo "<a href = \"adminpage.php\"> revenir a la page principale</a>";
		}

		include("footer.php");
?>
		
  