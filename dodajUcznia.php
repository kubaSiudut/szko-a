<?php 
	
session_start();

if(!isset($_SESSION['dyrektorLoggedIn']))
{
	header("Location: logowanie.php");
	exit();
}else
	{
	$imie = $_POST['imieUcznia'];	
	$nazwisko = $_POST['nazwiskoUcznia'];
	$klasa = $_POST['klasa'];
	$loginNowegoUcznia = $_POST['login'];

	$pass1= $_POST['pass1'];
	$pass2= $_POST['pass2'];
		
			
	require_once 'db_connect.php';
	//przygotowanie zapytania

	$userQuery = $db->prepare('INSERT INTO uczniowie VALUES(NULL,:imie,:nazwisko,:klasa,:pass,:login,:hash)');


	//bindowanie
	$userQuery->bindValue(':imie',$imie,PDO::PARAM_STR);
	$userQuery->bindValue('nazwisko',$nazwisko,PDO::PARAM_STR);
	$userQuery->bindValue(':klasa',$klasa,PDO::PARAM_STR);
	$userQuery->bindValue(':pass',$pass1,PDO::PARAM_STR);
	$userQuery->bindValue(':login',$loginNowegoUcznia,PDO::PARAM_STR);
	$userQuery->bindValue(':hash',$loginNowegoUcznia,PDO::PARAM_STR);
	$userQuery->execute();
	
	$_SESSION['dodanoUcznia']=true;

	header('Location: panel_dyrektora.php');
	
}						
						
?>
						