<?php
session_start();
require_once "czyzalogowany.php";

?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - lista chętnych na posiłki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 <body>
  <header class="front-img">
        <div class="container-fluid h-100 ">
            <a class="navbar-brand">
                <img src="photo/logo.png" width="300" height="300" alt="">
            </a>
			<p></p>


<div class="row">
							<div class="col-sm-12 col-md-6 login">
               
<form  action="drukuj_posilki.php" method="POST" >
                    
                            <p><legend >Lista chętnych</legend></p>
							
                            <p><label for="data1">Data od</label></p>
                            <p><input type="date" name="data1" ></p>
							
							<p><label for="data2">Data od</label></p>
                            <p><input type="date" name="data2" ></p>
							
							<p><button type="submit" >Wyświetl pdf</button></p>
							
							
	
                        
                    </form>
			</div>
			</div>
			</header>
 </body>
</html>