<?php 
session_start();
if(!isset($_SESSION['logged']))
{
	header('Location: index.php');
	exit();
}

require_once "connect.php";

$connect= @new mysqli($db_domain,$db_login,$db_password,$db_name);	//połączenie do bazy
if($connect->connect_errno!=0) //sprawdzenie czy polaczenie sie nie udało
{
	echo "Error;".$connect->connect_errno;	
}
else
{
	$name=$_SESSION['name'];
	unset($_SESSION['password_error']);
	$sql="SELECT password FROM accounts WHERE name='$name'";
	if($result=$connect->query($sql))	//wysłanie zapytania do bazy
	{
		$row=$result->fetch_assoc();
		$password=$row['password'];
		if($password==$_POST['password1'])
		{
			if($_POST['password2']==$_POST['password3'])
			{
				$new_pass=$_POST['password2'];
				$new_pass=htmlentities($new_pass,ENT_QUOTES,"UTF-8");
				$sql_update="UPDATE accounts SET password='$new_pass' WHERE name='$name'";
				$result1=$connect->query($sql_update);
				
			}
			else
			{
				$_SESSION['password_error']='<span style="color:red">Nowe wpisane hasła nie pokrywają się!</span>';
			}
		}
		else
		{
			$_SESSION['password_error']='<span style="color:red">Nieprawidłowe hasło!</span>';		//zero wyników loginu i hasła
		}
	$result->close();
	}
	
}
$connect->close();
header('Location: password.php');
