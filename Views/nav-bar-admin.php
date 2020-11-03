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
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddMovie"?>">Añadir pelicula</a></li>
							</ul>
						</li>
						<li><a href="<?php echo FRONT_ROOT ."View/listUsers"?>">Usuarios</a>
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddUser"?>">Añadir usuario</a>
							</ul>
						</li>
						<li><a href="<?php echo FRONT_ROOT ."View/listUsers"?>">Cine</a>
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddTheather"?>">Añadir cine</a>
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddRoom"?>">Añadir sala</a>
							</ul>
						</li>
						<li><a href="<?php echo FRONT_ROOT ."View/viewList_sessions"?>">Funciones</a>
							<ul class="sub-menu">
								<li><a href="<?php echo FRONT_ROOT ."View/viewAddSession"?>">Agregar funcion</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->