<?php
function verifDate($var)
{
	if(preg_match('#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#', $var))
	{
		$jour=intval(preg_replace('#^([0-9]{2})(/[0-9]{2})/([0-9]{4})$#', '$1',$var));
		$mois=intval(preg_replace('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#', '$2',$var));
		$annee=intval(preg_replace('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#', '$3',$var));
		if(checkdate($jour, $mois, $annee))
		{
		$date=preg_replace('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#', '$3-$2-$1',$var);
		return $date;
		}
		else
		{
			echo"la date n'est pas valide";
			return NULL;
		}
	}
	else
	{
		return NULL;
	}

}
?>