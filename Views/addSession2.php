<?php 
include("nav-bar-admin.php");
?>

<!-- Page top section -->



<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Salas disponibles</h2>
			<div class="site-breadcrumb">
				<a href="">Administrar</a>  /
				<span>Salas</span>
			</div>
		</div>
	</section>
    <!-- Page top end-->

<form action ="<?php echo FRONT_ROOT."View/viewCheckedSession"?>" method="POST">
  <div class="wrapper row4" style="background: #330d38;" >
    <!-- main body -->
    <main class="hoc container clear" > 
      <div class="content" style="background: #ffffff;"> 
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 25%;">Nombre</th>
                <th style="width: 25%;">Numero de asientos</th>
                <th style="width: 25%;"> Precio</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
            <tr><?php
            if($R_list !=null){
                foreach ($R_list as $key => $room) { ?>
                    
                    <td>
                        <?php echo $room->getName(); ?>
                    </td>

                    <td>
                        <?php echo $room->getTotalSeats(); ?>
                    </td>

                    <td>
                        <?php echo $room->getTicketPrice(); ?>
                    </td>

                    <td>
                    <button type="submit" name="id_room" class="btn btn-success" value=" <?php echo $room->getId_room(); ?> " > Elegir </button>
                    </td>

                <?php }}?>    

            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</form>
