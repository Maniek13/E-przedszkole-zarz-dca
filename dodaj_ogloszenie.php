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
	$Tytul = $_POST['Tytul'];
	$Ogloszenie = $_POST['Ogloszenie'];
	$Grupa = $_SESSION['grupa'];
	$DataWygasniecia = $_POST['DataWygasniecia'];
	$Data = date("Y-m-d");
	$IdOgłoszenia = $_POST['IdOgłoszenia'];
	$_SESSION['blad'] = "Location: ogloszenia.php";
	
	if(preg_match('^[0-9]^', $IdOgłoszenia) == false)
	die(require_once "blad.php");

	if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $Ogloszenie) == false)
	die(require_once "blad.php");

	unset($_SESSION['blad']);

	$sql = "SELECT * FROM ogloszenia WHERE IdOgłoszenia =  '$IdOgłoszenia'";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$ogloszenie = $rezultat->num_rows;
		
		if($ogloszenie == 0)
		{
			$sql2 = "INSERT INTO ogloszenia (IdOgłoszenia, DataWygasniecia, Grupa, Ogloszenie, Data, Tytul) VALUES ('$IdOgłoszenia', '$DataWygasniecia', '$Grupa', '$Ogloszenie', '$Data', '$Tytul')";
		
			if($rezultat = @$polaczenie->query($sql2))
			{
				header('Location: glowna.php');
			}
		}
		else
		{
			echo "Ogłoszenie o podanym ID już istnieje";
		}
	
	}
	
	$polaczenie->close();	
}
?> 