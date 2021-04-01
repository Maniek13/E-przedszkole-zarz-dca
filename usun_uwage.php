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

	$IdUwagi = $_POST['IdUwagi'];
	$IdDziecka = $_POST['IdDziecka'];
	
	$_SESSION['blad'] = "Location: uwaga2.php";
	
	if(preg_match('^[0-9]^', $IdUwagi) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $IdDziecka) == false)
	die(require_once "blad.php");

	unset($_SESSION['blad']);

	$sql = "SELECT * FROM uwagi WHERE IdUwagi =  '$IdUwagi' AND IdDziecka = '$IdDziecka' ";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$uwaga = $rezultat->num_rows;
		if($uwaga >0)
		{ 			
			$sql2 = "DELETE FROM uwagi WHERE IdUwagi = '$IdUwagi' AND IdDziecka = '$IdDziecka'";
			
				if($rezultat2 = @$polaczenie->query($sql2))
				{
				header('Location: glowna.php');
		
				}
		}
		else
		{    
			
		}
	}
	
	$polaczenie->close();	
}
?> 