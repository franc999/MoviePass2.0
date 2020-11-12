<?php include("nav-bar-admin.php");?>

<!-- Page top section -->

<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Lista de Salas</h2>
			<div class="site-breadcrumb">
				<a href="">Administrar</a>  /
				<span>Salas</span>
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
                <th style="width: 25%;">Nombre</th>
                <th style="width: 25%;">Cine</th>
                <th style="width: 10%;">Numero de asientos</th>
                <th style="width: 10%;"> Precio</th>
                <th style="width: 10%;"></th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($R_list as $room){
                  ?>
                    <tr>

                      <td>
                        <?php echo $room->getName(); ?>
                      </td>

                      <td><?php 
                              $name=null;
                                foreach($T_list as $theather){
                                  if($room->getId_theather() == $theather->getId())
                                      $name = $theather->getName(); }
                          echo "$name"; ?>
                      </td>

                      <td>
                        <?php echo $room->getTotalSeats(); ?>
                      </td>

                      <td>
                        <?php echo $room->getTicketPrice(); ?>
                      </td>

                      <form action ="" method="POST">
                      <td>
                        <button type="submit" name="id" class="btn btn-warning" value="<?php echo $room->getId_room(); ?>"> Editar </button>
                      </td>
                      </form>
                      
                      <form action ="<?php FRONT_ROOT."Room/deleteRoom" ?>" method="POST">
                      
                        <td>
                          <button type="submit" name="id" class="btn btn-danger" onclick = "return confirmDelete()" value="<?php echo $room->getId_room(); ?>"> Eliminar </button>
                        </td>
                      </form>
                    </tr>
                  <?php
                  }  
              ?> 
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>