
<?php
session_start();
if(isset($_SESSION['dyrektorLoggedIn']))
{	
	header("Location: panel_dyrektora.php");
	exit();
}
if(isset($_SESSION['nauczycielLoggedIn']))
{	
	header("Location: panel_nauczyciela.php");
	exit();
}
if(isset($_SESSION['uczenLoggedIn']))
{	
	header("Location: panel_ucznia.php");
	exit();
}


?>



<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title>Szkoła </title>
	<meta name="description" content="Szkoła podstawowa w Swędziworach">
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
				
				<div class="czyszczenie"> 
				</div>
				
			</div>
			
			<div id="menutop"> 
			
				 
					
					<ul>
						<li> <p>Plan lakcji</p>
						
							<ul>
								<li> <a href="klasa1.html">Klasa 1</a>   </li>
								<li> <a href="klasa2.html">Klasa 2</a>   </li>
								<li> <a href="klasa3.html">Klasa 3</a>   </li>
								<li> <a href="#">Klasa 4</a>   </li>
								<li> <a href="#">Klasa 5</a>   </li>
								<li> <a href="#">Klasa 6</a>   </li>
							</ul>
						</li>
							
							<li>
								<p> E-Dziennik </p>
							</li>
							<li>
								<a href="index.php">Aktualności</a>
							</li>
							<li>
								<a href="doPobrania.html">Do pobrania</a>
							</li>
							
							<li>
								<p> Kontakt </p>
							</li>
					</ul>
					
				
				
				
				
				
				
				<!--
				<div class="kafelek"> 
					<p> E-Dziennik </p>
				</div>
				
				<div class="kafelek"> 
					<p> Do pobrania </p>
				</div>
				<div class="kafelek"> 
					<p> Galeria </p>
				</div>
				
				<div class="kafelek">
					<p> Kontakt </p>
					
					-->
				
				<div>
								<div class="czyszczenie"> 
				</div>
			</div>	
			
			
			
			
			
			
			
			
			<div id="content"> 
			<div class="panelLogowania">
				<p>Logowanie</p>
					
				
					<form method="post" action="log.php">
					
						<input type="text" name="lo" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'" >
							<br></br>
						<input type="password" name="pa" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
							<br></br>
						<input type="submit" value="Zaloguj się">
						
						<?php 
							if(isset($_SESSION['bad_log']))
							{
								unset($_SESSION['bad_log']);
								
								echo "<p> Błędne dane logowania</p>";
								echo "<br>";
								echo password_hash("qwerty123", PASSWORD_DEFAULT);
								
							}
						
						?>
					
					</form>
					
					
					
					</div>
			</div>
			
			
		

</body>

</html>