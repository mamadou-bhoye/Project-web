<?php
require ("auth.php");
if($auth->role !='user')
{
	header("Location:guide.php");
}
$header=null;
$page_title="page d'administration";
include ("header.php");
?>
<h1>BIENVENUE SUR VOTRE SITE !!!</h1>
<?php
echo"<h4> Vous êtes connectés en tant que ($auth->role)</h4>";
?>
<div id="user">
	<ul>
		<li> 
			<a href="pointeve.php"> Pointage d'une Personne pour un évenement</a>
				
		</li>
	</ul>

	<ul>
		<li> 
			<a href="liste_inscri.php"> Liste des personnes inscrites pour un évenement</a>
				
		</li>
	</ul>

	<ul>
		<li> 
			<a href="pointevebatch.php"> Soumission en Batch</a>
				
		</li>
	</ul>
	<ul>
		<li> 
			<a href="logout.php"> Deconnexion</a>
				
		</li>
	</ul>
</div>
<?php
include("footer.php");
?>