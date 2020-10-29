<?php
include_once("header.php");
if ($user) {

	if ($user->getLevel() == 0) {
		include("nav-bar-admin.php");
	} else include("nav-bar-user.php");
} else
	include('nav-bar.php');
?>
<!-- Hero section -->
<section class="hero-section overflow-hidden">
	<div class="hero-slider owl-carousel">
		<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="<?php echo IMG_PATH . "bg.jpg" ?>">
			<!--	<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="<?php echo IMG_PATH . "slider-bg-1.jpg" ?>"> imagenes de fondo-->
			<div class="container">
				<h2>MoviePass</h2>
				<p>Tu sitio preferido de peliculas<br></p>
			</div>
		</div>
		<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="<?php echo IMG_PATH . "slider-bg-2.jpg" ?>">
			<div class="container">
				<h2>Adqueri tus entradas</h2>
				<p>Logueate para poder empezar!<br></p>
				<a href="<?php echo FRONT_ROOT ."View/viewCartelera"?>" class="site-btn"> Ver cartelera <img src="<?php echo IMG_PATH . "icons/double-arrow.png" ?>" alt="#" /></a>
			</div>
		</div>
	</div>
</section>
<!-- Hero section end-->


<!-- Intro section -->
<section class="intro-video-section set-bg d-flex align-items-end " data-setbg="<?php echo IMG_PATH . "bg2.jpg" ?>">
	<a href="https://www.youtube.com/watch?v=IfB65qjLbwc" class="video-play-btn video-popup"><img src="<?php echo IMG_PATH . "icons/solid-right-arrow.png" ?>" alt="#"></a>
	<div class="container">
		<div class="video-text">
			<h2>GUASON TRAILER</h2>
			<p>Joker (conocida como Guasón en Hispanoamérica) es una película de suspenso y drama psicológico estadounidense de 2019 distribuida por Warner Bros. Pictures y basada en el Joker, personaje de DC Comics. Es la primera de una serie de películas basadas en DC separadas del universo extendido de DC (DCEU) compartido</p>
		</div>
	</div>
</section>
<!-- Intro section end -->