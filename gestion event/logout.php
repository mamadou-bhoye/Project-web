<?php

session_start();

session_destroy();
//print("<a href=\"index.php\">Revenir à l'acceuil</a>");
header("Location:index.php");


?>