<?php
include 'db_config.php';
require("testadmin.php");


$page_title = "Ajout utilisateur";
$header='adminpage';
include("header.php");

if (!isset($_POST["login"]) || !isset($_POST["password"]) ||
    !isset($_POST["password2"])||!isset($_POST["nom"]) ||!isset($_POST["prenom"])){
//    echo "<p>Erreur dans les données\n";
    include("reg_form.php");
    include("footer.php");
   exit();
}


if ($_POST["password"] != $_POST["password2"]){
    echo "<p>Mots de passe différents\n";
   include("reg_form.php");
   include("footer.php");
   exit();
}

if(empty(trim($_POST['nom'])) || empty(trim($_POST['prenom'])) || empty(trim($_POST['login']))){
    echo "<p>Erreur dans les données\n";
   include("reg_form.php");
   include("footer.php");
   exit();    
}

 
  $mdp = sha1($_POST["password"]);

  $SQL = "SELECT id FROM users WHERE login=?";
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['login']]);

  $row = $st->fetch();

  if($row){
    echo "<p>Le login existe\n";
    include("reg_form.php"); 
    include("footer.php");
    exit(); 
  } 


  $SQL = "INSERT INTO users(nom,prenom,login,mdp) VALUES (?,?,?,?)"; 
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['nom'],$_POST['prenom'],$_POST['login'],$mdp]);

  if (!$res) die('Error: '); 
  
  $db=null; 

  echo "<p>Utilisateur $_POST[login] ajouté\n";
  echo "<p><a href='index.php'>Revenir à la page d'accueil</a>\n";
  include("footer.php");

?>