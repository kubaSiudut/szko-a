<?php
session_start();




$login = $_POST['lo'];
$pass = $_POST['pa'];

$login = htmlentities($login, ENT_QUOTES, "UTF-8"); // zabezpieczenie przed wstrzykiwaniem SQL
//$pass = htmlentities($login, ENT_QUOTES, "UTF-8"); // zabezpieczenie przed wstrzykiwaniem SQL



require_once 'db_connect.php';
//przygotowanie zapytania
$userQuery = $db->prepare('SELECT id,imie,nazwisko,klasa,pass,hash FROM uczniowie WHERE login = :login');
//bindowanie
$userQuery->bindValue(':login',$login,PDO::PARAM_STR);

$userQuery->execute();
$user = $userQuery->fetch(); 


// sprawdzenie zalogowania ucznia
// if(password_verify($pass,$user['hash']))
if($pass==$user['pass'])
{
	// logowanie powiodło się 
	$_SESSION['uczenLoggedIn']= true;
	$_SESSION['uczenID']= $user['id'];
	
// na wypadek gdyby nie doprowadzić do sytułacji że można byc jednocześnie zalogowanym za ucznia i nauczyciela

	unset($_SESSION['dyrektorLoggedIn']);
	unset($_SESSION['nauczycielLoggedIn']);


	unset($_SESSION['nauczycielLoggedIn']);
	unset($_SESSION['stanowiskoNauczyciela']);
	unset($_SESSION['nauczycielID']);
	
	 header("Location: panel_ucznia.php");
	 exit();
	
}else
{
	// sprawdzenie zalogowania nauczyciela
	//przygotowanie zapytania
	$userQuery = $db->prepare('SELECT id,imie,nazwisko,stanowisko,pass FROM nauczyciele WHERE login = :login');
	//bindowanie
	$userQuery->bindValue(':login',$login,PDO::PARAM_STR);

	$userQuery->execute();
	$user = $userQuery->fetch(); 


	if($pass==$user['pass'])
	{
		// logowanie powiodło się 
		
		
		if( $user['stanowisko']=='dyrektor') // logowanie dyrektora
		{
			$_SESSION['dyrektorLoggedIn']= true;
			$_SESSION['nauczycielID']= $user['id'];
			unset($_SESSION['uczenLoggedIn']);
			unset($_SESSION['dyrektorLoggedIn']);



			unset($_SESSION['nauczycielLoggedIn']);

			header("Location: panel_dyrektora.php");
		 exit();
		}else
		{
			$_SESSION['nauczycielLoggedIn']= true;
			$_SESSION['stanowiskoNauczyciela']= $user['stanowisko'];
			$_SESSION['nauczycielID']= $user['id'];
			
			unset($_SESSION['uczenLoggedIn']);
			unset($_SESSION['dyrektorLoggedIn']);
			header("Location: panel_nauczyciela.php");
			exit();
		}
	 
		
		
		 
		
	}else
	{
	 




		$_SESSION['bad_log']= true;
		header('Location: logowanie.php');
		
		exit();
	}
		
}

?>

