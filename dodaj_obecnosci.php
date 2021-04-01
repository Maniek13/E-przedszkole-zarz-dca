<?php

session_start();

$x = $_SESSION['Dzieci'];
$rok = date("Y");
$miesiac = date("n");
$dzien = date("j");

$grupa = $_SESSION['grupa'];

require_once "polaczenie.php";

$polaczenie = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($polaczenie->connect_errno!=0) 
{
   echo "Error: ".$polaczenie->connect_errno;
}
else
{
	$sql0 = "SELECT * FROM obecnosci WHERE Miesiac = '$miesiac' and Rok = '$rok' and  Grupa = '$grupa' and Dzien = '$dzien'";
		
	if($rezultat = @$polaczenie->query($sql0))
	{
		$dzien2 = $rezultat->num_rows;

		for ($i = 0; $i < count($x); $i++)
		{
			$temp = $x[$i][2]."".$x[$i][3];
			$iddziecka = $x[$i][1];

			if($dzien2 == 0)
			{
					if( isset($_POST[$temp]) and $_POST[$temp] == "1") 
					{
						$sql = "INSERT INTO obecnosci (IdDziecka, Grupa, Miesiac, Rok, Dzien, Obecnosc) VALUES ('$iddziecka', '$grupa', '$miesiac', '$rok', '$dzien', '1' )";
						@$polaczenie->query($sql);	
					}
					else
					{
						$sql = "INSERT INTO obecnosci (IdDziecka, Grupa, Miesiac, Rok, Dzien, Obecnosc) VALUES ('$iddziecka', '$grupa', '$miesiac', '$rok','$dzien', '0' )";
						@$polaczenie->query($sql);	
					}
			}
			else
			{
				if( isset($_POST[$temp]) and $_POST[$temp] == "1") 
				{
					$sql = "UPDATE obecnosci SET IdDziecka = '$iddziecka', Grupa = '$grupa', Miesiac = '$miesiac', Rok = '$rok', Dzien = '$dzien', Obecnosc = '1' WHERE Miesiac = '$miesiac' and Rok = '$rok' and IdDziecka = '$iddziecka' and Dzien = '$dzien'";
					@$polaczenie->query($sql);	
				}
				else
				{
					$sql = "UPDATE obecnosci SET IdDziecka = '$iddziecka', Grupa = '$grupa', Miesiac = '$miesiac', Rok = '$rok', Dzien = '$dzien', Obecnosc = '0' WHERE Miesiac = '$miesiac' and Rok = '$rok' and IdDziecka = '$iddziecka' and Dzien = '$dzien' ";
					@$polaczenie->query($sql);	
				}	
			}
		}	
	
	}

	header('Location: glowna.php');
	$polaczenie->close();	
}


?> 

