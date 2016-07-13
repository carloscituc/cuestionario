<!--Vista Resueltos/asignados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("includes/design/head.php"); ?>
    <body>
        <?php include("includes/design/header.php"); ?>
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
              <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Reasignar</button>
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reasignar cuestionario</h4>
        </div>
        <div class="modal-body">
             <div class="row">
            <div class="col-md-12 padding-1">
                <label for="id_cuestionario">Selecciona el paciente</label>
                   <select class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                   </select>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <?php include("includes/design/footer.php");?>
    </body>
</html>