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
	$login = $_POST['ID'];
	$haslo = $_POST['haslo'];
	
	$_SESSION['blad'] = "Location: rodzic.php";
	
	if(preg_match('^[a-zA-Z0-9]^', $haslo) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $login) == false)
	die(require_once "blad.php");
	
	unset($_SESSION['blad']);

	$sql = "SELECT * FROM konta WHERE UsersID =  '$login'";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow == 0)
		{ 			
			$sql2 = "INSERT INTO konta (UsersID, Password) VALUES ('$login',  '$haslo')";
			
				if($rezultat2 = @$polaczenie->query($sql2))
				{
				header('Location: glowna.php');
				}
		}
		else
		{
			echo "podane dane są już w użyciu";
		}
	}

$polaczenie->close();	
}
?> 