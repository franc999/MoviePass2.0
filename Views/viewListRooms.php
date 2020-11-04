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
                <th style="width: 35%;">Nombre</th>
                <th style="width: 35;">Direccion</th>
                <th style="width: 10%;"></th>
                <th style="width: 10%;"></th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($T_list as $theather)
                {
                  ?>
                    <tr>

                      <td><?php echo $theather->getName(); ?></td>
                      <td><?php echo $theather->getAdress(); ?></td>
                      <form action ="<?php echo FRONT_ROOT."Theather/readRooms"?>" method="POST">
                      <td>
                        <button type="submit" name="id" class="btn btn-sucess" value="<?php echo $theather->getId(); ?>"> Ver salas </button>
                      </td>
                      </form>
                      <form action ="<?php echo FRONT_ROOT."Theather/edit"?>" method="POST">
                      <td>
                        <button type="submit" name="id" class="btn btn-warning" value="<?php echo $theather->getId(); ?>"> Editar </button>
                      </td>
                      </form>
                      <form action ="<?php echo FRONT_ROOT."Theather/delete"?>" method="POST">
                      
                        <td>
                          <button type="submit" name="id" class="btn btn-danger" onclick = "return confirmDelete()" value="<?php echo $theather->getId(); ?>"> Eliminar </button>
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