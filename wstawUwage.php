<?php
session_start();

$imieUcznia = $_POST['imieUcznia'];
$nazwiskoUcznia = $_POST['nazwiskoUcznia'];
$typUwagi = $_POST['typUwagi'];
$uwaga =  $_POST['koment'];


echo $imieUcznia.'<br>';
echo $nazwiskoUcznia.'<br>';
echo $typUwagi.'<br>';
echo $uwaga.'<br>';



// połączenie z bazą danych 
require_once 'db_connect.php';
$query= $db->query("SELECT id FROM uczniowie WHERE imie='$imieUcznia' AND nazwisko='$nazwiskoUcznia' ");

if($idUcznia=$query->fetch())
{
	
		
		$insertQuery = $db->prepare('INSERT INTO uwagi VALUES(NULL,:id_ucznia,:id_nauczyciela,:content,:typ,:data)');
	$insertQuery->bindValue(':id_ucznia',$idUcznia['id'],PDO::PARAM_STR);
	$insertQuery->bindValue(':id_nauczyciela',$_SESSION['nauczycielID'],PDO::PARAM_STR);
	$insertQuery->bindValue(':content',$uwaga,PDO::PARAM_STR);
	$insertQuery->bindValue(':typ',$typUwagi,PDO::PARAM_STR);
	$dataUwagi= date('Y-m-d H:i:s');
	$insertQuery->bindValue(':data',$dataUwagi,PDO::PARAM_STR);
	$insertQuery->execute();
	
	$_SESSION['dodanoUwage']=true;
	header('Location: panel_nauczyciela.php');
	exit();
	
		
	
}else
{
	// walidacja danych ucznia nie poprawna brak takiego ucznia w bazie
	$daneOK = false;
	
	$_SESSION['daneUczniaUwagaError']= true;
	header('Location: panel_nauczyciela.php');
	
	
}
	
$query->closeCursor();
exit();


?>