<?php
include("header.php");
require("testadmin.php");
?>
<p class='center'>Modifier d'une personne:</p>

<div class='center'>
<form method="POST" action="" >
  <table>
    <tr>
      <td class='left'>Nom: </td>
      <td class='right'><input type="text" name="nom" size="20"></td>
    </tr>
    <tr>
      <td class='left'>prenom: </td>
      <td class='right'><input type="text" name="prenom" size="20"></td>
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