<!--Vista buscar por nombre de paciente cuestionarios resueltos o presentados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
            include("design/header.php");
            include("php/cuestionariosResueltos.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosResueltos::cuestionarioListarBuscarRP();

            //Recuperamos el nombre del paciente del cual buscaremos
            //todos los cuestionarios resueltos que tenga
            //Verificamos si realmente se está pasando un dato
            if(isset($_POST['nombre_RP'])){
                $cadena = $_POST['nombre_RP'];
            }else{
                $cadena = "";
            }

            //Ejecutamos la función que nos devolverá los cuestionarios
            //resueltos por x paciente
            $resultado = cuestionariosResueltos_models::buscarRP($cadena);
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
                                        <div class="col-md-10 col-md-offset-1 well">
                                            <form method="post" action="cuestionarioListarBuscarRP.php">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input class="form-control" id="nombre_RP" name="nombre_RP" placeholder="Buscar por nombre de paciente..." type="text" value="" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input id="btn_buscar" name="btn_search" type="submit" class="btn btn-danger" value="Buscar" />
                                                        <input id="btn-todos" name="btn_search" type="submit" class="btn btn-primary" onclick="limpiarRP()" value="Mostrar todos" />
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
                                                    //Contador que sirve para identificar únivocamente cada formulario
                                                    $i = 0;

                                                    //Imprimimos todos los datos encontrados en la consulta
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
                                                        <td><?php echo $row['nombrePaciente'] . " " . $row['apellidoPaterno']; ?></td>
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
                </div>                                  
            </div>
        </div>         
        </div>
    </div>
<!-- end: content -->
<script>
    //Función para limpiar el input de buscar por nombre de paciente
    function limpiarRP(){
        document.getElementById("nombre_RP").value = "";
    }
</script>
<?php include("design/footer.php");?>
</body>
</html>