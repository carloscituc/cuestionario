<!--Vista cuestionarios listar Resueltos/asignados de un determinado paciente-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosResueltos::cuestionarioListarIntentos();

            //Como este archivo(cuestionarioListarIntentos.php) recupera datos por post
            //que nos servirán para hacer una consulta, es necesario verificar
            //que si se están enviando datos
            if(isset($_POST['id_cuestionario'])){
                $idCuestionario = $_POST['id_cuestionario'];
            }else{
                $idCuestionario = "";
            }
            if(isset($_POST['id_paciente'])){
                $idPaciente = $_POST['id_paciente'];
            }else{
                $idPaciente = "";
            }

            //Ejecutamos la función listar la cual nos mostrará los intentos 
            $resultado = cuestionariosResueltos_models::listarT1Intentos($idPaciente, $idCuestionario);

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
                                            <h4 class="panel-title">
                                                Cuestionarios resueltos o presentados por el paciente</a>
                                            </h4>
                                    </div>
                                    <div class="panel-body">                                   
                                        <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre cuestionario</th>
                                                        <th>Nombre paciente</th>
                                                        <th>Intento</th>
                                                        <th>Puntaje</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php while($row = mysqli_fetch_assoc($resultado)){ ?>
                                                    <!-- Formulario para pasar datos por POST-->
                                                    <form name="form_editar<?php echo $row['idCuestionarioResuelto']; ?>" action="detalle-R-P.php" method="POST">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionarioResuelto']; ?>">
                                                        <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $row['idPaciente']; ?>">
                                                    </form>
                                                    <tr>
                                                        <td><?php echo $row['idCuestionario']; ?></td>
                                                        <td><?php echo $row['nombreCuestionario']; ?></td>
                                                        <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno']; ?></td>
                                                        <td><?php echo $row['intento']; ?></td>
                                                        <td><?php echo $row['puntuacion']; ?></td>
                                                        <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo  $row['idCuestionarioResuelto']; ?>.submit()">Detalle</a></td>
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
        </div>
    </div>
<!-- end: content -->


<?php include("design/footer.php");?>
</body>
</html>