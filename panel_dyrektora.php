<?php

session_start();

if(!isset($_SESSION['dyrektorLoggedIn']))
{
	header("Location: logowanie.php");
	exit();
}


	$nauczycielID=$_SESSION['nauczycielID'];
	require_once 'db_connect.php';
	//przygotowanie zapytania
	$userQuery = $db->prepare('SELECT imie,nazwisko,pass FROM nauczyciele WHERE id = :id');
	//bindowanie
	$userQuery->bindValue(':id',$nauczycielID,PDO::PARAM_STR);

	$userQuery->execute();
	$user = $userQuery->fetch(); 
	$haslo=$user['pass'];
	
	$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
	

?>


<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title>Szkoła </title>
	<meta name="description" content="Szkoła podstawowa w Łękach>
	<meta name="keywords" content="edukacja nauka szkoła">
	<meta name="author" content="Sołtys Jan Kopytko">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="main.css"  type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" >
	<link rel="shortcut icon" href="logo.jpg">
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
</head>



<body>
		
			<div id="top">
				<div id="napis"> <h1> Szkoła Podstawowa <br> w <br>  Łękach</h1> 
				
				</div>
				<div id="tabliczka"> 
				
				</div>
				
				<div id="logowanie"> 
						
					<a href="logOut.php"><h1>Wylogowanie </h1></a>
						
				</div>
				
				
				
				
				<div class="czyszczenie"> 
				</div>
				
			</div>
			
				
			
			
			
			
			
			
			
			
			<div class="panelLogowania"> 
				<h1> Panel dyrektora: </h1>
				
				
				
				
				<?php
				echo  $user['imie']." ".$user['nazwisko']."<br>";
				
				?>
				<br></br>
				<h3> Dodaj ucznia </h3>
				<form method="post" action="dodajUcznia.php">
					<div class="row">
						<input type="text" name="imieUcznia" placeholder="Imię ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Imię ucznia'" >
							<br>
							<input type="text" name="nazwiskoUcznia" placeholder="Nazwisko ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwisko ucznia'" >
							<br>
							</div>
							
							
							
							<div class="row">
							<label>Klasa <input type="number" name="klasa" step="1"  min="1" max="8" style="width: 3em;">  </label>
							
							</div>
							
							
							
							
							<div class="row">
						
							<input type="text" name="login" placeholder="Login ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Login ucznia'" >
							</div>
							<div class="row">
							<input type="password" name="pass1" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
							</div>
							<div class="row">
							<input type="password" name="pass2" placeholder="Powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
							</div>
							<br>
							<div class="row">
						<input type="submit" value="Dodaj ucznia">
						</div>
						
						<?php
							if(isset($_SESSION['dodanoUcznia']))
							{
									
								unset($_SESSION['dodanoUcznia']);
								echo '<p style="color:green;">Dodano nowego ucznia</p>';
								
							}
						
						?>
						
						
						
						<h1> Lista uczniów w szkole: </h1>
						
				</form>
				
				<?php 
						
							for($i = 1; $i < 9; $i++)
							{
								echo "<h4>Klasa: ".$i." </h4>";
								$listaUczniow = $db->query("SELECT imie,nazwisko,klasa FROM uczniowie WHERE klasa='$i'");
								
								foreach( $listaUczniow as $uczen)
								{
									echo $uczen['imie'].' ';
									echo $uczen['nazwisko'].' <br>';
									 
									
									
								}
								unset($listaUczniow);
							}
												
				?>
				
				
				
				<h3> Dodaj nauczyciela</h3>
				<form method="post" action="dodajNauczyciela.php">
					<div class="row">
						<input type="text" name="imieNauczyciela" placeholder="Imię Nauczyciela" onfocus="this.placeholder=''" onblur="this.placeholder='Imię Nauczyciela'" >
							<br>
							<input type="text" name="nazwiskoNauczyciela" placeholder="Nazwisko Nauczyciela" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwisko Nauczyciela'" >
							<br>
							</div>
							
							
							
							<div >
					<!-- lista rozwijana --> 
					<!-- id  jest dla HTMLa i CSSa a name dla PHP i serwera --> 
					<label for="stanowisko"> Stanowisko</label>
					<select id="stanowisko" name="stanowisko">
						<option value="matematyk">matematyk</option>
						<option value="polonista" selected >polonista</option>
						<option value="anglista">anglista</option>
						<option value="nauczyciel plastyki">nauczyciel plastyki</option>
						<option value="nauczyciel techniki">nauczyciel techniki</option>
						<option value="WF">WF</option>
					</select>	
				</div>
							
							
							
							
							<div class="row">
						
							<input type="text" name="loginNauczyciela" placeholder="Login Nauczyciela" onfocus="this.placeholder=''" onblur="this.placeholder='Login Nauczyciela'" >
							<br>
							<input type="password" name="pass1" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
							
							<br>
							<input type="password" name="pass2" placeholder="Powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
							</div>
							
							<div class="row">
						<input type="submit" value="Dodaj Nauczyciela">
						</div>
						
						
						
						
						<?php
							if(isset($_SESSION['dodanoNauczyciela']))
							{
									
								unset($_SESSION['dodanoNauczyciela']);
								echo '<p style="color:green;">Dodano nowego nauczyciela</p>';
								
							}
						
						?>
						
						
						
				</form>
						<h1> Lista nauczycieli: </h1>
						<?php 
						
							
							
								$listaNauczycieli = $db->query("SELECT * FROM nauczyciele ");
								
								
								
								foreach( $listaNauczycieli as $nauczyciel)
								{
									echo $nauczyciel['imie'].' ';
									echo $nauczyciel['nazwisko'].' ';
									echo $nauczyciel['stanowisko'].' <br>';
									 
									
									
								}
								unset($listaNauczycieli);
							
												
				?>
						
						</div>
						
				
			</div>
				
				
				
				
			
			
			
		

</body>

</html>


