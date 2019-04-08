<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="acceuil.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?familly=open+sans:400,700">
  <title></title>
</head>
<body>


<div id ='back'><img src="img.jpg"></div>
<div class='log'>
<h1 class="center">Bienvenue sur votre site d'evenement</h1>
<h2>Veuillez vous identifier</h2>
<?php

if (isset($badlogin)) {
?>

<p class='info'>Identifiant ou mot de passe invalide! </p>
<p class='info'>Vérifiez les données svp.</p>

<?php
}
?>
<form method="POST" name="loginform" >
<div class="champ">
  <table class='center' border =0>

    <tr>
      <td class='droite' ><input type="text" name="login" placeholder='login' size="20" required value="<?= $data['nom']??""?>"></td>
    </tr>
    <tr>
      <td class='droite'><input type="password" name="password" placeholder='mot de passe' size="20" required value="<?= $data['nom']??""?>"></td>
    </tr>
  </table>
  <table>
  <button type="submit" value=Login >Se connecter</button>
</div>
</form>
</div>
