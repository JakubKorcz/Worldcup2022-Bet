<?php 
session_start();
if(!isset($_SESSION['logged']))
{
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Gujarati:wght@400;700&display=swap" rel="stylesheet"> <!-- import czcionki -->
	<title>Mundial Katar 2022</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php require_once "navigation.php"; ?>
	<div id="main">
	
<form action="post_password.php" method="post">
	<h1>Zmień swoje hasło</h1>
	<h4>Wpisz aktualne hasło</h4>
	<input type="password" class="login" name="password1" placeholder="Haslo" /> 
	<h4>Wpisz nowe hasło</h4>
	<input type="password" class="login" name="password2" placeholder="Haslo" /> 
	<h4>Wpisz nowe hasło jeszcze raz</h4>	<!-- pole tekstowe login -->
	<input type="password" class="login" name="password3" placeholder="Haslo"/>  <!-- pole tekstowe haslo -->
	<input type="submit" value="Zmień hasło" /> <!-- przycisk zaloguj sie -->
</form>
<?php if(isset($_SESSION['password_error']))
	echo $_SESSION['password_error']; ?> <!-- napis że login jest nie poprawny -->
</body>