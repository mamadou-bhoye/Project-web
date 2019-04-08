<?php
?>
<p class='center'>IDENTIFICATION:</p>

<div class='center'>
<form method="POST" action="" >
  <table>
    <tr>
      <td class='left'>type d'identifiant: </td>
      <td class='right' size = "20">
      <select name="ident">
        <?php 
        $SQL="SELECT *FROM itypes";
        $st=$db->query($SQL);
        while ($row = $st->fetch()){ ?>

      <option value=<?= $row['tid'] ?>> <?= $row['nom'] ?> </option>
    
    <?php }?>
      </select>
      </td>
    </tr>

    <tr>
      <td class='left'>valeur d'identifiant: </td>
      <td class='right'><input type="text" required value name="valeur"  size="20"></td>
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
