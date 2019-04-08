<?php
require ("auth.php");
if($auth->role !='admin')
{
	header("Location:guide.php");
}
?>