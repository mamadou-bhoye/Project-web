<?php
$header='adminpage';
include("header.php");
?>
<p class='center'>Ajout d'un Evenement:</p>

<div class='center'>
<form method="POST" action="" >
  <table>
    <tr>
      <td class='left'>Intitule: </td>
      <td class='right'><input type="text" required name="intitule" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Description: </td>
      <td class='right'><input type="text" required name="description" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Date de Debut: </td>
      <td class='right'><input type="Date" required name="datedebut" placeholder= 'jj/mm/aaaa' size="20"></td>
    </tr>
    <tr>
      <td class='left'>Date de Fin: </td>
      <td class='right'><input type="Date" required name="datefin"  placeholder='jj/mm/aaaa' size="20"></td>
    </tr>
    </tr>
    <tr>
      <td class='left'>Type: </td>
      <td class='right'>
        <select required name="type">
          <option value='ferme'>fermé</option>
          <option value='ouvert'>ouvert</option>
        </select></td>
    </tr>
    <tr>
      <td class='left'>categorie: </td>
      <td class='right' size = "20">
      <select required name="categorie">
      	<?php
      	$SQL="SELECT *FROM categories";
      	$st=$db->query($SQL);
      	while ($row = $st->fetch()){ ?>

			<option value=<?= $row['cid'] ?>> <?= $row['nom'] ?> </option>
		
		<?php }?>
      </select>
      </td>
    </tr>
   </table>
<table cellspacing=2>
 <tr>
  <td class='left'><input type="submit" value="Valider" /></td>
  <td class='right'><input type="reset" value="Recommencer" /></td>
 </tr>
</table>
</form>
</div>
<?
include("footer.php");
?>