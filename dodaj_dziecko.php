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
	$IdRodzica = $_POST['IdRodzica'];
	$IdDziecka = $_POST['IdDziecka'];
	$Imie = $_POST['Imie'];
	$Nazwisko = $_POST['Nazwisko'];
	$Grupa = $_SESSION['grupa'];
	$Wychowawca = $_SESSION['Dane'];
	$Informacje = $_POST['Informacje'];
	$_SESSION['blad'] = "location: dziecko.php";
	
	if(preg_match('^[0-9]^', $IdRodzica) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $IdDziecka) == false)
	die(require_once "blad.php");

	if(preg_match('^[a-zA-Z]^', $Imie) == false)
	die(require_once "blad.php");

	if(preg_match('^[a-zA-Z]^', $Nazwisko) == false)
	die(require_once "blad.php");

	if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $Informacje) == false)
	die(require_once "blad.php");
	
	unset($_SESSION['blad']);

	$max_rozmiar = 16000000;
	
    if ($_FILES['obrazek']['size'] < $max_rozmiar && $_FILES['obrazek']['type'] == ".jpg" &&  $_FILES['obrazek']['size'] > 10 ) 
	{
		$temp_name = $_FILES['obrazek']['tmp_name'];
		$file_path = $IdDziecka.".jpg";
		move_uploaded_file($temp_name, $file_path);
		
		
		$sql = "SELECT * FROM dzieci WHERE IdDziecka =  '$IdDziecka'";
	
		if($rezultat = @$polaczenie->query($sql))
		{
			$dziecko = $rezultat->num_rows;
			if($dziecko ==0)
			{ 			
				$sql2 = "INSERT INTO dzieci (UsersID, IdDziecka, Name, Surname, Grupa, Wychowawca, Info) 
				VALUES ('$IdRodzica', '$IdDziecka', '$Imie', '$Nazwisko', '$Grupa', '$Wychowawca', '$Informacje');";
				
					if($rezultat2 = @$polaczenie->query($sql2))
					{
					header('Location: glowna.php');
					}
			}
			else
			{
				echo "podane dziecko już istnieje";
			}
		}
    }
	
	else 
	{
		echo 'Zły plik! Wymagany typ .jpg, rozmiar 150x150, 2MB';
	}

	$polaczenie->close();	
}
?> 

