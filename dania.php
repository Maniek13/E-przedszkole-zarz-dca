<?php
session_start();
require_once "czyzalogowany.php";


?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - jadłospis</title>
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
				
				  <form action="wyloguj.php" method="GET">

											<button type="submit">Wyloguj</button>
				  </form>
				  
				  
					  <form action="jadlospis.php" method="GET">

										<button type="submit">Dodaj jadlospis</button>
				  </form>
				  
						<form action="posilki_dzieci_drukuj.php" method="GET">

										<button type="submit">Drukuj posiłki</button>
				  </form>
  
  
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>