<!--Vista Cuestionarios Listar-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función cuestionarioListar la cual carga todos los includes que necesitamos
            cuestionariosResueltos::cuestionarioListar();

            //Ejecutamos la función listar la cual nos devuelve todos los datos de la primera tabla
            $resultado = cuestionariosResueltos_models::listarT1();

            //Ejecutamos la función listar la cual nos devuelve todos los datos de la segunda tabla
            $resultado2 = cuestionariosResueltos_models::listarT2();

            //Ejecutamos la función para listar a todos los pacientes y el especialista pueda
            //reasignar el cuestionario
            $pacientes = cuestionariosResueltos_models::reasignarANP();
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
                                                Cuestionarios resueltos o presentados por el paciente
                                            </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1 well">
                                            <form method="post" action="cuestionarioListarBuscarRP.php">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input class="form-control" id="nombre_RP" name="nombre_RP" placeholder="Buscar por nombre de paciente..." type="text">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input id="btn_buscar" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                                                        <input id="btn-todos" name="btn_todos" type="submit" class="btn btn-primary" onclick="limpiarRP();" value="Mostrar todos" />
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
                                                        <th>Nombre paciente</th>
                                                        <th>Intentos</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    //Contador que indica el id del formulario
                                                    $i = 0;

                                                    //Recorrer todas las asignaciones de cuestionarios presentados
                                                    while($row = mysqli_fetch_assoc($resultado)){ 
                                                    if ($row['intentos'] == 1) {

                                                ?>
                                                    <!-- Formulario para pasar datos por POST cuando se tiene sólo un intento por parte del paciente con relación a un cuestionario-->
                                                    <form name="form_editar<?php echo $i; ?>" action="detalle-R-P.php" method="POST">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionarioResuelto']; ?>">
                                                    </form>
                                                <?php
                                                    }else{
                                                ?>
                                                    <!-- Formulario para pasar datos por POST cuando se tiene más de un intento por parte del paciente con relación a un cuestionario-->
                                                    <form name="form_editar<?php echo $i; ?>" action="cuestionarioListarIntentos.php" method="POST">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionario']; ?>">
                                                        <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $row['idPaciente']; ?>">
                                                    </form>
                                                <?php
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['idCuestionario']; ?></td>
                                                        <td><?php echo $row['nombreCuestionario']; ?></td>
                                                        <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno'] . " " .$row['apellidoMaterno']; ?></td>
                                                        <td><?php echo $row['intentos']; ?></td>
                                                        <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo $i; $i++; ?>.submit()">Detalle</a></td>
                                                    </tr>
                                                <?php } ?>
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
                                        <h3 id="ANP" class="panel-title">
                                            Cuestionarios asignados y no presentados aún por el paciente</a>
                                        </h3>
                                </div>
                                
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-offset-1 well">
                                        <form action="cuestionarioListarBuscarANP.php" method="post" id="form_buscarANP">
                                            <div class="form-group">

                                                <div class="col-md-6">
                                                    <input class="form-control" id="nombre_ANP" name="nombre_ANP" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                                                    <input type="hidden" name="tipo_envio" id="tipo_envio1">
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="btn_search" name="btn_search" class="btn btn-danger" onclick="tipoBusqueda('1'),function(){document.getElementById('form_buscarANP').submit()};">Buscar</button>
                                                    <button id="btn_todos" name="btn_todos" class="btn btn-primary" onclick="tipoBusqueda('1'),limpiarANP(),function(){document.getElementById('form_buscarANP').submit()};" type="submit">Mostrar todos</button>   
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
                                                    <th>Nombre paciente</th>
                                                    <th>Límite de tiempo</th>
                                                    <th>Estatus</th> 
                                                    <th>Acciones</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php
                                                    //While para recorrer todas las asignaciones de cuestionarios no presentados
                                                    while($row = mysqli_fetch_assoc($resultado2)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['idCuestionario']; ?></td>
                                                    <td><?php echo $row['nombreCuestionario']; ?></td>
                                                    <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno']. " " .$row['apellidoMaterno']; ?></td>
                                                    <td><?php echo $row['limiteTiempo']; ?></td>
                                                    <td><?php if($row['estatus'] == '0') echo "Sin presentar"; ?></td>
                                                    <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalReasignar" onclick="recuperarId('<?php echo $row['idCuestionario'];?>','<?php echo $row['idPaciente']; ?>','<?php echo $row['limiteTiempo'];?>','<?php echo $row['idCuestionarioResuelto'];?>');">Reasignar</button></td>
                                                    <td><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalEliminar" onclick="eliminarId('<?php echo $row['idCuestionario'];?>','<?php echo $row['idPaciente']; ?>');">Eliminar</button></td>
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
<div class="modal fade" id="myModalReasignar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reasignar cuestionario</h4>
            </div>
            <form method="post" action="cuestionarioListarBuscarANP.php" id="form_reasignar">
                <div class="modal-body">
                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">
                            <label for="select-paciente">Seleccionar paciente</label>
                            <select class="form-control" name="seleccionar-paciente" id="seleccionar-paciente">
                                <?php
                                    //Recuperamos la lista de pacientes registrados en el sistema                                    
                                    while($paciente = mysqli_fetch_assoc($pacientes)){ 
                                ?>      
                                <option id="<?php echo $paciente['idPaciente']; ?>" value="<?php echo $paciente['idPaciente']; ?>"><?php echo $paciente['nombre'] . " " . $paciente['apellidoPaterno'] . " " . $paciente['apellidoMaterno']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="paciente2">
                        <div class="col-md-12 padding-1">
                            <label for="select-tiempo">Seleccionar límite de tiempo de evaluación</label>
                            <select class="form-control" name="seleccionar-tiempo">
                                <option id="00:15:00" value="00:15:00">15 minutos</option>
                                <option id="00:30:00" value="00:30:00">30 minutos</option>
                                <option id="00:45:00" value="00:45:00">45 minutos</option>
                                <option id="01:00:00" value="01:00:00">60 minutos</option>
                                <option id="01:15:00" value="01:15:00">1-15 minutos</option>
                                <option id="01:30:00" value="01:30:00">1-30 minutos</option>
                                <option id="01:45:00" value="01:45:00">1-45 minutos</option>
                                <option id="02:00:00" value="02:00:00">1-60 minutos</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="reasignar_cuestionarioId" id="reasignar_cuestionarioId">
                    <input type="hidden" name="reasignar_pacienteId" id="reasignar_pacienteId">
                    <input type="hidden" name="id_cuestionarioresuelto" id="id_cuestionarioresuelto">
                    <input type="hidden" name="tipo_envio" id="tipo_envio2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button name="reasignar" id="reasignar" class="btn btn-primary" onclick="tipoBusqueda('2'),function(){document.getElementById('form_reasignar').submit()};">Reasignar</button>
                </div>
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
                <input type="hidden" name="eliminar_pacienteId" id="eliminar_pacienteId"> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button name="eliminar" type="submit" class="btn btn-danger">Eliminar</button>
                </div>
                <?php
                //Si se presiona el botón submit(eliminar) se procede a eliminar la asignación
                //del cuestionario al determinado paciente
                if(isset($_REQUEST['eliminar'])){
                    //Recuperamos el id del paciente
                    $idPaciente = $_POST['eliminar_pacienteId'];
                    //Recuperamos el id del cuestionario
                    $idCuestionario = $_POST['eliminar_cuestionarioId'];

                    //Ejecutamos la función para eliminar la asignación del cuestionario
                    //al paciente, y para identificar este asignación le necesitamos pasar
                    //el id del paciente y el id del cuestionario
                    cuestionariosResueltos_models::eliminarAsignacion($idPaciente, $idCuestionario);
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    //Recuperamos el id del cuestionario y el id del paciente, el limite de Tiempo, el id de la relación de asignación paciente-cuestionario
    //para pasarselo al modal #myModalReasignar cuando el botón reasignar sea presionado
    //quedando almacenado en los dos inputs hidden que se encuentran dentro del modal
    function recuperarId(idCuestionario,idPaciente,limiteTiempo,idCuestionarioResuelto){
        document.getElementById("reasignar_cuestionarioId").value = idCuestionario;
        document.getElementById("reasignar_pacienteId").value = idPaciente;
        document.getElementById("id_cuestionarioresuelto").value = idCuestionarioResuelto;
        document.getElementById(idPaciente).selected = 'selected';
        document.getElementById(limiteTiempo).selected = 'selected';
    }

    //Recuperamos el id del cuestionario y el id del paciente
    //para pasarselo al modal #myModalEliminar cuando el botón eliminar sea presionado
    //quedando almacenado en los dos inputs hidden que se encuentran dentro del modal
    function eliminarId(idCuestionario,idPaciente){
        document.getElementById("eliminar_cuestionarioId").value = idCuestionario;
        document.getElementById("eliminar_pacienteId").value = idPaciente;   
    }

    //Esta función nos sirve para limpiar el valor del input buscar
    //de los cuestionarios no presentados
    function limpiarANP(){
        document.getElementById("nombre_ANP").value = "";
    }

    //Esta función nos sirve para limpiar el valor del input buscar
    //de los cuestionarios presentados
    function limpiarRP(){
        document.getElementById("nombre_RP").value = "";
    }

    //Esta función nos permite establecer el tipo de consulta de búsqueda que se ejecutará en cuestionarioListarBuscarANP
    //en base al botón seleccionado, tipo_envio1 = se pulsó el botón "Buscar" o "Mostrar todos" de la sección cuestionarios asignados no presentados
    //tipo_envio2 = se pulsó el botón "Reasignar" del modal reasignar cuestionario
    function tipoBusqueda(tipoBusqueda){
        if(tipoBusqueda == 1){
            document.getElementById("tipo_envio1").value = "1";
        }else{
            document.getElementById("tipo_envio2").value = "2";
        }       
    }
</script>
<?php include("design/footer.php");?>
</body>
</html>