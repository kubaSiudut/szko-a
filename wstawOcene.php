<?php
session_start();

$imieUcznia = $_POST['imieUcznia'];
$nazwiskoUcznia = $_POST['nazwiskoUcznia'];
$ocena = $_POST['ocena'];

echo $imieUcznia.'<br>';
echo $nazwiskoUcznia.'<br>';
echo $ocena.'<br>';

// walicacja oceny

$daneOK = true;
if($ocena==null ||$ocena>6 ||$ocena<1 )
{
	$_SESSION['ocenaNiePodana']= true;
	$daneOK = false;
	
	
}

// połączenie z bazą danych 
require_once 'db_connect.php';
$query= $db->query("SELECT id FROM uczniowie WHERE imie='$imieUcznia' AND nazwisko='$nazwiskoUcznia' ");

	if($idUcznia=$query->fetch())
{
	
		
		echo "Podano dane ucznia o id ". $idUcznia['id'];
	
		
	
}else
{
	// walidacja danych ucznia nie poprawna brak takiego ucznia w bazie
	$daneOK = false;
	
	$_SESSION['daneUczniaError']= true;
	header('Location: panel_nauczyciela.php');
	exit();
	
}
	
$query->closeCursor();

if($daneOK)
{
	// wstawianie oceny do bazy
	if($_SESSION['stanowiskoNauczyciela']=="matematyk") // wystawianie oceny przez matematyka
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','matematyka',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	
	if($_SESSION['stanowiskoNauczyciela']=="polonista") // wystawianie oceny przez poloniste
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','język polski',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	if($_SESSION['stanowiskoNauczyciela']=="anglista") // wystawianie oceny przez nauczyciela angielskiego
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','język angielski',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	
	if($_SESSION['stanowiskoNauczyciela']=="nauczyciel plastyki") // wystawianie oceny przez nauczyciela plastyki
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','plastyka',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	
	if($_SESSION['stanowiskoNauczyciela']=="nauczyciel techniki") // wystawianie oceny przez nauczyciela techniki
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','technika',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	
	if($_SESSION['stanowiskoNauczyciela']=="WF") // wystawianie oceny przez wuefiste
	{
	$insertQuery = $db->prepare('INSERT INTO oceny VALUES(NULL,:id_ucznia,:ocena,:przedmiot)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':ocena',$ocena,PDO::PARAM_STR);
	$insertQuery->bindValue(':przedmiot','WF',PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoOcene']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	}
	
	
	
}else
{
	header('Location: panel_nauczyciela.php');
	exit();
}

?>