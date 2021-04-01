<?php

session_start();

require_once "polaczenie.php";

$polaczenie = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($polaczenie->connect_errno!=0) 
{
   echo "Error: ".$polaczenie->connect_errno;
}
else
{
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$_SESSION['ksiegowa'] = false;
	if(preg_match('^[a-zA-Z0-9]^', $haslo) == false)
	die(require_once "zle_dane.php");

	if(preg_match('^[a-zA-Z0-9]^', $login) == false)
	die(require_once "zle_dane.php");
	unset($_SESSION['ksiegowa']);
	$sql = "SELECT * FROM administratorzy WHERE AdminId =  '$login' AND Password = '$haslo'";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{ 			
			$_SESSION['okej3'] = true;
			$_SESSION['Zalogowany3'] = true;
			unset($_SESSION['Zalogowany1']);
			unset($_SESSION['Zalogowany2']);
			header('Location: ksiegowa.php');
		
		}
		else
		{
			$_SESSION['ile'] += 1;
			
			include "zledane.php";
			$use = new zledane;
			
			$_SESSION['okej3'] = false;
			header('Location: ekran_logowania.php');
		}
	}
	$rezultat->free_resuly();
	
$polaczenie->close();	
}
?> 


