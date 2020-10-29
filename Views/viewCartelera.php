<?php
if ($user) {
  if ($user->getLevel() == 0) {
    include("nav-bar-admin.php");
  } else include("nav-bar-user.php");
} else
  include('nav-bar.php');
?>

<!-- Page top section -->

<style>

#a12 {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

#a12:link {
  color: #265301;
}

#a12:visited {
  color: #437A16;
}

#a12:focus {
  border-bottom: 1px solid;
  background: #BAE498;
}

#a12:hover {
  border-bottom: 1px solid;     
  background: #CDFEAA;
}

#a12:active {
  background: #265301;
  color: #CDFEAA;
}

</style>


<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
  <div class="page-info">
    <h2>Cartelera</h2>
    <div class="site-breadcrumb">
      <a href="<?php echo FRONT_ROOT ."View/home"?>">Inicio</a> /
      <span>Peliculas</span>
    </div>
  </div>
</section>
<!-- Page top end-->

<div class="wrapper row4" style="background: #330d38;">
<br>
  <!-- main body -->
  <main class="hoc container clear">
    <div class="content" style="background: #ffffff;">

      <!-- Filtro por categoria -->

      <div style="background: #ffffff;">

        <form action="<?php echo FRONT_ROOT . "view/viewCartelera" ?>" method="GET">
          <div class="form-group">
            
              Buscar por categoria     <select style="width:350px" name="category" class="custom-select" required>
                <option value=''>Seleccione una categoria</option>
                <option value='all'>Todas</option>
                <option value='Accion'>Accion</option>
                <option value='Thriller'>Terror</option>
                <option value='Drama'>Drama</option>
                <option value='Comedy'>Comedia</option>
                <option value='Romance'>Romance</option>
                <option value='Musical'>Musical</option>
              </select>

              <button type="submit" class="btn btn-primary">Buscar</button>
            
          </div>
        </form>

      </div>

      <!-- Filtro end -->

      <!-- Filtro por fecha -->
      
      <div style="background: #ffffff;">
        <form action="<?php echo FRONT_ROOT . "view/viewCartelera" ?>" method="GET">
          <div class="form-group">
                 Buscar por fecha              <select style="width:350px" name="date" class="custom-select" required>
              <option value=""> Seleccione una fecha </option>
                <?php foreach ($SC_list as $key => $session) { ?>
                  
                  <option value="<?php echo $session->getDate();  ?>"><?php echo $session->getDate() ?></option>
                <?php } ?>
              </select>
              <button type="submit" class="btn btn-primary">Buscar</button>
            
          </div>
        </form>

      </div><br>

      <!-- Filtro end -->


      
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 20%;">Titulo</th>
                <th style="width: 20%;">Genero</th>
                <th style="width: 25%;">Portada</th>
                <th style="width: 10%;"></th>

              </tr>
            </thead>
            <tbody>
              <?php 
              if (!empty($M_list)) {
                foreach ($M_list as $list) {
                  ?>
                  <tr>
                    <form action="<?php echo FRONT_ROOT . "View/viewBuyTicket" ?>" method="POST" enctype="multipart/form-data">

                      
                      <td><?php echo $list->getTitle(); ?></td>
                      <td><?php echo $list->getCategory(); ?></td>
                      <td><img src="<?php echo FRONT_ROOT . $list->getImg()?>" width="100" height="100"></td>
                      
                      <td><button type="submit" class="btn btn-outline-info"> Ver fechas </button></td>
                      <input type="hidden" name="id" value=" <?php echo $list->getId() ?> ">
                    </form>
                  </tr>
                <?php
                }
              } elseif (!empty($S_list)) {
                  
                  foreach ($S_list as $list) {
                    ?>
                  <tr>
                    <form action="<?php echo FRONT_ROOT . "View/viewBuyTicket" ?>" method="POST" enctype="multipart/form-data">

                      
                      <td><?php echo $list->getTitle(); ?></td>
                      <td><?php echo $list->getCategory(); ?></td>
                      <td><img src="<?php echo FRONT_ROOT . $list->getImg()?>" width="100" height="100"></td>
                      
                      <td><button type="submit" class="btn btn-outline-info"> Ver fechas </button></td>
                      <input type="hidden" value=" <?php echo $list->getId_movie() ?> ">
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
