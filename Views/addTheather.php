<?php include("nav-bar-admin.php");?>

<!-- Page top section -->

<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Agregar cines</h2>
			<div class="site-breadcrumb">
				<a href="">Administrar</a>  /
				<span>Cines</span>
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
                <th style="width: 45%;">Nombre</th>
                <th style="width: 45%;">Direccion</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                        <form action ="<?php echo FRONT_ROOT."Theather/create"?>" method="POST">
                            <td><input type="text" name="name" id="name" required></td>
                            <td><input type="text" name="adress" id="adress" required></td>
                            
                            <td>
                                <button type="submit" name="id" class="btn btn-success" value=""> Aceptar </button>
                            </td>
                        </form>
                    </tr>
                  <?php
              ?> 
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>