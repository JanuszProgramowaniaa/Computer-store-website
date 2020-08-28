<?php
require_once("connect.php");
session_start();


if(isset($_SESSION['Zalogowany']))
{
	header('Location: index.php');
	exit();
}
else
{
echo '
<html>
	<head>
		<meta charset="UTF-8">
		<title>Logowanie</title>
		<link rel="stylesheet" type="text/css" href="Style/main.css" >
		<style>
		a.logo{
			color:black;
			text-decoration:none;
		}
		body{
			text-align:center;
		}
		footer{
			
			font-size:30px;
			
		}
		a{
			text-decoration:none;
			color:black;
		}
		</style>
	</head>
	<body>
	<h1>Logowanie do serwisu</h1>
		<form  method="POST" action="Logowanie.php">
		Login <input type="text" name="login">  <br/><br/>
		Haslo <input type="password" name="haslo"><br/><br/>
		<input type="submit" value="Zaloguj">
		</form>
		<footer><a href="index.php" >Powrót</a></footer>
		
	</body>
</html>
';
if(isset($_SESSION['blad'])){
		echo $_SESSION['blad'];
		unset($_SESSION['blad']);
}
		
		
		
if(isset($_POST["login"]) &&  isset($_POST["haslo"])  )
{
	
	
	
	$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	
	else{
	$login=$_POST["login"];
	$haslo=$_POST["haslo"];
		
	$login = htmlentities($login,ENT_QUOTES,"UTF-8");	
	
		
		
		
		if(	$rezultat=@$polaczenie->query(
		sprintf("select * from klienci where BINARY login='%s' "  ,
		mysqli_real_escape_string($polaczenie,$login))))
		{
			
			$ilu_userow=$rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz=$rezultat->fetch_assoc();
				
				
				
		        if(password_verify($haslo,$wiersz['haslo'])==true )
					{
						$poprawe=password_verify($haslo,$wiersz['haslo']);
					$_SESSION["Zalogowany"]=true;
					
					$_SESSION['id']=$wiersz['id'];
					$_SESSION['imie']=$wiersz['imie'];
					$_SESSION['nazwisko']=$wiersz['nazwisko'];
					$_SESSION['status']=$wiersz['status'];
					$_SESSION['login']=$wiersz['login'];
					$_SESSION['telefon']=$wiersz['telefon'];
					$_SESSION['adres']=$wiersz['adres'];
					$_SESSION['kod_pocztowy']=$wiersz['kod_pocztowy'];
					$_SESSION['email']=$wiersz['email'];
					
					$_SESSION['Koszyk']=0.00;
					$rezultat->free();
					header('Location: index.php');
					}
					else
					{
						echo "<span style='color:red'>Zly login lub haslo</span>";
					}
				
			}
			else
					{
						echo "<span style='color:red'>Zly login lub haslo</span>";
					}
			
			
		}
		
		
		
		$polaczenie->close();
	}
	
	
	
	
	
	
	
	
}
}

?>
