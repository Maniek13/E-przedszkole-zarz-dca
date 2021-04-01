<?php
session_start();
require_once "czyzalogowany.php";

?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - dodawanie posiłków</title>
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
				
<form enctype="multipart/form-data" action="dodaj_posilek.php" method="POST" >
                  
                            <p>Dodaj jadłospis</p>
							
                           <p><label for="data">Data</label>
                            <input type="date" name="data" ></p>
							
							
                            <p><label for="posilek1">Śniadanie</label></p>
                       
							<textarea input type="text" name="posilek1" cols="100" rows="5"></textarea>
							
							<p><label for="posilek2">Drugie śniadanie</label></p>
                            <textarea input type="text" name="posilek2" cols="100" rows="5"></textarea>
							
                            <p><label for="posilek3">Obiad</label></p>
                           <textarea input type="text" name="posilek3" cols="100" rows="5"></textarea>
							<p style="font-size:16px; color: red; text-indent: 10%; "><?php if(isset($_SESSION['blad'])){echo "Zły format danych!"; unset($_SESSION['blad']);} ?></p>
							<p><button type="submit" >Dodaj lub zaktualizuj posiłek</button></p>
							
							
	
                    </form>
				
  
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>