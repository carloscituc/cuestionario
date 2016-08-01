<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosPresentar.php");

            //Llamamos a la función cuestionariosPresentar la cual carga todos los includes que necesitamos
            cuestionariosPresentar::cuestionarioPresentar();

            //Consultamos a todos los pacientes registrados en el sistema
            $pacientes = cuestionariosPresentar_models::consultarPacientes();
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
                                                Pacientes
                                            </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1 bg-border table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido paterno</th>
                                                        <th>Apellido materno</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        //Imprimimos a todos los pacientes
                                                        while($row = mysqli_fetch_assoc($pacientes)){
                                                    ?>
                                                    <!--Form para pasar datos por POST que nos redireccionará a todos los cuestionarios asigandos a determinado paciente "cuestionariosAsignados.php"-->
                                                    <form name="form_editar<?php echo $row['idPaciente']; ?>" action="cuestionariosAsignados.php" method="POST">
                                                        <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $row['idPaciente']; ?>">
                                                    </form>
                                                    <tr>                  
                                                        <td><?php echo $row['idPaciente']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['apellidoPaterno']; ?></td>
                                                        <td><?php echo $row['apellidoMaterno']; ?></td>
                                                        <td><a class="btn btn-info"  href="javascript:document.form_editar<?php echo $row['idPaciente']; ?>.submit()">Ver cuestionarios</a></td>
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