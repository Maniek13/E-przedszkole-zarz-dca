<?php
session_start();

if(isset($_SESSION['kucharka']))
{
	$_SESSION['okej2'] = false;
	unset($_SESSION['kucharka']);
}
if(isset($_SESSION['ksiegowa']))
{
	$_SESSION['okej3'] = false;
	unset($_SESSION['ksiegowa']);
}
if(isset($_SESSION['przedszkolanka']))
{
	$_SESSION['okej1'] = false;
	unset($_SESSION['przedszkolanka']);
}		

$_SESSION['ile'] += 1;
		
			include "zledane.php";
			$use = new zledane;

 header('Location: index.php');


?>