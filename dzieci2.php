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
	$sql = "SELECT * FROM dzieci ";
	
	if($rezultat = @$polaczenie->query($sql))
	{	
		$dzieci = $rezultat->fetch_all();
	
		$_SESSION['Dzieci2'] = $dzieci;
		header('Location: dania.php');
		
	}
	
	
$rezultat->free_resuly();
$polaczenie->close();	
}
?> 