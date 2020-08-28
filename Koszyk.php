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


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	
</head>
<body>
	
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
					
						<a href="./index.php" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="Wyszukaj.php" method="POST">
							<input type="text" placeholder="Wyszukiwarka" name="dane">
							<button type="submit" ><i class="flaticon-search"></i></button>
							
							
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
								<div class="up-item">
							
								<?php
								session_start();
								if(!isset($_SESSION["Zalogowany"]))
								{ 
								echo '  	<i  class="flaticon-profile"></i> ';
							echo '<a href="Logowanie.php"  >Zaloguj</a> lub <a href="Rejestracja.php"  >Stwórz konto</a>';
								}
								else
								{
									echo '<a href="logout.php"> <i  class="flaticon-profile"></i> </a>';
									
									echo 'Zalogowany  <a href="konto.php" style="color:red;"> '.$_SESSION['login']."</a> ";
									
								}
								?>
								
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span><?php
									if(isset($_SESSION['koszyk']))
										echo count($_SESSION['koszyk']); 
									else echo 0 ;?></span>
								</div>
								<a href="Koszyk.php" >Koszyk zakupowy</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
			
				<ul class="main-menu">
					<li><a href="#">Kategorie</a>
						<ul class="sub-menu">
							<li><a href="Procesory.php">Procesory</a></li>
							<li><a href="Karty.php">Karty graficzne</a></li>
							<li><a href="Monitory.php">Monitory</a></li>
							<li><a href="Obudowy.php">Obudowy</a></li>
							<li><a href="Akcesoria.php">Akcesoria</a></li>
						</ul>
					</li>
				
					
					<li><a href="Promocje.php">Promocje</a></li>
					<li><a href="Onas.php">O nas</a></li>
					<li><a href="Contact.php">Kontakt</a></li>
			
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Kategoria</h4>
			<div class="site-pagination">
				<a href="">Główna</a> /
				<a href="">Koszyk</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
 <?php 
 
 if(isset($_GET['usun']))
 {
	 unset($_SESSION['koszyk']);
	 unset($_SESSION['usun']);
 }
 
 if(isset($_GET['id']) ){
	 if(!isset($_SESSION['koszyk']))
$_SESSION['koszyk']=array();


	 $stan=true;
	 
	 
	 
foreach ($_SESSION['koszyk'] as &$value) {
       if($value==$_GET['id']) $stan=false;
	   
}

if($stan) array_push($_SESSION['koszyk'], $_GET['id']);

 }



 require_once("connect.php");
					$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
					$result = mysqli_query($polaczenie,"select * from towary where id=1 ");
                    $row = mysqli_fetch_assoc($result)
 ?>


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Twój koszyk</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								
							</thead>
							<tbody>
								
								
								<?php
								if(isset($_SESSION['koszyk']))
								{
								$koszt=0; 
								
								foreach ($_SESSION['koszyk'] as &$value) {
                                $result = mysqli_query($polaczenie,"select * from towary where id='$value' ");
                                $row = mysqli_fetch_assoc($result);
								echo'
								<tr>
								
									<td class="product-col">
										<img src="img/cart/3.jpg" alt="">
										<div class="pc-title">
											<h4>'.$row["Nazwa"].' </h4>
											<p>'.$row["Cena"].' zł </p>
										</div>
									
									
								
									
								</tr>';
								$koszt+=$row["Cena"];
								}
								}
								else
									echo "koszyk pusty";
								
								
								
								?>
								
								
								
								
								
								
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Całość <span><?php if(isset($koszt)) { echo $koszt; $_SESSION['koszt']=$koszt;   } ?> zł</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
				
					<a href="Zakup.php" class="site-btn" >Zakup</a>
					<a href="Procesory.php" class="site-btn sb-dark">Kontynuuj zakupy</a>
						<a href="Koszyk.php?usun=tak" class="site-btn sb">Wyczyść koszyk</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	



	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html">Sklep komputerowy x86</a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>O nas</h2>
						<p>Jesteśmy sklepem internetowym zajmującym się sprzedażą sprzętu komputerowego</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Stronki tematyczne</h2>
						<ul>
							<li><a href="">PurePc</a></li>
							<li><a href="">Gamezila</a></li>
							<li><a href="">Gamedot</a></li>
						
						</ul>
						
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Ciekawostki</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/pclab.png"></div>
								<div class="lp-content">
									<h6>Nowinki sprzętowe</h6>
									<span>Kwiecień 26, 2020</span>
									<a href="https://pclab.pl/" class="readmore">Zobacz</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/nvidia.png"></div>
								<div class="lp-content">
									<h6>Nowości od Nvidi</h6>
									<span>Kwiecień 26, 2020</span>
									<a href="https://www.nvidia.com/pl-pl/" class="readmore">Zobacz</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Dane firmy</h2>
						<div class="con-info">
							<span>C.</span>
							<p>x86 Company </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>Opole prószkowska </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+734 867 934</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>sklepkomputerowyx86@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
				
					<a href="" class="https://pl.pinterest.com/"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="https://pl-pl.facebook.com/" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="https://twitter.com/explore" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="https://www.youtube.com/" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
				
				</div>


<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Wszelkie prawa zastrzezone | Własność  by Damian Wasiak</p>


			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
