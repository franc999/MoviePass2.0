
<!-- Footer section -->
<footer class="footer-section">
		<div class="container">
			<div class="footer-left-pic">
			</div>
			<div class="footer-right-pic">
				<img src="" alt="">
			</div>
			<a href="#" class="footer-logo">
				<img src="<?php echo IMG_PATH ."logo2.png"?>" alt=""> <!-- cambiar logo-->
			</a>
			<ul class="main-menu footer-menu">
				<li><a href="<?php echo FRONT_ROOT ."View/home"?>">Inicio</a></li>
				<li><a href="">Cartelera</a></li>
				<li><a href="">Proximos Estrenos</a></li>
				<li><a href="">Horarios</a></li>
				<li><a href="">Compras</a></li>
				<li><a href="">Contact</a></li>
			</ul>
			<div class="footer-social d-flex justify-content-center">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
			<div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="<?php echo SCRIPT_PATH . "jquery-3.2.1.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "bootstrap.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "jquery.slicknav.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "owl.carousel.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "jquery.sticky-sidebar.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "jquery.magnific-popup.min.js"?>"></script>
	<script src="<?php echo SCRIPT_PATH . "main.js"?>"></script>

	<script type="text/javascript" src="<?php echo SCRIPT_PATH . "ajaxRoom.js"?>"></script>
	
	<script type="text/javascript">
		function confirmDelete(){
			var respuesta = confirm ("Estas seguro que deseas eliminar, esto puede borrar otras tablas relacionadas con esta");
			if(respuesta == true)
				return true
			else
				return false;
			}
	</script>

	</body>
</html>