<?php
session_start();
require_once "czyzalogowany.php";

?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 <body>
  <header class="front-img">
	
				
			<div class="container-fluid h-100 ">
				<a class="navbar-brand">
					<img src="photo/logo.png" width="300" height="300" alt="">
				</a>
				<div class="row">
		<div class="col-sm-12 col-md-6 login">
				
				<p></p>
			 <form action="wyloguj.php" method="GET">
				<button type="submit">Wyloguj</button>
			  </form>
			  <form action="rodzic.php" method="GET">
				<button type="submit">Dodaj użytkownika</button>
			  </form>
			  <form action="dziecko.php" method="GET">
			  <button type="submit">Dodaj dziecko</button>
			  </form>
			  
				<form action="uwaga.php" method="GET">
				<button type="submit">Dodaj uwagę</button>
			  </form>
			  <form action="uwaga2.php" method="GET">
			  <button type="submit">Usuń uwagę</button>
			  </form>
				<form action="dziennik.php" method="GET">
				<button type="submit">Dziennik</button>
			  </form>
				<form action="ogloszenia.php" method="GET">
				<button type="submit">Dodaj ogłosznie</button>
			  </form>
			  
			</div>
	</div>
	</div>
 </header>	
 </body>
</html>