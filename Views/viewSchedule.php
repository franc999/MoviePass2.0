<?php 
include("nav-bar-user.php");?>

<!-- Page top section -->


<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Lista de tickets</h2>
			<div class="site-breadcrumb">
				<a href= "<?php echo FRONT_ROOT . "view/viewCartelera" ?>" >Cartelera</a>  /
				<span>Opciones de compra</span>
			</div>
		</div>
	</section>
    <!-- Page top end-->


  <div class="wrapper row4" style="background: #330d38;" >
    <!-- main body -->
    <main class="hoc container clear" > 
      <div class="content" style="background: #ffffff;"> 
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 15%;">Cine</th>
                <th style="width: 15%;">Sala</th>
                <th style="width: 15%;">Pelicula</th>
                <th style="width: 10%;">Fecha</th>
                <th style="width: 10%;">Comienzo</th>
                <th style="width: 10%;">Finalizacion</th>
                <th style="width: 10%;">Asientos Disponibles</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;"></th>

              </tr>
            </thead>
            <tbody>
              <?php
                  if($S_list != false){

                      foreach($S_list as $list){

                            //foreach($R_list as $R_list){echo 'room';

                      ?>
                        <tr>
                          <form action ="<?php echo FRONT_ROOT. "View/viewShoppingCart"?>" method="POST" enctype="multipart/form-data"> <!--Envia cantidad de tickets a comprar-->
                            <td><?php echo $list->getTheatherName(); ?></td>

                            <td><?php echo $list->getRoomName(); ?></td>

                            <td><?php echo $list->getMovieName();?></td>

                            <td><?php echo $list->getDate();?></td>

                            <td><?php echo $list->getTime();?></td>

                            <td><?php echo $list->getTimeEnd();?></td>

                            <td><?php echo $list->getAvailableSeats();?></td>

                            <td><input type='number' name='tickets' id="tickets" required min="1" max="<?php 50//echo $list->getAvailableSeats();?>"></input></td>

                            <td>
                              <button type="submit" name="id" class="btn btn-success" value=" <?php echo $list->getId_session(); ?>"> Agregar al carrito </button>
                              <input type="hidden" value=" <?php echo $list->getRoom(); ?>" name='id_room' id='id_room'>
                              <input type="hidden" value=" <?php echo $list->getTheatherName() ?>" name='theather_name' id='theather_name'>    
                              <input type="hidden" value=" <?php echo $list->getRoomName(); ?>" name='room_name' id='room_name'>    
                              <input type="hidden" value=" <?php echo $list->getMovieName(); ?>" name='movie_name' id='movie_name'>                                      
                            </td>
                          </form>  
                        </tr>
                      <?php
                      }

                  }else{

                    echo 'Ha ocurrido un error, intente nuevamente\n';

                  }
              ?>
                
                                     
            </tbody>
          </table>
        </div>
      </div>
    </main>
</div>
