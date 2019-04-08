<?php
require ("auth.php");
if($auth->role !='user')
{
	header("Location:guide.php");
}
?>