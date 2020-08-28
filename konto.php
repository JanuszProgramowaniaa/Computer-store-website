<?php
if(isset($_POST['imie']))
{
	
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$wszystko=true;
	if((strlen($imie)<3) || (strlen($imie)>20) )
	{
	
		$wszystko=false;
		$_SESSION['e_imie']="Imie musi posiadać od 3 do 20 znaków!";
	}
if(ctype_alnum($imie)==false)
	{
		
		$wszystko=false;
		$_SESSION['e_imie']="Imie moze skladac sie tylko z liter i cyfry(bez polsich znakow)";
		
	}
	
	$nazwisko=$_POST['nazwisko'];
	if((strlen($nazwisko)<3) || (strlen($nazwisko)>20) )
	{
	
		$wszystko=false;
	$_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
	}
	
	if(ctype_alnum($nazwisko)==false)
	{
		$wszystko=false;
		$_SESSION['e_nazwisko']="Nazwisko moze skladac sie tylko z liter i cyfry(bez polsich znakow)";
		
	}
	if($wszystko==true)
	{
		  session_start();
	 require_once("connect.php");
    $polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
    
	$id= $_SESSION['id'];
	
	
	
	
	
	$polaczenie->query("UPDATE klienci
                      SET imie =  '$imie'
                      WHERE id= '$id'");

	
	$polaczenie->query("UPDATE klienci
                      SET nazwisko =  '$nazwisko'
                      WHERE id= '$id'");

    $_SESSION['imie']=$imie;
	 $_SESSION['nazwisko']=$nazwisko;
	
	$polaczenie->close();

	}
   
    
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Sklep komputerowy x86</title>
	<meta charset="UTF-8">
	<meta name="description" content="Sklep internetowy z czesciami do komputera">
	<meta name="keywords" content="procesory, karty, graficzne, klawiatury">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>

<style>
.container{
	text-align:center;
	margin:auto;
}

</style>
	
</head>
<body>
<div class="container">
<h1>Panel użytkownika </h1>

       <a href="info.php"> <button type="button" name="Usun">Informacje o koncie</button></a><br><br>
	  <a href="usun.php"> <button type="button" name="Usun">Usuń konto</button></a><br><br><br>
	  <form name="zmiana" action="konto.php" method="POST">
	  Imie<br> <input type="text" name="imie"   ><br>
	  <?php
		if(isset($_SESSION['e_imie']))
		{
			echo '<div class="error">'.$_SESSION["e_imie"].'</div>';
			unset($_SESSION['e_imie']);
		}
		
		
		?>
	  Nazwisko <br><input type="text" name="nazwisko"   >
	  <?php
	  if(isset($_SESSION['e_nazwisko']))
		{
			echo '<div class="error">'.$_SESSION["e_nazwisko"].'</div>';
			unset($_SESSION['e_nazwisko']);
		}
	  
	  ?><br><br>
	  <button type="submit" >Zmień Imie i nazwisko</button><br><br><br>
	 
	  
	  </form>
	  
	<button type="button" onclick="alert('W pracy')">Pokaż twoje zamówienia</button><br><br>
	 
	 <a href="index.php"><button type="button">Powrót</button></a>
	
</div>
	</body>
</html>
