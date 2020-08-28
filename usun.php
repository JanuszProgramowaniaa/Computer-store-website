<?php
session_start();
require_once("connect.php");


$id=$_SESSION['id'];



$zapytanie="DELETE FROM klienci WHERE id=".$id;
$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);
if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	else
	$polaczenie->query($zapytanie );


session_unset();
header('location: index.php');

?>