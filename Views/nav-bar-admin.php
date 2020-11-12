<!-- Header section -->
<header class="header-section">
		<div class="header-warp">
			<div class="header-social d-flex justify-content-end" href="">
				<p>Follow us:</p>
				<a href="https://www.facebook.com/MoviePass/"><i class="fa fa-facebook"></i></a>
			</div>
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="home.html" class="site-logo">
					<img src="<?php echo IMG_PATH . "logo2.png"?>" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="<?php echo FRONT_ROOT."View/infoUser"?>">Cuenta</a> / <a href="<?php echo FRONT_ROOT."User/logout"?>">Cerrar Sesion</a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="<?php echo FRONT_ROOT ."View/home"?>">Inicio</a></li>
						<li><a href="<?php echo FRONT_ROOT ."View/adminCartelera"?>">Cartelera</a>

						</li>
						<li><a href="#">Pelicula</a>
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddMovie"?>">Añadir pelicula</a></li>
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddGenre"?>">Añadir genero</a></li>
							</ul>
						</li>
						<li><a href="#">Usuarios</a>
							<ul class="sub-menu">
							<li><a href="<?php echo FRONT_ROOT ."View/listUsers"?>">Lista de usuarios</a>
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddUser"?>">Añadir usuario</a>
							</ul>
						</li>
						<li><a href="#">Cine</a>
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddTheather"?>">Añadir cine</a>
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddRoom"?>">Añadir sala</a>
								<li><a href="<?php echo FRONT_ROOT ."View/viewListTheather"?>">Lista de cines</a>
								<li><a href="<?php echo FRONT_ROOT ."View/viewListRoom"?>">Lista de salas</a>
							</ul>
						</li>
						<li><a href="#">Funciones</a>
							<ul class="sub-menu">
							<li><a href="<?php echo FRONT_ROOT ."View/viewList_sessions"?>">Lista de funciones</a></li>
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddSession"?>">Añadir funcion</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>

				<script
					src="https://code.jquery.com/jquery-3.5.1.js"
					integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
					crossorigin="anonymous"></script>
	</header>
	<!-- Header section end -->