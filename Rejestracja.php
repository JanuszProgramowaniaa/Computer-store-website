<?php
session_start();

if(isset($_FILES['obrazek']))
{
	
	if ($_FILES['obrazek']['type'] != 'image/jpeg')
	{
		$wszystko=false;
		$_SESSION['e_plik']="Błedny format pliku musi być jpeg!!";
	}
}

if(isset($_POST['email']) )
{
	
	
	$wszystko=true;
	
	$imie=$_POST['Imie'];
	if((strlen($imie)<3) || (strlen($imie)>20) )
	{
	
		$wszystko=false;
		$_SESSION['e_imie']="imie musi posiadać od 3 do 20 znaków!";
	}
	if(ctype_alnum($imie)==false)
	{
		
		$wszystko=false;
		$_SESSION['e_imie']="Nick moze skladac sie tylko z liter i cyfry(bez polsich znakow)";
		
	}
	
	$nazwisko=$_POST['Nazwisko'];
	if((strlen($nazwisko)<3) || (strlen($nazwisko)>20) )
	{
	
		$wszystko=false;
		$_SESSION['e_nazwisko']="nazwisko musi posiadać od 3 do 20 znaków!";
	}
	if(ctype_alnum($nazwisko)==false)
	{
		$wszystko=false;
		$_SESSION['e_nazwisko']="nazwisko moze skladac sie tylko z liter i cyfry(bez polsich znakow)";
		
	}
	
	$login=$_POST['Login'];
	if((strlen($login)<3) || (strlen($login)>20) )
	{
	
		$wszystko=false;
		$_SESSION['e_login']="login musi posiadać od 3 do 20 znaków!";
	}
	if(ctype_alnum($login)==false)
	{
		$wszystko=false;
		$_SESSION['e_login']="login moze skladac sie tylko z liter i cyfry(bez polsich znakow)";
		
	}
	
	$email=$_POST['email'];
	$emailb=filter_var($email,FILTER_SANITIZE_EMAIL);
	
	if(  (filter_var($emailb,FILTER_VALIDATE_EMAIL)==false)  || ($email!=$emailb)      )
	{
	
		$wszystko=false;
		$_SESSION['e_email']="Podaj poprawny email";
		
	}
	$haslo1=$_POST["haslo1"];
	$haslo2=$_POST["haslo2"];
	
	if((strlen($haslo1)<8) || (strlen($haslo1)>20) )
	{
		
		$wszystko=false;
		$_SESSION['e_haslo1']="Haslo musi posiadać od 8 do 20 znakow";
		
		
	}
	
	if($haslo1!=$haslo2)
	{
		
		$wszystko=false;
		$_SESSION['e_haslo1']="Podane hasla nie są identyczne";
		
		
	}
	$haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);
	if(!isset($_POST['regulamin']))
	{
		
		$wszystko=false;
		$_SESSION['e_regulamin']="Zaakceptuj regulamin";
	}
	
	$telefon=$_POST['telefon'];
	$adres=$_POST['adres'];
	$kod=$_POST['kod'];
	
	if(strlen($telefon)<8)
	{
		$wszystko=false;
		$_SESSION['e_telefon']="Podaj poprawny telefon";
		
		
	}
	if(strlen($adres)<4)
	{
		$wszystko=false;
		$_SESSION['e_adres']="Podaj poprawny adres";
		
		
	}
	if(strlen($kod)<5)
	{
		$wszystko=false;
		$_SESSION['e_kod']="Podaj poprawny kod pocztowy";
		
		
	}
	
	
	require_once("connect.php");
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
	{
		$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
		if($polaczenie->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
		
		$rezultat=$polaczenie->query("select id from klienci where email= '$email' ");
		
		if(!$rezultat) throw new Exception($polaczenie->error);
		
		
		$ile_takich_maili=$rezultat->num_rows;
		
		if($ile_takich_maili>0)
		{
			$wszystko=false;
		$_SESSION['e_email']="Istnieje juz konto przypisane do tego adresu e-mail";
		
		
			
		}
		
		
		$rezultat=$polaczenie->query("select id from klienci where login= '$login' ");
		
		if(!$rezultat) throw new Exception($polaczenie->error);
		
		
		$ile_takich_loginow=$rezultat->num_rows;
	
		if($ile_takich_loginow>0)
		{
			$wszystko=false;
		$_SESSION['e_login']="Istnieje juz konto z takim loginem";
		
		
			
		}
		
		
		if($wszystko==true)
	{
	   if($polaczenie->query("insert into klienci values(null,'$imie','$nazwisko','$emailb',2,'$haslo_hash','$login','$telefon','$adres','$kod') "))
	   {
		    $lokalizacja = 'temp/'.$login.'.jpg';

  if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
  {
    if(!move_uploaded_file($_FILES['obrazek']['tmp_name'], $lokalizacja))
    {
      echo 'problem: Nie udało się skopiować pliku do katalogu.';
        return false;  
    }
  }
  else
  {
    echo 'problem: Możliwy atak podczas przesyłania pliku.';
	echo 'Plik nie został zapisany.';
    return false;
  }
		   
		   $_SESSION['udanarejestracja']=true;
		   header('Location: index.php');
	   }
	   else{
		   
		   throw new Exception($polaczenie->error);
	   }
	
				
			}
		
		
		$polaczenie->close();
	}
	
	}
	
	catch(Exception $e)
	{
		echo '<span style="color:red">Bład serwera! Przepraszamy za niedogodnosci i prosimy o rejestracje w innym terminie!</span> ';
		
	}
	
	
	
	
	
	
	
}





?>




<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Rejestracja</title>
		<style>
		a{
			color:black;
			text-decoration:none;
			
		}
		h3{
			text-align:center;
		}
		form{
			text-align:center;
		}
		.error{
			color:red;
			margin-top:10px;
			margin-bottom:10px;
		}
		footer{
			text-align:center;
			font-size:30px;
		}
		
		</style>
		<link rel="stylesheet" type="text/css" href="Style/main.css" >

	</head>
	<body>
	
	
	<h3>Rejestracja</h3>
		<form enctype="multipart/form-data" name="rejestracja" method="POST">
		Imie <br/><input type="text" name="Imie"><br/>
		<?php
		if(isset($_SESSION['e_imie']))
		{
			echo '<div class="error">'.$_SESSION["e_imie"].'</div>';
			unset($_SESSION['e_imie']);
		}
		
		
		?>
		
		
		<br/>
		Nazwisko <br/><input type="text" name="Nazwisko"><br/>
		<?php
		if(isset($_SESSION['e_nazwisko']))
		{
			echo '<div class="error">'.$_SESSION["e_nazwisko"].'</div>';
			unset($_SESSION['e_nazwisko']);
		}
		
		
		?>
		
		<br/>
		Login <br/><input type="text" name="Login"><br/>
		<?php
		if(isset($_SESSION['e_login']))
		{
			echo '<div class="error">'.$_SESSION["e_login"].'</div>';
			unset($_SESSION['e_login']);
		}
		
		?>
		
		<br/>
		Haslo <br/><input type="password" name="haslo1"><br/>
		<?php
		if(isset($_SESSION['e_haslo1']))
		{
			echo '<div class="error">'.$_SESSION["e_haslo1"].'</div>';
			unset($_SESSION['e_haslo1']);
		}
		
		
		?>
		
		
		
		<br/>
		Powtórz Haslo<br/> <input type="password" name="haslo2"><br/><br/>
		
		
		
		
		E-mail <br/><input type="text" name="email"><br/>
		<?php
		if(isset($_SESSION['e_email']))
		{
			echo '<div class="error">'.$_SESSION["e_email"].'</div>';
			unset($_SESSION['e_email']);
		}
		?>
		<br/>
		Telefon<br/> <input type="text" name="telefon"><br/>
		<?php
		if(isset($_SESSION['e_telefon']))
		{
			echo '<div class="error">'.$_SESSION["e_telefon"].'</div>';
			unset($_SESSION['e_telefon']);
		}
		?>
		<br/>
		Adres<br/> <input type="text" name="adres"><br/>
		<?php
		if(isset($_SESSION['e_adres']))
		{
			echo '<div class="error">'.$_SESSION["e_adres"].'</div>';
			unset($_SESSION['e_adres']);
		}
		?>
		<br/>
		Kod pocztowy<br/> <input type="text" name="kod"><br/>
		<?php
		if(isset($_SESSION['e_kod']))
		{
			echo '<div class="error">'.$_SESSION["e_kod"].'</div>';
			unset($_SESSION['e_kod']);
		}
		?>
		<br/>
		<br/>
		<label>
		<input type="checkbox" name="regulamin"> Akceptuje Regulamin<br/>
		
		
		<br/>
		
		
		<?php
		if(isset($_SESSION['e_regulamin']))
		{
			echo '<div class="error">'.$_SESSION["e_regulamin"].'</div>';
			unset($_SESSION['e_regulamin']);
		}
		
		
		?>
		
		</label>
		
		<br/>
		Wgraj avatar</br>
		<input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br>
         <input type="file" name="obrazek" /><br></br>
		 <?php
		if(isset($_SESSION['e_plik']))
		{
			echo '<div class="error">'.$_SESSION["e_plik"].'</div>';
			unset($_SESSION['e_plik']);
		}
		?>
		
		<input type="submit" value="Zarejestruj"> 
		</form>
		<br>
		<footer><a href="index.php" >Powrót</a></footer>
		
	</body>
</html>