<?php

session_start();

if(!isset($_SESSION['uczenLoggedIn']))
{
	header("Location: logowanie.php");
	exit();
}
else
{	$uczenID=$_SESSION['uczenID'];
	require_once 'db_connect.php';
	//przygotowanie zapytania
	$userQuery = $db->prepare('SELECT imie,nazwisko,klasa,pass FROM uczniowie WHERE id = :id');
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
				<h1> Panel ucznia</h1>
				
				
				
				
				<?php
				echo  $user['imie']." ".$user['nazwisko']." klasa ".$user['klasa'];
				
				?>
				<h3> Oceny: </h3>
				
				
				<h4> Matematyka: </h4>
				<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='matematyka'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				<h4> Język polski: </h4>
				<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='język polski'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				<h4> Język angielski: </h4>
					<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='język angielski'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				<h4> Plastyka: </h4>
					<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='plastyka'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				<h4> Technika: </h4>
				<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='technika'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				<h4> WF: </h4>
				<?php 
					
					$listaOcen = $db->query("SELECT * FROM oceny WHERE id_ucznia ='$uczenID' AND przedmiot='WF'");
					foreach($listaOcen as $ocena)
					{
						
						echo $ocena['ocena'].",";
					}
					unset($listaOcen);
				
				?>
				
				
				<br>
				<h3> Uwagi: </h3>
				
				
			
			
			<?php 
				$listaUwag = $db->query("SELECT uwagi.id_nauczyciela,uwagi.content,uwagi.typ,uwagi.data,nauczyciele.imie,nauczyciele.nazwisko FROM uwagi,nauczyciele WHERE uwagi.id_ucznia ='$uczenID' AND uwagi.id_nauczyciela=nauczyciele.id");
				foreach($listaUwag as $uwaga)
				{	
					if($uwaga['typ']=='pozytywna')
					{
						echo '<div class="uwagaPozytywna">';
					
					}else
					{
						echo '<div class="uwagaNegatywna">';
						
					}
					
					echo $uwaga['data'].' <br>'.$uwaga['content'].'<br>';
					echo $uwaga['imie'].' '.$uwaga['nazwisko'].'</div>';
						
						
				}
				unset($listaUwag);
			
			
			
			
			?>
			
			</div>
				
				
				
				
			
			
			
		

</body>

</html>


