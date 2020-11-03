<?php 
include("nav-bar-admin.php");?>

<!-- Page top section -->


<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
		<div class="page-info">
			<h2>Agregar Sala</h2>
			<div class="site-breadcrumb">
				<a href="">Administrar</a>  /
				<span>Agregar Sala</span>
			</div>
		</div>
	</section>
    <!-- Page top end-->

<form action ="<?php echo FRONT_ROOT."Room/create"?>" method="POST" enctype="multipart/form-data">
  <div class="wrapper row4" style="background: #330d38;" >
    <!-- main body -->
    <main class="hoc container clear"  > 
      <div class="content" style="background: #ffffff;"> 
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 15%;">Nombre de sala</th>
                <th style="width: 15%;">Precio de ticket</th>
                <th style="width: 15%;">Cantidad de asientos</th>
                <th style="width: 15%;">Cine</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
            <tr>

                <td><input type='text' name='name' required></td>

                <td>
                    <input id="price" type="numer" name='price' min="1" required>
                </td>

                <td>                   
                    <input type="numer" name='seats' id='seats' min="1" max="350" required>>
            
                </td>
                
                <td>
                  <select name='id_theather' required>
                    <option>Selecciona el cine</option>

                    <?php foreach ($T_list as $key => $theater) { ?>
                      <option value="<?php echo $theater->getId();  ?>"><?php echo $theater->getName(); ?></option>
                    <?php } ?>


                  </select> 
                </td>

                <td><button type="submit" class="btn btn-success" > Aceptar </button></td>

            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</form>
