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
                  if($S_list != null && $T_list != null && $M_list != null && $R_list != null){

                      foreach($S_list as $list){
                        foreach($T_list as $t_list){
                          foreach($M_list as $m_list){
                            foreach($R_list as $R_list){

                      ?>
                        <tr>
                          <form action ="<?php echo FRONT_ROOT. "View/viewPurchase"?>" method="POST" enctype="multipart/form-data"> <!--Envia cantidad de tickets a comprar-->
                            <td><?php echo $t_list->getName() ?></td>
                            <td><?php echo $m_list->getTitle()?></td>
                            <td><?php echo $list->getDate()?></td>
                            <td><?php echo $list->getTime()?></td>
                            <td><?php echo $list->getTimeEnd()?></td>
                            <td><?php echo $list->availableSeats();?></td>
                            <td><input type='number' name='tickets' ></input></td>

                            <td>
                              <button type="submit" name="id" class="btn btn-success" > Comprar </button>
                                                        <input type="hidden" name="id" value=" <?php echo $list->getId(); ?>" >
                                            CHECHEAR            <input type="hidden" name="name_room" value=" <?php echo $list->getRoom(); ?> ">
                                                          <input type="hidden" name="id_theather" value=" <?php echo $list->getTheather(); ?> ">
                            </td>
                          </form>  
                        </tr>
                      <?php
                          }
                        }
                      }
                    }
                  }else{

                    echo 'Ha ocurrido un error, intente nuevamente\n';
                    $this->viewController->home();

                  }
              ?>
                
                                     
            </tbody>
          </table>
        </div>
      </div>
    </main>
</div>
