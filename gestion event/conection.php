<?php

include("index.php");

include("header.php");
if ($role==['admin']){
	echo"vous etes admin";
	
}

else{

echo "On est sur la page principale";
}
include("footer.php");