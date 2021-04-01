<?php
session_start();
require_once "czyzalogowany.php";

?>
<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - zatwierdz dokonanie platnosci</title>
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
					<form enctype="multipart/form-data" action="zatwierdz_oplate.php" method="POST" >
						<legend >Zatwierdź rachunek</legend>
						<div class="container">
							<div class="left">
									<label for="IdDziecka">Id Dziecka</label>
								<label for="Miesiac">Miesiąć 1-12</label>
								  <label for="Rok">Rok np: 1999</label>
							</div>
							<div class="right">
								<input type="text" name="IdDziecka"></p>
								<input type="text" name="Miesiac"></p>
									<input type="text" name="Rok"></p>
							</div>
						</div>
						<p style="font-size:16px; color: red; text-indent: 20%; "><?php if(isset($_SESSION['blad'])){echo "Zły format danych!"; unset($_SESSION['blad']);} ?></p>
						<button type="submit" >Zatwierdź</button>
 
					</form>
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>