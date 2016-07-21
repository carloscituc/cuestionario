<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosEditar.php");

            //Llamamos a la función cuestionarioEditarAsignarBuscar la cual carga todos los includes que necesitamos
            cuestionariosEditar::cuestionarioEditarAsignarBuscar();

            //Recuperamos el nombre del cuestionario enviado desde "cuestionarioEditarAsignar"
            //Verificamos si se envió algún dato y si no que no se haga nada
            if(isset($_POST['nombreCuestionario'])){
                $nombre = $_POST['nombreCuestionario'];
            }else{
                $nombre = "";
            }

            //Ejecutamos una busqueda en base al nombre del cuestionario y lo almacenamos en la variable resultado
            $resultado = cuestionariosEditar_models::buscarCuestionario($nombre);

            //Consultamos a todos los pacientes registrados en el sistema
            $pacientes = cuestionariosEditar_models::consultarPacientes();
        ?>
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
                                        <form action="cuestionarioEditarAsignarBuscar.php" method="post">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <input class="form-control" id="nombreCuestionario1" name="nombreCuestionario" placeholder="Buscar por nombre de cuestionario..." type="text" value="<?php echo $nombre; ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="btn_buscar" name="btn_buscar" type="submit" class="btn btn-danger" value="Buscar" />
                                                    <input id="btn_todos" name="btn_todos" type="submit" class="btn btn-primary" value="Mostrar todos" onclick="limpiar();"/>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre cuestionario</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        //Imprimimos todos los cuestionarios consultados
                                                        while($row = mysqli_fetch_assoc($resultado)){
                                                    ?>
                                                    <!--Form para pasar datos por POST que nos redireccionará a la misma página en donde nos encontramos "cuestionarioEditarAsignarBuscar"-->
                                                    <form name="form_editar<?php echo $row['idCuestionario']; ?>" action="detalle-E-A.php" method="POST">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionario']; ?>">
                                                    </form>
                                                    <tr>                  
                                                        <td><?php echo $row['idCuestionario']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo $row['idCuestionario']; ?>.submit()">Detalle</a></td>
                                                        <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalAsignar" onclick="recuperarId('<?php echo $row['idCuestionario'];?>'), asignarValor();">Asignar</button>
                                                        <td><button type="button" class="btn btn-success btn-md">Editar</button></td>                                                        
                                                        <td><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalEliminar" onclick="eliminarId('<?php echo $row['idCuestionario'];?>'), asignarValor();">Eliminar</button></td>
                                                    </tr>
                                                    <?php } ?>
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
<div class="modal fade" id="myModalAsignar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reasignar cuestionario</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">
                            <label for="select-paciente">Seleccionar paciente</label>
                            <select class="form-control" name="seleccionar-paciente">
                                <?php
                                    //Recuperamos la lista de pacientes registrados en el sistema                                    
                                    while($paciente = mysqli_fetch_assoc($pacientes)){ 
                                ?>      
                                <option value="<?php echo $paciente['idPaciente']; ?>"><?php echo $paciente['nombre'] . " " . $paciente['apellidoPaterno'] . " " . $paciente['apellidoMaterno']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="paciente2">
                        <div class="col-md-12 padding-1">
                            <label for="select-tiempo">Seleccionar límite de tiempo de evaluación</label>
                            <select class="form-control" name="seleccionar-tiempo">
                                <option value="00:00:15">15 minutos</option>
                                <option value="00:30:00">30 minutos</option>
                                <option value="00:45:00">45 minutos</option>
                                <option value="01:00:00">60 minutos</option>
                                <option value="01:15:00">1-15 minutos</option>
                                <option value="01:30:00">1-30 minutos</option>
                                <option value="01:45:00">1-45 minutos</option>
                                <option value="02:00:00">1-60 minutos</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="asignar_cuestionarioId" id="asignar_cuestionarioId">
                    <input type="hidden" name="nombreCuestionario" id="nombreCuestionario2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button name="asignar" id="asignar" type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <?php 
                //Si se presiona el botón submit(reasignar) del formulario asignamos a un nuevo paciente
                if(isset($_REQUEST['asignar'])){

                    //Recuperamos el id del paciente a quien se le asignará el cuestionario
                    $idPaciente = $_POST['seleccionar-paciente'];

                    //Recuperamos el límite de tiempo que seleccionó el especialista
                    //para el cuestionario a presentar
                    $tiempo = $_POST['seleccionar-tiempo'];

                    //Recuperamos el id del cuestionario que será reasignado
                    $idCuestionario = $_POST['asignar_cuestionarioId'];

                    //Ejecutamos la función para aasignar el cuestionario a un nuevo paciente
                    cuestionariosEditar_models::asignarPaciente($idPaciente, $tiempo, $idCuestionario);
                }
                ?>
            </form>
            
        </div>
    </div>
</div>

<!-- Modal eliminar/Cuestionarios asignados y no presentados-->
<div class="modal fade" id="myModalEliminar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¡Mensaje importante!</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">
                            <div class="alert alert-warning">
                                <strong>¡Se eliminará la asignación del cuestionario al paciente!</strong></div>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="eliminar_cuestionarioId" id="eliminar_cuestionarioId">
                <input type="hidden" name="nombreCuestionario" id="nombreCuestionario3">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button name="eliminar" type="submit" class="btn btn-danger">Eliminar</button>
                </div>
                <?php
                //Si se presiona el botón submit(eliminar) se procede a eliminar la asignación
                //del cuestionario al determinado paciente
                if(isset($_REQUEST['eliminar'])){
                    //Recuperamos el id del cuestionario
                    $idCuestionario = $_POST['eliminar_cuestionarioId'];

                    //Ejecutamos la función para eliminar la asignación del cuestionario
                    //al paciente, y para identificar este asignación le necesitamos pasar
                    //el id del paciente y el id del cuestionario
                    cuestionariosEditar_models::eliminarCuestionario($idCuestionario);
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    //Recuperamos el id del cuestionario
    //para pasarselo al modal #myModalReasignar cuando el botón reasignar sea presionado
    //quedando almacenado en el input hidden que se encuentra dentro del modal
    function recuperarId(idCuestionario){
        document.getElementById("asignar_cuestionarioId").value = idCuestionario;
    }

    //Recuperamos el id del cuestionario
    //para pasarselo al modal #myModalEliminar cuando el botón eliminar sea presionado
    //quedando almacenado en el input hidden que se encuentra dentro del modal
    function eliminarId(idCuestionario){
        document.getElementById("eliminar_cuestionarioId").value = idCuestionario;  
    }
    //Con esta función logramos capturar el valor del cuestionario consultado y al refrescar página se siga mostrando el cuestionario específicamente buscado 
    function asignarValor(){
        document.getElementById("nombreCuestionario2").value = document.getElementById("nombreCuestionario1").value;
        document.getElementById("nombreCuestionario3").value = document.getElementById("nombreCuestionario1").value;
    }
    //Esta función nos sirve para limpiar el valor del input buscar
    //y así poder tener la funcionalidad del botón "Mostrar todos"
    function limpiar(){
        document.getElementById("nombreCuestionario1").value = "";
    }
</script>

    <?php include("design/footer.php");?>
    </body>
</html>