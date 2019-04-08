<?php
session_start();
include 'db_config.php';
require 'Authentification.class.php';

$redirect = function ($first){
    //include("header.php");
    if(!$first) $badlogin = true;
    include("login_form.php");
    include("footer.php");
    exit();
    
};

$auth = new Authentification($db,$redirect);
    
if (!$auth->authentificate()){

    exit();
}


// $auth->username
// $auth->userid

?>
