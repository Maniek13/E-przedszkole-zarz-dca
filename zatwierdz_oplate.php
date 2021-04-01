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
	$IdDziecka = $_POST['IdDziecka'];
	$Miesiac = $_POST['Miesiac'];
	$Rok = $_POST['Rok'];

	$_SESSION['blad'] = "Location: zatwierdzoplate.php";
	
	if(preg_match('^[0-9]^', $IdDziecka) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $Miesiac) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $Rok) == false)
	die(require_once "blad.php");

	unset($_SESSION['blad']);

	$sql = "UPDATE oplaty SET StatusOplaty = '1' WHERE IdDziecka = '$IdDziecka' and Miesiac = '$Miesiac' and Rok = '$Rok'";

	if($rezultat = @$polaczenie->query($sql))
	{
		
			header('Location: ksiegowa.php');
	}

	$polaczenie->close();	
}
?> 