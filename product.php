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
								</div>
								<a href="#" onclick="alert('Prace trwają :)')">Koszyk zakupowy</a>
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
				
					<li><a href="#">Nowosci</a></li>
					<li><a href="Promocje.html">Promocje</a></li>
					<li><a href="Onas.html">O nas</a></li>
					<li><a href="Contact.html">Kontakt</a></li>
			
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
				<a href="">Produkt</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<?php
require_once("connect.php");
					$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
					$id=$_GET['id'];
					
					$result = mysqli_query($polaczenie,"select * from towary where id=$id ");
					$row = mysqli_fetch_assoc($result);
					
					

 ?>
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="img/single-product/1.jpg" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							
							
							<div class="pt" ><img src="<?php echo $row['Zdjecie'] ?>" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $row['Nazwa'] ?> </h2>
					<h3 class="p-price"><?php echo $row['Cena'] ?> zł</h3>
					<h4 class="p-stock">Dostępność: <span>Stan pobrany z bazy danych</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href=""  onclick="alert('To w 2 części z użyciem php :)')">0 Recenzje</a>|<a href=""  onclick="alert('To w 2 części z użyciem php :)')">Dodaj swoją recenzje</a>
					</div>
					
					<a href="Koszyk.php?id=<?php echo $id ?>" class="site-btn" >Dodaj do koszyka</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Informacje o produkcie</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<?php echo $row['Opis'] ?>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Szczegóły płatności </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Sprzedaż i zwroty</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 dni na zwrót</h4>
									
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href="https://www.google.pl/"><i class="fa fa-google-plus"></i></a>
						<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/explore"><i class="fa fa-twitter"></i></a>
						<a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>



	

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
