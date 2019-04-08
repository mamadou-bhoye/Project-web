<?php
$header=null;
echo "<a href = \"adminpage.php\">Retour</a>";
$page_title="Ajouter un utilisateur";
$role='user';
if(!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['password2']))
{
	include("ajout_form.php");
	include("footer.php");
	exit();
}
if($_POST['password'] != $_POST['password2'])
				{
					include("ajout_form.php");
					include("footer.php");
					exit();
				}
else
{
	$username=htmlspecialchars($_POST['login']);
	$passe=password_hash($_POST['password'],PASSWORD_DEFAULT);
}
include("db_config.php");

$SQL="SELECT *FROM users WHERE login =?";
$st=$db->prepare($SQL);
$res= $st->execute([$username]);
if($st && $st->rowCount()>0)
{
	echo "<h5>login déjà utilisé </h5>";
	echo "<h5>veuillez saisir un autre autre </h5>";
	include("ajout_form.php");
	include("footer.php");
	exit();
}

$SQL="INSERT INTO users VALUES (DEFAULT,?,?,?)";
$st=$db->prepare($SQL);
$res=$st->execute(array($username,$passe,$role));

if(!$res)
{
	echo"Erreur d'ajout";
}
else
{
	echo"l'ajout a été effectué";
	echo"<a href='adminpage.php'> revenir </a> à la page principale";
	$db=null;
}