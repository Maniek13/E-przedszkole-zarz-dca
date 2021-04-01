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
	$grupa = $_POST['grupa'];
		$_SESSION['przedszkolanka'] = false;
	if(preg_match('^[a-zA-Z0-9]^', $haslo) == false)
	die(require_once "zle_dane.php");

	if(preg_match('^[a-zA-Z0-9]^', $login) == false)
	die(require_once "zle_dane.php");
	
	if(preg_match('^[a-zA-Z0-9]^', $grupa) == false)
	die(require_once "zle_dane.php");
		unset($_SESSION['przedszkolanka']);
	
	$_SESSION['grupa'] = $grupa;
	
	$sql = "SELECT * FROM administratorzy WHERE AdminId =  '$login' AND Password = '$haslo' AND Grupa = '$grupa'";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{ 			
			$wiersz = $rezultat->fetch_assoc();
			$_SESSION['grupa'] = $wiersz['Grupa'];
			$_SESSION['Zalogowany1'] = true;
			$_SESSION['okej1'] = true;
			$_SESSION['Dane'] = $wiersz['Dane'];
			unset($_SESSION['Zalogowany2']);
			unset($_SESSION['Zalogowany3']);
			header('Location: dzieci.php');
		
		}
		else
		{
			$_SESSION['ile'] += 1;
		
			include "zledane.php";
			$use = new zledane;
			
			$_SESSION['okej1'] = false;
			header('Location: ekran_logowania.php');
		}
	}
	$rezultat->free_resuly();
	
$polaczenie->close();	
}
?> 
