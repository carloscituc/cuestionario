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
                                                Cuestionarios creados</a>
                                            </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1 well">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <input class="form-control" id="nombre" name="nombre" placeholder="Buscar por nombre de cuestionario..." type="text" value="" />
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
                                                        <th>Pacientes asignados</th> 
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>...</td>
                                                        <td>...</td>
                                                        <td>...</td>
                                                        <td><a class="btn btn-info"  href="detalle-editar-asignar.php">Detalle</a></td>
                                                        <td><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#asignar">Asignar</button></td>
                                                        <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#eliminar1">Editar</button></td>
                                                        <td><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#eliminar">Eliminar</button></td>
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

    <!-- Modal reasignar-->
    <div class="modal fade" id="asignar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Asignar cuestionario</h4>
                </div>
                <div class="modal-body">

                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">

                            <select class="form-control">
                                <option>-Seleccionar paciente-</option>
                                <option>Omar Hernandez</option>
                                <option>Carlos Cituc</option>
                                <option>Carlos Bolon</option>
                                <option>Angie Campos</option>
                                <option>Rodrigo Espadas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="paciente2">
                        <div class="col-md-12 padding-1">
                            <select class="form-control">
                                <option>-Seleccionar tiempo-</option>
                                <option>1-15 minutos</option>
                                <option>1-30 minutos</option>
                                <option>1-45 minutos</option>
                                <option>1-60 minutos</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal eliminar/Cuestionarios creados-->
    <div class="modal fade" id="eliminar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">¡Mensaje importante!</h4>
                </div>
                <div class="modal-body">

                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">
                            <div class="alert alert-warning">
                                <strong>¡Este registro se eliminará de forma permanente!</strong></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                </div>
            </div>

        </div>
    </div>


    <?php include("design/footer.php");?>
    </body>
</html>