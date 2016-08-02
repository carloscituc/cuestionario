<!--Vista buscar por nombre de paciente cuestionarios no resueltos asignados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosResueltos::cuestionarioListarBuscarANP();

            if(isset($_POST['seleccionar-paciente']) && isset($_POST['seleccionar-tiempo']) && isset($_POST['reasignar_pacienteId']) && isset($_POST['reasignar_cuestionarioId'])){
                //Recuperamos el id del paciente a quien se le asignará el cuestionario
                $nuevoIdPaciente = $_POST['seleccionar-paciente'];

                //Recuperamos el límite de tiempo que seleccionó el especialista
                //para el cuestionario a presentar
                $tiempo = $_POST['seleccionar-tiempo'];

                //Recuperamos el id del paciente que tenía asiganado el cuestionario
                $idPaciente = $_POST['reasignar_pacienteId'];

                //Recuperamos el id del cuestionario que será reasignado
                $idCuestionario = $_POST['reasignar_cuestionarioId'];

                //Ejecutamos la función para reasignar el cuestionario a un nuevo paciente
                cuestionariosResueltos_models::reasignarPaciente($nuevoIdPaciente, $tiempo, $idPaciente, $idCuestionario);
            }
            //Recibemos el nombre del paciente que queremos buscar
            //el cual lo recuperamos de cuestionarioListar.php
            //Es necesario verificar si realmente se está enviando un valor por post
            if(isset($_POST['nombre_ANP'])){
                $cadena = $_POST['nombre_ANP'];
            }else{
                $cadena = "";
            }
            if(isset($_POST['tipo_envio'])){
                if($_POST['tipo_envio']==1){
                    //Recuperamos todas las asignaciones de cuestionarios aún o presentados
                    //en donde aparerezca el paciente x
                    $resultado2 = cuestionariosResueltos_models::buscarANP($cadena);
                }else{
                    $idCuestionarioResuelto = $_POST['id_cuestionarioresuelto'];
                    $resultado2 = cuestionariosResueltos_models::buscarANPModificado($idCuestionarioResuelto);
                }
            }else{
                //Recuperamos todas las asignaciones de cuestionarios aún o presentados
                //en donde aparerezca el paciente x
                $resultado2 = cuestionariosResueltos_models::buscarANP($cadena);
            }

            //Ejecutamos la función para listar a todos los pacientes que podrá seleccionar el especialista
            //para reasignar el cuestionario
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
                                        <h3 class="panel-title">
                                            Cuestionarios asignados y no presentados aún por el paciente
                                        </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-offset-1 well">
                                        <form action="cuestionarioListarBuscarANP.php" method="post" id="form_buscarANP">
                                            <div class="form-group">

                                                <div class="col-md-6">
                                                    <input class="form-control" id="nombre_ANP" name="nombre_ANP" placeholder="Buscar por nombre de paciente..." type="text">
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
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php
                                                    //Iniciacmos contador que servirá para identificar un formulario de otro 
                                                    $i = 0;
                                                    //Imprimimos todos los datos de la tabla de cuestionarios no asignados
                                                    while($row = mysqli_fetch_assoc($resultado2)){ 
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['idCuestionario']; ?></td>
                                                    <td><?php echo $row['nombreCuestionario']; ?></td>
                                                    <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno'] . " " . $row['apellidoMaterno']; ?></td>
                                                    <td><?php echo $row['limiteTiempo']; ?></td>
                                                    <td><?php if($row['estatus'] == '0') echo "Sin presentar"; ?></td>
                                                    <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalReasignar" onclick="recuperarId('<?php echo $row['idCuestionario'];?>','<?php echo $row['idPaciente']; ?>','<?php echo $row['limiteTiempo'];?>','<?php echo $row['idCuestionarioResuelto'];?>'),tipoBusqueda('2');">Reasignar</button></td>
                                                    <td><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalEliminar" onclick="eliminarId('<?php echo $row['idCuestionario'];?>','<?php echo $row['idPaciente']; ?>')">Eliminar</button></td>
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

                    //Recargamos la página para ver resultados
                    //echo "<script> location.href='cuestionarioListarBuscarANP.php'; </script>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    function recuperarId(idCuestionario,idPaciente, limiteTiempo,idCuestionarioResuelto){
        document.getElementById("reasignar_cuestionarioId").value = idCuestionario;
        document.getElementById("reasignar_pacienteId").value = idPaciente;
        document.getElementById("id_cuestionarioresuelto").value = idCuestionarioResuelto;
        document.getElementById(idPaciente).selected = 'selected';
        document.getElementById(limiteTiempo).selected = 'selected';
    }
    function eliminarId(idCuestionario,idPaciente){
        document.getElementById("eliminar_cuestionarioId").value = idCuestionario;
        document.getElementById("eliminar_pacienteId").value = idPaciente;   
    }
    function limpiarANP(){
        document.getElementById("nombre_ANP").value = "";
    }

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