<?php
session_start();
include "zledane.php";$use = new zledane;
$a = "disabled";
?>

<html>
     <head>
        
	  <meta charset="UTF-8">
    <title>  E-przedszkole - Logowanie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="">
 <body>
  <header class="front-img">
        <div class="container-fluid h-100 ">
            <a class="navbar-brand">
                <img src="photo/logo.png" width="300" height="300" alt="">
            </a>
			<p></p>
			<div class="row">
                <div class="col-sm-12 col-md-6 login">
					<form enctype="multipart/form-data" action="zaloguj.php" method="POST" >
						<legend >Przedszkolanka</legend>
						<div class="container">
							<div class="left">
								<label for="login">Login</label>
								<label for="haslo">Hasło</label>
								<label for="grupa">Grupa</label>
								<button type="submit" <?php if(isset($_SESSION['czas'])){echo $a;}?> >Zaloguj</button>
							</div>
							<div class="right">
								<input type="text" name="login"></p>
								<input type="password" name="haslo"></p>
								<input type="text" name="grupa"></p>
								<p  style="font-size:12px; color: red; "><?php if(isset($_SESSION['czas'])){echo 'Za dużo razy wpisano niepoprawne dane'; }
								elseif( isset($_SESSION['okej1']) and $_SESSION['okej1'] == false){echo 'Niepoprawne dane';}?></p>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-6 login">
					<form enctype="multipart/form-data" action="zalogujkucharka.php" method="POST" >
						<legend >Menu</legend>
						<div class="container">
							<div class="left">
								<label for="IdRodzica">Login</label>
								<label for="IdDziecka">Hasło</label>
								<button type="submit" <?php if(isset($_SESSION['czas'])){echo $a;}?> >Zaloguj</button>
							</div>
							<div class="right">
								<input type="text" name="login"></p>
								<input type="password" name="haslo"></p>
								<p  style="font-size:12px; color: red;"><?php if(isset($_SESSION['czas'])){echo 'Za dużo razy wpisano niepoprawne dane'; }
								elseif(isset($_SESSION['okej2']) and  $_SESSION['okej2'] == false){echo 'Niepoprawne dane';}?></p>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<div class="row">
                <div class="col-sm-12 col-md-6 login">
						<form enctype="multipart/form-data" action="zalogujksiegowa.php" method="POST" >
							<legend >Opłaty</legend>
							<div class="container">
								<div class="left">
									<label for="IdRodzica">Login</label>
									<label for="IdDziecka">Hasło</label>
									<button type="submit" <?php if(isset($_SESSION['czas'])){echo $a;}?> >Zaloguj</button>
								</div>
								<div class="right">
									<input type="text" name="login"></p>
									<input type="password" name="haslo"></p>
									<p  style="font-size:12px; color: red;  "><?php if(isset($_SESSION['czas'])){echo 'Za dużo razy wpisano niepoprawne dane'; }
									elseif(isset($_SESSION['okej3']) and $_SESSION['okej3'] == false){echo 'Niepoprawne dane';}?></p>
								</div>
							</div>
						</form>	
				</div>
			</div>
		</div>
 </header>	
 </body>
</html>