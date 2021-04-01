<?php
session_start();

if((isset($_SESSION['Zalogowany1'])) && ($_SESSION['Zalogowany1'] == true))
{
	header('Location: dzieci.php');
}
else
{
	if((isset($_SESSION['Zalogowany2'])) && ($_SESSION['Zalogowany2'] == true))
	{
		header('Location: dzieci2.php');
	}
	else
	{
	if((isset($_SESSION['Zalogowany3'])) && ($_SESSION['Zalogowany3'] == true))
	{
		header('Location: ksiegowa.php');
	}
	else
	{
	header('location: ekran_logowania.php');
	}
	}
}
?>

