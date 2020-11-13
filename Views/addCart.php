<?php 
include("nav-bar-user.php");?>

<!-- Page top section -->


<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Carrito</h2>
			<div class="site-breadcrumb">
				<a href="">Administrar</a>  /
				<span>Entradas</span>
			</div>
		</div>
	</section>
    <!-- Page top end-->

<form action ="<?php echo FRONT_ROOT."View/checkAddMovieToSession"?>" method="POST">
  <div class="wrapper row4" style="background: #330d38;" >
    <!-- main body -->
    <main class="hoc container clear" > 
      <div class="content" style="background: #ffffff;"> 
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 10%;">Titulo Pelicula</th>
                <th style="width: 10%;">Cine</th>
                <th style="width: 10%;">Fecha</th>
                <th style="width: 15%;">Horario ingreso</th>
                <th style="width: 15%;">Horario salida</th>
                <th style="width: 15%;">Sala</th>
                <th style="width: 15%;">Sala</th>
                <th style="width: 5%;"></th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <select name='id_movie' id='id_movie' required>
                        <option>Selecciona la pelicula</option>

                         <?php foreach ($M_list as $key => $movie) { ?>
                        <option value="<?php echo $movie->getId();  ?>"><?php echo $movie->getTitle(); ?></option>
                        <?php } ?>
                         
                    </select> 
                    
                </td>
                
                <td>
                  <select name='id_theather' id='id_theather' required>
                    <option>Selecciona el cine</option>

                    <?php foreach ($T_list as $key => $theater) { ?>
                      <option value="<?php echo $theater->getId();   ?>"><?php echo $theater->getName(); ?> </option>
                  <?php } ?>


                  </select> 
                </td>

                <td>Fecha ingreso              
                  <input type="date" name ='date' id='date' required></input>
                </td>

                <td>Hora ingreso                  
                  <input type="time" name="time"  id='time' required>
                </td>

                <td>Hora salida                 
                 <input type="time" name="timeEnd" id='timeEnd' required>
                </td>

                <td>Salas disponibles                 
                  <select name='id_room' id='id_room'required onclick="">
                      <option>Selecciona la sala</option>
                      
                </td>

                <td>
                <button type="submit" class="btn btn-success" > Ver salas disponibles </button>
                </td>

            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</form>
