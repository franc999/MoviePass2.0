<?php
if ($user) {
  if ($user->getLevel() == 0) {
    include("nav-bar-admin.php");
  } else include("nav-bar-user.php");
} else
  include('nav-bar.php');
?>

<!-- Page top section -->

    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
      <div class="page-info">
        <h2>Cartelera</h2>
        <div class="site-breadcrumb">
          <a href="<?php echo FRONT_ROOT ."View/viewCartelera"?>">Cartelera</a> /
          <span>Compra</span>
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
                <th style="width: 15%;">Hora</th>
                <th style="width: 10%;">Cantidad tickets</th>
                <th style="width: 10%;">Precio</th>

                <th></th>

              </tr>
            </thead>
            <tbody>
              <?php 
              if (!empty($M_list)) {
                foreach ($M_list as $list) {
                  ?>
                  <tr>
                    <form action="<?php echo FRONT_ROOT . "view/viewShoppingCart" ?>" method="POST" enctype="multipart/form-data">

                      <?php $resultado = $tickets * (int)$precioTicket ?> 

                      <td><?php echo $list->getTheather() ?></td>
                      <td><?php echo $list->getMovie()?></td>
                      <td><?php echo $list->getDate()?></td>
                      <td><?php echo $list->getTime()?></td>
                      <td><?php echo "$tickets"?></td>
                      <td><?php echo "$resultado"?></td>
                      
                      <td><button type="submit" class="btn btn-outline-info"> Pagar </button></td>
                      
                    </form> 
                  </tr>
                <?php
                }
              } elseif (!empty($S_list)) {
                  
                  foreach ($S_list as $list) {
                    ?>
                  <tr>
                    <form action="<?php echo FRONT_ROOT . "View/viewShoppingCart" ?>" method="POST" enctype="multipart/form-data">

                     <?php $resultado = $tickets * (int)$precioTicket ?> 

                      <td><?php echo $list->getTheather() ?></td>
                      <td><?php echo $list->getMovie()?></td>
                      <td><?php echo $list->getDate()?></td>
                      <td><?php echo $list->getTime()?></td>
                      <td><?php echo "$tickets"?></td>
                      <td><?php echo "$resultado"?></td>
                      
                      <td><button type="submit" class="btn btn-outline-info"> Pagar </button></td>

                    </form>
                  </tr>
                <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

