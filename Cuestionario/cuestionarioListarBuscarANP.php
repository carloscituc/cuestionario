<!--Vista cuestionarios Resueltos/asignados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosResueltos::cuestionarioListarBuscarANP();
            if(isset($_POST['nombre_ANP'])){
                $cadena = $_POST['nombre_ANP'];
            }else{
                $cadena = "";
            }

            //Ejecutamos la función listar la cual nos devuelve todos los datos de la primera tabla
            $resultado2 = cuestionariosResueltos_models::buscarANP($cadena);

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
                                            Cuestionarios asignados y no presentados aún por el paciente</a>
                                        </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-offset-1 well">
                                        <form action="cuestionarioListarBuscarANP.php" method="post">
                                            <div class="form-group">

                                                <div class="col-md-6">
                                                    <input class="form-control" id="nombre_ANP" name="nombre_ANP" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                                                    <input id="btn_todos" name="btn_todos" class="btn btn-primary" value="Mostrar todos" onclick="limpiarANP();" type="submit">
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
                                                    <th>Intento</th>
                                                    <th>Estatus</th> 
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php 
                                                    $i = 0;
                                                    while($row = mysqli_fetch_assoc($resultado2)){ 
                                                ?>
                                                    <!-- Formulario para pasar datos por POST-->
                                                    <form name="form_editar<?php echo $i; ?>" action="detalle-A-NP.php" method="POST">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionarioResuelto']; ?>">
                                                    </form>
                                                <tr>
                                                    <td><?php echo $row['idCuestionario']; ?></td>
                                                    <td><?php echo $row['nombreCuestionario']; ?></td>
                                                    <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno']; ?></td>
                                                    <td><?php echo $row['intento']; ?></td>
                                                    <td><?php if($row['estatus'] == '0') echo "Sin presentar"; ?></td>
                                                    <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo $i; $i++; ?>.submit()">Detalle</a></td>
                                                    <td><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalReasignar" onclick="recuperarId('<?php echo $row['idCuestionario'];?>','<?php echo $row['idPaciente']; ?>');">Reasignar</button>
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
            <form method="post">
                <div class="modal-body">
                    <div class="row" id="paciente">
                        <div class="col-md-12 padding-0">
                            <label for="select-paciente">Seleccionar paciente</label>
                            <select class="form-control" name="seleccionar-paciente">
                                <?php                                    
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
                    <input type="hidden" name="reasignar_cuestionarioId" id="reasignar_cuestionarioId">
                    <input type="hidden" name="reasignar_pacienteId" id="reasignar_pacienteId">                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button name="reasignar" id="reasignar" type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <?php 
                if(isset($_REQUEST['reasignar'])){
                    $nuevoIdPaciente = $_POST['seleccionar-paciente'];
                    $tiempo = $_POST['seleccionar-tiempo'];
                    $idPaciente = $_POST['reasignar_pacienteId'];
                    $idCuestionario = $_POST['reasignar_cuestionarioId'];

                    cuestionariosResueltos_models::reasignarPaciente($nuevoIdPaciente, $tiempo, $idPaciente, $idCuestionario);
                    echo "<script> location.href='cuestionarioListarBuscarANP.php'; </script>";
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
                <input type="hidden" name="eliminar_pacienteId" id="eliminar_pacienteId"> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button name="eliminar" type="submit" class="btn btn-danger">Eliminar</button>
                </div>
                <?php 
                if(isset($_REQUEST['eliminar'])){
                    $idPaciente = $_POST['eliminar_pacienteId'];
                    $idCuestionario = $_POST['eliminar_cuestionarioId'];
                    cuestionariosResueltos_models::eliminarAsignacion($idPaciente, $idCuestionario);
                    echo "<script> location.href='cuestionarioListarBuscarANP.php'; </script>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    function recuperarId(idCuestionario,idPaciente){
        document.getElementById("reasignar_cuestionarioId").value = idCuestionario;
        document.getElementById("reasignar_pacienteId").value = idPaciente;   
    }
    function eliminarId(idCuestionario,idPaciente){
        document.getElementById("eliminar_cuestionarioId").value = idCuestionario;
        document.getElementById("eliminar_pacienteId").value = idPaciente;   
    }
    function limpiarANP(){
        document.getElementById("nombre_ANP").value = "";
    }
</script>
<?php include("design/footer.php");?>
</body>
</html>