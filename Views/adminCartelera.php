<?php
include("nav-bar-admin.php");
?>

<!-- Page top section -->


<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg" style="background: #330d38;">
  <div class="page-info">
    <h2>Lista de Peliculas</h2>
    <div class="site-breadcrumb">
      <a href="">Administrar</a> /
      <span>Peliculas</span>
    </div>
  </div>
</section>
<!-- Page top end-->


<div class="wrapper row4" style="background: #330d38;">
  <!-- main body -->
  <main class="hoc container clear">
    <div class="content" style="background: #ffffff;">

      <!-- Filtro por categoria -->

      <div style="background: #ffffff;">

        <form action="<?php echo FRONT_ROOT . "view/adminCartelera" ?>" method="GET">
          <div class="form-group">
            <select style="width:350px" name="category" class="custom-select" required>
              <option value=''>Seleccione una categoria</option>
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
      
        <div class="scrollable">
          <table style="text-align:center;" class="table table-responsive table-bordered">
            <thead class="table-active">
              <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 25%;">Titulo</th>
                <th style="width: 20%;">Categoria</th>
                <th style="width: 5%;">Edad</th>
                <th style="width: 35%;">Cartelera</th>
                <th style="width: 10%;">Eliminar</th>
                <th style="width: 10%;">Editar</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($M_list)) {
                foreach ($M_list as $list) {
                  ?>
                  <tr>
                  <form action="<?php echo FRONT_ROOT . "Movie/delete" ?>" method="POST">
                    <td><?php echo $list->getId() ?></td>
                    <td><?php echo $list->getTitle() ?></td>
                    <td><?php echo $list->getCategory() ?></td>
                    <td><?php echo $list->getAge() ?></td>
                    <td><img src="<?php echo FRONT_ROOT . $list->getImg()?>" width="100" height="100"></td>
                    <td>
                      <button type="submit" name="id" class="btn btn-danger" value="<?php echo $list->getId() ?>"> Elminar </button>
                    </td>
                  </form>
                  <form action="<?php echo FRONT_ROOT . "Movie/edit" ?>" method="POST">
                    <td>
                      <button type="submit" name="id" class="btn btn-warning" value="<?php echo $list->getId() ?>"> Editar </button>
                    </td>
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
