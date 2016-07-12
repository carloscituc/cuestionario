<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php include("design/header.php"); ?>
<!-- start: Content -->
<div id="content" class="article-v1">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
        
      <div class="row">
        <div class="col-md-10 col-md-offset-1 well">
            <div class="form-group">
                <div class="col-md-6">
                  <input class="form-control" id="nombre" name="nombre" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                </div>
                <div class="col-md-6">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                  <a href="" class="btn btn-primary">Mostrar todos</a>
                </div>
              </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
          <a class="btn btn-success"  href="#">Agregar</a>
          <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Paciente</th>
              <th>Apellido Paterno</th>
              <th>Fecha presentada</th>
              <th>Tiempo terminado</th>
              <th>Acciones</th>    
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td><a class="btn btn-info"  href="#">Detalle</a></td>
              <td><a class="btn btn-primary"  href="#">Modificar</a></td>
              <td><a class="btn btn-danger"  href="#" onclick="#">Eliminar</a></td>
            </tr>
          </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>         
</div>
<!-- end: content -->
    <?php include("design/footer.php");?>
    </body>
</html>