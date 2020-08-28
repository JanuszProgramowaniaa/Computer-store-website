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
									
									echo 'Zalogowany <span style="color:red;"> '.$_SESSION['login']."</span> ";
								}
								?>
								
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
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
				
					
					<li><a href="Promocje.php">Promocje</a></li>
					<li><a href="Onas.php">O nas</a></li>
					<li><a href="Contact.php">Kontakt</a></li>
			
				</ul>
			</div>
		</nav>
	</header>


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Kategoria</h4>
			<div class="site-pagination">
				<a href="index.php">Głowna</a> /
				<a href="">Produkty</a> /
			</div>
		</div>
	</div>
	
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Dostosuj</h2>
						<div class="price-range-wrap">
							<h4>Cena</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="5000">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
					
					
					
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
					
					<?php
					require_once("connect.php");
					$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
					
					$dane=$_POST['dane'];
					
				   if(strlen($dane)>=2)
				   {
					$result = mysqli_query($polaczenie,"select * from towary where nazwa like'%$dane%' ");
					
					$data= array();
					$ile=$result->num_rows;
	                
					 
						  if($ile==0 )
	                         echo 'brak wyników wyszukiwania'    ;
					
					else
					{
					while($row = mysqli_fetch_assoc($result))
					{
						
							
								echo '
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									
									<img src="./'.$row["Zdjecie"].'" alt="">
									<div class="pi-links">
										<a  href="product.php" class="add-card"><i class="flaticon-bag"></i><span>Szczegóły</span></a>
										
									</div>
								</div>
								<div class="pi-text">
									<h6>$'.$row["Cena"].'</h6>
									<p>'.$row["Nazwa"].'</p>
								</div>
							</div>
						</div>
						'; 
					}
					
					}
				   }
					else
						 echo 'brak wyników wyszukiwania'    ;

	
	                
	
					
					
					
					
					?>
						
						
						
						
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->


	<!-- Footer section -->
	
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.php">Sklep komputerowy x86</a>
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
