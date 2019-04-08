<?php
require("testadmin.php");
$header=null;
$page_title="page d'administration";
include ("header.php");
?>
<h1>BIENVENUE SUR VOTRE SITE !!!</h1>
<?php
echo"<h4> Vous êtes connectés en tant que ($auth->role)</h4>";
?>
<div id="menu">
	<ul>
		<li> 
			<a> Mes évènements</a>
				<ul>
					<li> <a href="evenement_f.php">evenement ferme</a></li>
					<li> <a href="evenement_o.php">evenement ouvert</a></li>
					<li> <a href="ajouteve.php">ajouter  un evenement</a></li>
					<li> <a href="suppression.php">supprimer un evenement</a></li>
					<li> <a href="modifeve.php">modifier un evenement</a></li>
					<li> <a href="inscrirepers.php">inscription pour un evenement</a></li>
				</ul>
		</li>
	</ul>

	<ul>
		<li> 
			<a> Mes utilisateurs</a>
				<ul>
					<li> <a href="users.php">listes de tous mes utilisateurs</a></li>
					<li> <a href="ajout.php">ajouter un utilisateur</a></li>
					<li> <a href="supp.php">supprimer un utilisateur</a></li>
					<li> <a href="modifusers.php">modifier un utilisateur</a></li>
				</ul>
		</li>
	</ul>

	<ul>
		<li> 
			<a > Gerer mes identifications</a>
				<ul>
					<li> <a href="identif.php">listes de mes identifiants</a></li>
					<li> <a href="add_id.php">ajouter un identifiant</a></li>
					<li> <a href="supprimer_id.php">supprimer un identifiant</a></li>
					<li> <a href="modifier_id.php">modifier un identif</a></li>
				</ul>
		</li>
	</ul>

	<ul>
		<li> 
			<a > gestion des personnes</a>
				<ul>
					<li> <a href="listepers.php">listes de tous les personnes</a></li>
					<li> <a href="add_pers.php">ajouter une personne</a></li>
					<li> <a href="supr_pers.php">supprimer une personne</a></li>
					<li> <a href="modpers.php">modifier une pers</a></li>
				</ul>
		</li>
	</ul>

	
	<ul>
		<li> 
			<a >Tableau de bord</a>
				<ul>
					<li> <a href="particip.php">Des participations</a></li>
					<li> <a href="tab_bor_pers.php">D'une personne</a></li>
					<li> <a href="tabboreve.php">D'un evenement</a></li>
				</ul>
		</li>
	</ul>
	<ul>
		<li> 
			<a href="logout.php">Deconnexion</a>
		</li>
	</ul>
</div>
<?php
include("footer.php");
?>