<?php
require("testadmin.php");
include("header.php");

?>
<p class='center'>Introduisez vos données:</p>

<div class='center'>
<form method="POST" name="ajout d'un utilisateur" >
  <table>
    <tr>
      <td class='left'>Nom: </td>
      <td class='right'><input type="text" name="nom" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Prénom: </td>
      <td class='right'><input type="text" name="prenom" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Login: </td>
      <td class='right'><input type="text" name="login" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Mot de passe:</td>
      <td class='right'><input type="password" name="password" size="20"></td>
    </tr>
    <tr>
      <td class='left'>Répéter le mot de passe:</td>
      <td class='right'><input type="password" name="password2" size="20"></td>
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