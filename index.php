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
				
				<div id="logowanie"> 
						
					<a href="logowanie.php"><h1>Logowanie </h1></a>
						
				</div>
				
				
				
				<!--
				<div class="czyszczenie"> 
				</div>
				-->
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
							
								<a href="Szkoła.html">Aktualności</a>
							</li>
							<li>
								    <a href="doPobrania.html">Do pobrania</a>
							</li>
							
							<li>
								<p> Kontakt </p>
							</li>
					</ul>
					
				
				
				
				
				
			
				
				<div>
								<div class="czyszczenie"> 
				</div>
			</div>	
			
			
			
			
			
			
			
			
			<div id="content"> 
			
			<?php
 	if(!isset($_COOKIE['wizyta']))
 	{
 		setcookie('wizyta', time(), time() + 30 * 86400);
 		echo 'Witaj, gościu.';
 	}
 	else
 	{
 		setcookie('wizyta', time(), time() + 30 * 86400);
 		echo '<p>Witaj, ostatni raz odwiedziłeś nas '.date('d.m.Y, H:i', $_COOKIE['wizyta']).'</p>';	
 	}
 
?>
				<h1> Wybrano nowgo dyrektora</h1>
				<div id="obr"> 
					<img src="dyrektor.jpg" alt="Dyrektor Mietek" 
								title="Dyrektor Mietek"  />
							
				
				</div>
				
				<p>  
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
				Nowym dyrektorem szkoły wybrano Mietka, on nuczy dzieci to co sam umie najlepiej.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id 
				Nowym dyrektorem szkoły wybrano Mietka, on nuczy dzieci to co sam umie najlepiej.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
				Nowym dyrektorem szkoły wybrano Mietka, on nuczy dzieci to co sam umie najlepiej.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim idNowym dyrektorem szkoły wybrano Mietka, on nuczy dzieci to co sam umie najlepiej.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
				Nowym dyrektorem szkoły wybrano Mietka, on nuczy dzieci to co sam umie najlepiej.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id</p>
				</div>
				
		
				
				
				
				
			</div>
			
			
		

</body>

</html>