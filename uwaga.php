<?php
session_start();
require_once "czyzalogowany.php";

?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkolanka - dodawanie uwagi</title>
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
		 <form enctype="multipart/form-data" action="dodaj_uwage.php" method="POST" >





    <legend >Dodaj uwagę</legend>
    <div class="container">
        <div class="left">
            <label for="IdDziecka">Id dziecka</label>
            <label for="IdUwagi">Numer uwagi</label>
			<label fot="Data">Data</label>
            <label for="Uwaga">Uwaga</label>
        </div>
        <div class="right">
            <input type="text" name="IdDziecka"></p>
            <input type="text" name="IdUwagi"></p>
			<input type="date" name="Data"></p>
            <textarea name="Uwaga" cols="80" rows="5"></textarea></p>		
        </div>
    </div>
		<p style="font-size:16px; color: red; text-indent: 20%; "><?php if(isset($_SESSION['blad'])){echo "Zły format danych!"; unset($_SESSION['blad']);} ?></p>
        <button type="submit" >Dodaj</button>

</form>
				
  
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>