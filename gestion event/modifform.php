<?php
    $header='modifusers';
  include ("header.php");
  $page_title="modification des donnees" ;
 ?>
<p class='center'>Introduisez votre nouveau mot de passe:

<div class='center'>
<form method="POST" action="">
  <table>
    <tr>
      <td class='left'>mot de passe:</td>
      <td class='right'><input type="text" name="password" size="20" required ></td>
    </tr>
     <tr>
      <td class='left'>confirmer le nouveau mot de passe:</td>
      <td class='right'><input type="text" name="password2" size="20" required ></td>
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
include ("footer.php");
?>