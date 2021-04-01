<?php
session_start();
require_once "czyzalogowany.php";

$x = $_SESSION['Dzieci'];
$data = date("Y-m-d");
$grupa = $_SESSION['grupa'];
echo '  <html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - dziennik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="dziennik.css">
 <body>
  <header class="front-img">
        <div class="container-fluid h-100 ">
            <a class="navbar-brand">
                <img src="photo/logo.png" width="300" height="300" alt="">
            </a>
			<p></p>
						<div class="row">
				<div class="col-sm-12 col-md-6 login">
<form enctype="multipart/form-data" action="dodaj_obecnosci.php" method="POST" >


	<legend >'."$data".'</legend> <br/>
	<legend >Dziennik grupy: '."$grupa".'</legend> <br/>
    <div class="container">
        <div class="left">';
							

for ($i = 0; $i < count($x); $i++) 
{
    $z = $x[$i][2]."".$x[$i][3];
	echo '  <label for="'.$z.'">'.$x[$i][2]." ".$x[$i][3].'</label>';
	echo '<input type="checkbox" name="'.$z.'" value ="1"  ></p>';
}

echo '</div>
        <div class="right">



        </div>
    </div>
						<button type="submit" >Dodaj</button>
					</form>
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>
 ';
?>

