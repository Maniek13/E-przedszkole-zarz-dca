<?php


if((isset($_SESSION['Zalogowany1']) and $_SESSION['Zalogowany1'] == true) or (isset($_SESSION['Zalogowany2']) and $_SESSION['Zalogowany2'] == true)  or (isset($_SESSION['Zalogowany3']) and $_SESSION['Zalogowany3'] == true) )
{
	
}
else
{
	header('location: index.php');
}

?>