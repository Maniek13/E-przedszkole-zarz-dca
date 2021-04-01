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
	$Uwaga = $_POST['Uwaga'];
	$IdDziecka = $_POST['IdDziecka'];
	$IdUwagi = $_POST['IdUwagi'];
	$Data = $_POST['Data'];
	$_SESSION['blad'] = "Location: uwaga.php";
	
	if(preg_match('^[0-9]^', $IdUwagi) == false)
	die(require_once "blad.php");

	if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $Uwaga) == false)
	die(require_once "blad.php");

	if(preg_match('^[0-9]^', $IdDziecka) == false)
	die(require_once "blad.php");

	unset($_SESSION['blad']);

	$sql = "SELECT * FROM uwagi WHERE IdUwagi =  '$IdUwagi' and IdDziecka ='$IdDziecka'";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		
		$ile = $rezultat->num_rows;
		
		if($ile != 0)
		{ 			
			echo "Uwaga o podanym id już istnieje";
		}
		else
		{
		$sql2 = "INSERT INTO uwagi (IdDziecka, Uwaga, IdUwagi, Data) VALUES ('$IdDziecka', '$Uwaga', '$IdUwagi', '$Data');";

			if($rezultat = @$polaczenie->query($sql2))
			{
				
			header('Location: glowna.php');
		
			}
		
		}
	}
	

	$polaczenie->close();	
}
?> 