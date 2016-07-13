<!--Vista Resueltos/asignados-->
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
          
      <div class="panel-group">
               <div class="row">
        <div class="col-md-10 col-md-offset-1 well"> 
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        Cuestionarios resueltos o presentados por el paciente</a>
      </h4>
    </div>
      <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1 well">
            <div class="form-group">
                <div class="col-md-6">
                  <input class="form-control" id="nombre" name="nombre" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                </div>
                <div class="col-md-6">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                  <a href="#" class="btn btn-primary">Mostrar todos</a>
                </div>
              </div>
        </div>
                  <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
          <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre cuestionario</th>
              <th>Nombre paciente</th>
              <th>Puntuación</th>
              <th>Intentos</th>
              <th>Estatus</th> 
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
              <td>...</td>
              <td><a class="btn btn-info"  href="detalle_R-P.php">Detalle</a></td>
              <td><a class="btn btn-danger"  href="#" onclick="#">Eliminar</a></td>
            </tr>
          </tbody>
          </table>
        </div>
      </div>
  </div>
 </div>
</div>
          
         <div class="row">
        <div class="col-md-10 col-md-offset-1 well">   
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        Cuestionarios asignados y no presentados aún por el paciente</a>
      </h4>
    </div>
      <div class="panel-body">
                  <div class="col-md-10 col-md-offset-1 well">
            <div class="form-group">
                <div class="col-md-6">
                  <input class="form-control" id="nombre" name="nombre" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                </div>
                <div class="col-md-6">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                  <a href="#" class="btn btn-primary">Mostrar todos</a>
                </div>
              </div>
        </div>
                  <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
          <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre cuestionario</th>
              <th>Nombre paciente</th>
              <th>Intentos</th>
              <th>Estatus</th> 
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
              <td><a class="btn btn-info"  href="detalle_A-NP.php">Detalle</a></td>
              <td><a class="btn btn-primary"  href="#">Reasignar</a></td>
              <td><a class="btn btn-danger"  href="#" onclick="#">Eliminar</a></td>
            </tr>
          </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
</div>                
</div>                                  
    </div>
  </div>         
</div>
        </div>
<!-- end: content -->
    <?php //include("design/footer.php");?>
    </body>
</html>