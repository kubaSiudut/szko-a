<?php
session_start();
unset($_SESSION['uczenLoggedIn']);
unset($_SESSION['uczenID']);

unset($_SESSION['dyrektorLoggedIn']);

unset($_SESSION['nauczycielLoggedIn']);
unset($_SESSION['stanowiskoNauczyciela']);
unset($_SESSION['nauczycielID']);



header('Location: logowanie.php');