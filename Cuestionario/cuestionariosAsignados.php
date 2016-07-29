<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosPresentar.php");

            //Llamamos a la función cuestionarioEditarAsignarBuscar la cual carga todos los includes que necesitamos
            cuestionariosPresentar::cuestionariosAsignados();

            if(isset($_POST['id_paciente'])){
                $idPaciente = $_POST['id_paciente'];
            }else{
                $idPaciente = "";
            }
            //Consultamos a todos los pacientes registrados en el sistema
            $paciente = cuestionariosPresentar_models::consultarPaciente($idPaciente);
            $paciente = mysqli_fetch_assoc($paciente);
            $cuestionarios = cuestionariosPresentar_models::consultarCuestionarios($idPaciente);
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
                                            <h4 class="panel-title"><strong>
                                                Paciente: <?php echo $paciente['nombre'] . " " . $paciente['apellidoPaterno'] . " " . $paciente['apellidoMaterno']; ?></strong>
                                            </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id cuestionario</th>
                                                        <th>Nombre cuestionario</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        //Imprimimos todos los cuestionarios consultados
                                                        while($row = mysqli_fetch_assoc($cuestionarios)){
                                                    ?>
                                                    <!--Form para pasar datos por POST que nos redireccionará a la misma página en donde nos encontramos "cuestionarioEditarAsignarBuscar"-->
                                                    <form name="form_editar<?php echo $row['idCuestionarioResuelto']; ?>" action="presentarCuestionario.php" method="POST">
                                                        <input type="hidden" name="id_cuestionarioresuelto" id="id_cuestionarioresuelto" value="<?php echo $row['idCuestionarioResuelto']; ?>">
                                                        <input type="hidden" name="id_cuestionario" id="id_cuestionario" value="<?php echo $row['idCuestionario']; ?>">
                                                    </form>
                                                    <tr>                  
                                                        <td><?php echo $row['idCuestionario']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo $row['idCuestionarioResuelto']; ?>.submit()">Presentar cuestionario</a></td>
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

    <?php include("design/footer.php");?>
    </body>
</html>