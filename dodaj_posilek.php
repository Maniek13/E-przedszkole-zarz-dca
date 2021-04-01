<?php

session_start();

require_once "polaczenie.php";


$IdDzieci = $_SESSION['Dzieci2'];
$data = $_POST['data'];
$posilek1 = $_POST['posilek1'];
$posilek2 = $_POST['posilek2'];
$posilek3 = $_POST['posilek3'];

$_SESSION['blad'] = "Location: jadlospis.php";
	
if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $posilek1) == false)
	die(require_once "blad.php");

if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $posilek2) == false)
	die(require_once "blad.php");

if(preg_match('^[a-zA-Z0-9\.\ \-\-_]^', $posilek3) == false)
	die(require_once "blad.php");

unset($_SESSION['blad']);

$polaczenie = new mysqli($db_servername, $db_username, $db_password, $db_name);


if ($polaczenie->connect_errno!=0) 
{
   echo "Error: ".$polaczenie->connect_errno;
}
else
{
	$sql = "SELECT * FROM posilki WHERE Data = '$data' ";
	
	if($rezultat = @$polaczenie->query($sql))
	{	
		$wyniki = $rezultat->num_rows;
		if($wyniki == 1)
		{
			$sql2a = "UPDATE posilki SET  Data = '$data', Posilek1 = '$posilek1', Posilek2 = '$posilek2', Posilek3 = '$posilek3' WHERE Data = '$data'";
			$polaczenie->query($sql2a);
		}
		else
		{
			
			$sql2b = "INSERT INTO posilki (`Data`, `Posilek1`, `Posilek2`, `Posilek3`) VALUES ('$data',  '$posilek1',  '$posilek2',  '$posilek3')";
			$polaczenie->query($sql2b);
				
			for($i = 0; $i<count($IdDzieci); $i++)
			{
			$k = $IdDzieci[$i][1];
			$sql3 = "INSERT INTO dzieciposilki (`IdDziecka`, `Data`, `Posilek1`, `Posilek2`, `Posilek3`) VALUES ('$k', '$data',  '1',  '1',  '1')";
			$polaczenie->query($sql3);
			}
		}
		
		
			header('location: dania.php');
		

	}
	
			
$polaczenie->close();	
}

?> 

