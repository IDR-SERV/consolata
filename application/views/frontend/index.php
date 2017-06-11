<?php

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Consolata</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
	
	<!-- Animate.css -->
        <link rel="stylesheet" href="<?=$css?>animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?=$css?>icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="<?=$css?>themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?=$css?>bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?=$css?>magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?=$css?>owl.carousel.min.css">
	<link rel="stylesheet" href="<?=$css?>owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?=$css?>style.css">

	<!-- Modernizr JS -->
	<script src="<?=$js?>modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 text-right gtco-contact">
					<ul class="">
						<li><a href="#"><i class="ti-mobile"></i> +58 251 456 7890 </a></li>
						<li><a href="http://twitter.com/gettemplatesco"><i class="ti-twitter-alt"></i> </a></li>
						<li><a href="#"><i class="icon-mail2"></i></a></li>
						<li><a href="#"><i class="ti-facebook"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="<?=base_url()?>">Te damos la bienvenida <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="active"><a href="<?=base_url()?>">Inicio</a></li>
						<li><a href="about.html">Nosotros</a></li>
						<li class="has-dropdown">
							<a href="services.html">Servicios</a>
							<ul class="dropdown">
								<li><a href="#">Espacios</a></li>
								<li><a href="#">Charlas</a></li>
								<li><a href="#">Comedor</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="#">Misi&oacute;n</a>
							<ul class="dropdown">
								<li><a href="#gtco-features">Catequesis</a></li>
								<li><a href="#">Homil&iacute;as</a></li>
								<li><a href="#">Eucarist&iacute;a</a></li>
								<li><a href="#">Confesiones</a></li>
							</ul>
						</li>
						<li><a href="portfolio.html">Galer&iacute;a</a></li>
						<li><a href="contact.html">Contactos</a></li>
                        <li><a href="<?= base_url().'login' ?>">Login</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

            <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(<?=$img?>img_bg_1.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeInUp">Nuestra Se&ntilde;ora de la Consolata</h1>
							<h2 class="animate-box" data-animate-effect="fadeInUp">Comprometidos con nuestra misi&oacute;n <em>en</em> <a href="#" target="_blank">Barquisimeto</a></h2>
							<p class="animate-box" data-animate-effect="fadeInUp"><a href="#gtco-portfolio" class="btn btn-white btn-lg btn-outline roll">Vis&iacute;tanos</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="gtco-features-3">
		<div class="gtco-container">
			<div class="gtco-flex">
				<div class="feature feature-1 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-inner">
						<span class="icon">
							<i class="ti-target"></i>
						</span>
						<h3>Colaboradores</h3>
						<p>Puedes filtrar las publicaciones según el redactor de cada una de ellas. </p>
						<p><a href="#" class="btn btn-white btn-outline">Leer Más</a></p>
					</div>
				</div>
				<div class="feature feature-2 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-inner">
						<span class="icon">
							<i class="ti-cloud"></i>
						</span>
						<h3>Publicaciones</h3>
						<p>Estan a tu disposición las publicaciones de los misioneros con un mensaje que busca acercarte a Dios. </p>
						<p><a href="#" class="btn btn-white btn-outline">Leer Más</a></p>
					</div>
				</div>
				<div class="feature feature-3 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-inner">
						<span class="icon">
							<i class="ti-timer"></i>
						</span>
						<h3>Calendario</h3>
						<p>Entérate y participa de las actividades, eucaristías y retiros de nuestra casa. </p>
						<p><a href="#" class="btn btn-white btn-outline">Leer Más</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Art&iacute;culos de inter&eacute;s</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-map"></i>
						</span>
						<h3>¿Dónde Estamos?</h3>
						<p>Carrera 17 entre calles 48 y 49, Barquisimeto - Lara - Venezuela. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
						<h3>¿Quiénes somos?</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<h3>¿Qué hacemos?</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-ruler-pencil"></i>
						</span>
						<h3>Contáctanos</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-portfolio" class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our Latest Works</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row row-pb-md">
				<div class="col-md-12">
					<ul id="gtco-portfolio-list">
                        <?php for($i=0; $i<count($noticias); $i++){?>
						<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?= $images . $noticias[$i]->imagen ?>); ">
							<a href="#" class="color-1">
								<div class="case-studies-summary">
									<span><?= $noticias[$i]->contenido ?></span>
									<h2><?= $noticias[$i]->titulo ?></h2>
								</div>
							</a>
						</li>
                        <?php }?>
					</ul>		
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-md-offset-4 text-center animate-box">
					<a href="#" class="btn btn-white btn-outline btn-lg btn-block">See All Our Works</a>
				</div>
			</div>

			
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Fun Facts</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Visitas</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Usuarios</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-briefcase"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Colaboradores</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Retiros</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	<div id="gtco-products">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Galer&iacute;a</h2>
					<p>Contamos con excelentes espacios para el encuentro con Nuestro Se&ntilde;or Jesucristo.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="owl-carousel owl-carousel-carousel">
					<div class="item">
						<img src="<?=$img?>img_1.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
					</div>
					<div class="item">
						<img src="<?=$img?>img_2.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
					</div>
					<div class="item">
						<img src="<?=$img?>img_3.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
					</div>
					<div class="item">
						<img src="<?=$img?>img_4.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Suscr&iacute;bete</h2>
					<p>Recibe informaci&oacute;n sobre nosotros en tu correo.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-12">
					<form class="form-inline">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Tu Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="name" class="sr-only">Nombre</label>
								<input type="text" class="form-control" id="name" placeholder="Tu Nombre">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<button type="submit" class="btn btn-default btn-block">Subscr&iacute;bete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Acerca de Nosotros</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>P&aacute;ginas de inter&eacute;s</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">ACI Prensa</a></li>
							<li><a href="#">Arquidi&oacute;cesis de Barquisimeto</a></li>
							<li><a href="#">Con + Gracia</a></li>
							<li><a href="#">Youtube</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Cont&aacute;ctanos</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +58 251 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@gettemplates.co</a></li>
							<li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
                                                        <li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
                                                        <li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
                                        <!--
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
                                        -->
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?=$js?>jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?=$js?>jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?=$js?>bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?=$js?>jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="<?=$js?>owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="<?=$js?>jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="<?=$js?>jquery.magnific-popup.min.js"></script>
	<script src="<?=$js?>magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="<?=$js?>main.js"></script>

	</body>
</html>

