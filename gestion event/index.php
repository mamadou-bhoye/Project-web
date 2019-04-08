<?php

require("auth.php");

if($auth->role == 'admin')
{
	header("Location: adminpage.php");
}
else
{
		header("Location: userpage.php");
}



include("footer.php");