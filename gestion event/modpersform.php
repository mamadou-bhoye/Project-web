<?php
require("testadmin.php");
$header='adminpage';
include("header.php");
include("db_config.php");
?>
<p class='center'>MODIFICATION DES DONNEES:</p>

<div class='center'>
<form method="POST" action="" >
  <table>
   <tr>
      <td class='left'>Nom: </td>
      <td class='right'><input type="text" required value =<?= $username ?> name="nom"  size="20"></td>
    </tr>
     <tr>
      <td class='left'>Prenom: </td>
      <td class='right'><input type="text" required size="20" name="prenom" value =<?= $var ?> ></td>
    </tr>
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
      <td class='right'><input type="text" required value=<?= $test ?> name="valeur"  size="20"></td>
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