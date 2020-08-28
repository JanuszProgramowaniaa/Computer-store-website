<?php
session_start();
require_once("connect.php");

  
  echo '
<html>
	<head>
		<meta charset="UTF-8">
		<title>Logowanie</title>
		<link rel="stylesheet" type="text/css" href="Style/main.css" >
		<style>
		
		body{
			text-align:center;
			
		}
		
		</style>
	</head>
	<body>

	<table align="center">
   <tr>
      <td>Avatar</td> <td><img src="temp/'.$_SESSION['login'].'.jpg" alt="Avatar" width="200" height="200"></td> 
   </tr>
   <tr>
      <td>Imie</td> <td>'.$_SESSION['imie'].'</td> 
   </tr>
   <tr>
      <td>Nazwisko</td> <td>'.$_SESSION['nazwisko'].'</td> 
	  </tr>
	  <tr>
	  <td>Email</td> <td>'.$_SESSION['email'].'</td> 
	  </tr>
	  <tr>
	  <td>Login</td> <td>'.$_SESSION['login'].'</td> 
	  </tr>
	  <tr>
	  <td>Telefon</td> <td>'.$_SESSION['telefon'].'</td> 
	  </tr>
	  <tr>
	  <td>Adres</td> <td>'.$_SESSION['adres'].'</td> 
	
   </tr>
    <tr>
	  <td>Kod pocztowy</td> <td>'.$_SESSION['kod_pocztowy'].'</td> 
	
   </tr>
</table>
 <a href="konto.php"><button type="button">Powrót</button></a>
		
	</body>
</html>
';
  
  
  
  
  




?>