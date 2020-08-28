<?php
session_start( );

if(!isset($_SESSION['koszyk']))
{
	echo 'Koszyk jest pusty  <a href="Index.php" class="site-btn sb-dark">Powrót</a>';
}
else{
if(!isset($_SESSION["Zalogowany"]) or $_SESSION["Zalogowany"]=false)
echo 'musisz się zalogować  <a href="Index.php" class="site-btn sb-dark">Powrót</a>';

else
{
	require_once("connect.php");
					$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
					$id=$_SESSION['id'];
					$data=date("Y-m-d");
				
					
					foreach ($_SESSION['koszyk'] as &$value) {
					$koszt=$polaczenie->query("select Cena from towary where Id='$value'");
					 $row = mysqli_fetch_assoc($koszt);
					 $koszt=$row['Cena'];
					$polaczenie->query("insert into zamowienia values(null,$id,'$data',$koszt,$value)");
						
					
					
				
					}
					$polaczenie->close();
					
					
					echo 'Pomyślnie zamówiono 	<a href="Index.php" class="site-btn sb-dark">Powrót</a>';
	
}
}


?>
