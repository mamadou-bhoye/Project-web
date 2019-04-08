<?php
$header='adminpage';
?>
<p class='center'>Ajout d'un identifiant:</p>

<div class='center'>
<form method="POST" action="" >
  <table>
    <tr>
      <td class='left'>Nom de l'identifiant: </td>
      <td class='right'><input type="text" name="identifiant" size="20"></td>
    </tr>
   </table>
<table cellspacing=5>
 <tr>
  <td class='left'><input type="submit" value="Valider" /></td>
  <td class='right'><input type="reset" value="Recommencer" /></td>
 </tr>
</table>
</form>
</div>
<?php
include("footer.php");
?>