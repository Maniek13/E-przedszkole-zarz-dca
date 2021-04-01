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
	$OplataPobyt = $_POST['OplataPobyt'];
	$OplataPosilki = $_POST['OplataPosilki'];
	
	$_SESSION['blad'] = "Location: dodajoplate.php";
	if(preg_match('^[0-9]^', $IdDziecka) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $Miesiac) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $Rok) == false)
	die(require_once "blad.php");

	if(preg_match('/^[0-9\.]&/', $OplataPobyt) == false) 
	die(require_once "blad.php");

	if(preg_match('/^[0-9\.]&/', $OplataPosilki) == false)
	die(require_once "blad.php");

	unset($_SESSION['blad']);
	
	
	$sql = "SELECT * FROM oplaty WHERE IdDziecka = '$IdDziecka' and  Miesiac = '$Miesiac' and Rok = '$Rok'";
	if($rezultat = @$polaczenie->query($sql))
	{	
		$wyniki = $rezultat->num_rows;
		if($wyniki == 0)
		{
			$sql = "INSERT INTO oplaty (IdDziecka, Miesiac, Rok, OplataPobyt, OplataPosilki,  StatusOplaty) VALUES ('$IdDziecka', '$Miesiac', '$Rok', '$OplataPobyt', '$OplataPosilki', '0')";
		
			if($rezultat = @$polaczenie->query($sql))
			{
				header('Location: ksiegowa.php');
			}
		}
		else
		{
			echo "istnieją już takie dane";
		}
	
	}
	
	$polaczenie->close();	
}
?> 