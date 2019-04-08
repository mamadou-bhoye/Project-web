<!DOCTYPE html>
<html>

<head>

   <link rel="stylesheet" type="text/css" href="style1.css">
    <title><?php if(isset($page_title)) echo "$page_title" ?> </title>
    <meta charset="utf-8" />
</head>
<body>
<div id ='back'><img src="img.jpg"></div>
<div class="log">
<?php
if($auth)
{if($header!=null)
	{
		echo"<p class='mbd'><a href=\"$header.php\">  Retour</a></p>";
	}
echo"<p class='bronx'> $auth->username <a class='linker' href=\"logout.php\">  Deconnexion</a></p>";
}
else
{
}
?>

