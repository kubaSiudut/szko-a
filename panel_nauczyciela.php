<?php

session_start();

if(!isset($_SESSION['nauczycielLoggedIn']))
{
	header("Location: logowanie.php");
	exit();
}
else
{	$uczenID=$_SESSION['nauczycielID'];
	require_once 'db_connect.php';
	//przygotowanie zapytania
	$userQuery = $db->prepare('SELECT imie,nazwisko,pass,stanowisko FROM nauczyciele WHERE id = :id');
	//bindowanie
	$userQuery->bindValue(':id',$uczenID,PDO::PARAM_STR);

	$userQuery->execute();
	$user = $userQuery->fetch(); 
	$haslo=$user['pass'];
	
	$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
	}

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
				
				
				
				<!--
				<div class="czyszczenie"> 
				</div>
				-->
			</div>
			
				
			
			
			
			
			
			
			
			
			<div class="panelLogowania"> 
				<h1> Panel nauczyciela</h1>
				
				
				
				
				<?php
				echo  $user['imie']." ".$user['nazwisko']." ".$user['stanowisko']."<br>";
				
				?>
				
			
			
			
			
			<br></br>
				<h3> Wstaw ocenę  </h3>
				<form method="post" action="wstawOcene.php">
					<div class="row">
						<input type="text" name="imieUcznia" placeholder="Imię ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Imię ucznia'" >
							<br>
							<input type="text" name="nazwiskoUcznia" placeholder="Nazwisko ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwisko ucznia'" >
							
							</div>
							<?php
								if(isset($_SESSION['daneUczniaError']))
								{
									unset($_SESSION['daneUczniaError']);
									
									echo '<p style="color:red;">Proszę podać poprawne dane ucznia</p>';
	


								}									
							
							
							
							?>
							
							
							<div class="row">
							<label>Ocena <input type="number" name="ocena" step="1"  min="1" max="6" style="width: 3em;">  </label>
							
							<?php
								if(isset($_SESSION['ocenaNiePodana']))
								{
									unset($_SESSION['ocenaNiePodana']);
									echo '<p style="color:red;">Proszę podać ocenę</p>';
	


								}									
							
							
							
							?>
							
							</div>
							
							<div class="row">
						<input type="submit" value="Wstaw ocenę">
						</div>
							
							
							
							
				</form>
				
				<?php
					if(isset($_SESSION['dodanoOcene']))
						{
									unset($_SESSION['dodanoOcene']);
									echo '<p style="color:green;">Dodano ocenę</p>';
	


						}
				
				?>
				
				<h3> Wstaw uwagę </h3>
				<form method="post" action="wstawUwage.php">
					<div class="row">
						<input type="text" name="imieUcznia" placeholder="Imię ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Imię ucznia'" >
							<br>
							<input type="text" name="nazwiskoUcznia" placeholder="Nazwisko ucznia" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwisko ucznia'" >
							
							</div>
							<?php
								if(isset($_SESSION['daneUczniaUwagaError']))
								{
									unset($_SESSION['daneUczniaUwagaError']);
									
									echo '<p style="color:red;">Proszę podać poprawne dane ucznia</p>';
	


								}									
							
							
							
							?>
						<div class="row">
					<!--   <fieldset> fieldset robi obwolutke -->
					 
						<legend> Typ uwagi</legend><!-- opis/ podpis -->
						<!-- f              typ inputu    wartość         jaka zmienna PHP     wartość                                                                        -->
						<div><label><input type="radio" value="pozytywna" name="typUwagi" checked >pozytywna</label></div>
						<div><label><input type="radio" value="negatywna" name="typUwagi" >negatywna</label></div>
						
					
				</div>
				
				
				<div class="row">
				
					<div> <label for="comment">Treść uwagi   </label></div>
					<textarea  name="koment" id="comment" rows="5" cols="80"> </textarea> 

				
				</div>

							<div class="row">
						<input type="submit" value="Wstaw uwagę">
						</div>
							
							
							
							
				</form>
				
				<?php
					if(isset($_SESSION['dodanoUwage']))
						{
									unset($_SESSION['dodanoUwage']);
									echo '<p style="color:green;">Dodano uwagę</p>';
	


						}
				
				?>
				
				</div>
				
			
			
			
		

</body>

</html>


