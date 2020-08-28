<?php

  if (isset($_REQUEST['e-mail'])            )  {
  
  
  $admin_email = "sklepkomputerowyx86@gmail.com";
  $email = $_REQUEST['e-mail'];
  $subject = $_REQUEST['temat'];
  $comment = $_REQUEST['Wiadomosc'];
  
  
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
 
  echo 'Dziękujemy za kontakt z nami!  <a href="index.php"><button type="button">Powrót</button></a>';
  
  }
  
  
  else  {
header("Location: contact.php");
  }
?>