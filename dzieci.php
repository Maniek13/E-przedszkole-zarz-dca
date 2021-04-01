<?php

session_start();

require_once "polaczenie.php";

$grupa = $_SESSION['grupa'];

$polaczenie = new mysqli($db_servername, $db_username, $db_password, $db_name);


if ($polaczenie->connect_errno!=0) 
{
   echo "Error: ".$polaczenie->connect_errno;
}
else
{
	$sql = "SELECT * FROM dzieci WHERE grupa = '$grupa' ";
	
	if($rezultat = @$polaczenie->query($sql))
	{	
		$dzieci = $rezultat->fetch_all();
	
		$_SESSION['Dzieci'] = $dzieci;
		header('Location: glowna.php');
		
	}
	
	
$rezultat->free_resuly();
$polaczenie->close();	
}
?> 