<?php 
	
session_start();

if(!isset($_SESSION['dyrektorLoggedIn']))
{
	header("Location: logowanie.php");
	exit();
}else
	{
	$imie = $_POST['imieNauczyciela'];	
	$nazwisko = $_POST['nazwiskoNauczyciela'];
	$stanowisko = $_POST['stanowisko'];
	$loginNowegoNauczyciela = $_POST['loginNauczyciela'];

	$pass1= $_POST['pass1'];
	$pass2= $_POST['pass2'];
		
			
	require_once 'db_connect.php';
	//przygotowanie zapytania

	$userQuery = $db->prepare('INSERT INTO nauczyciele VALUES(NULL,:imie,:nazwisko,:stanowsko,:login,:pass,:hash)');


	//bindowanie
	$userQuery->bindValue(':imie',$imie,PDO::PARAM_STR);
	$userQuery->bindValue('nazwisko',$nazwisko,PDO::PARAM_STR);
	$userQuery->bindValue(':stanowsko',$stanowisko ,PDO::PARAM_STR);
	$userQuery->bindValue(':pass',$pass1,PDO::PARAM_STR);
	$userQuery->bindValue(':login',$loginNowegoNauczyciela,PDO::PARAM_STR);
	$userQuery->bindValue(':hash',$loginNowegoNauczyciela,PDO::PARAM_STR);
	

	$userQuery->execute();
	
	$_SESSION['dodanoNauczyciela']=true;
	header('Location: panel_dyrektora.php');
	
}						
						
?>
						