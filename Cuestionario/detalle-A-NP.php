<!--Vista detalles cuestionarios asignados/No resueltos-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosResueltos::detalleANP();

            //Recibimos el id de la asignación del cuestionario
            //Verificamos que realmente se esté pasando un dato
            if(isset($_POST['id_cuestionario'])){
                $idCuestionarioResuelto = $_POST['id_cuestionario'];
            }else{
                $idCuestionarioResuelto = "";
            }

            //Almacenamos los datos de la asignación cuestionario no presentado y paciente
            $resultado = cuestionariosResueltos_models::detalleANP($idCuestionarioResuelto);

            //Creamos un array para poder llamar a los datos
            $row = mysqli_fetch_assoc($resultado);
        ?>    
        <!-- start: Content -->
        <div id="content" class="article-v1">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 well">

                                <h1>Detalle cuestionario #<?php echo $row['idCuestionario']; ?></h1>
                                <div class="form-group">
                                    <label for="id_cuestionario">Número de cuestionario</label>
                                    <h4><label class="label label-default"><?php echo $row['idCuestionario']; ?></label></h4>
                                </div>
                                <div class="form-group">
                                    <label for="Nom_cuestionario">Nombre del cuestionario</label>
                                    <h4><label class="label label-default"><?php echo $row['nombreCuestionario']; ?></label></h4>
                                </div>

                                <div class="form-group">
                                    <label for="Nom_paciente">Nombre de paciente</label>
                                    <h4><label class="label label-default"><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno'] . " " . $row['apellidoMaterno']; ?></label></h4>
                                </div>
                                <div class="form-group">
                                    <label for="intentos">Intento</label>
                                    <h4><label class="label label-default"><?php echo $row['intento']; ?></label></h4>
                                </div>
                                <div class="form-group">
                                    <label for="Lim_tpo">Límite de tiempo</label>
                                    <h4><label class="label label-default"><?php echo $row['limiteTiempo']; ?></label></h4>
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