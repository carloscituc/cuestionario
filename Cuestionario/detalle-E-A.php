<!--Vista detalles cuestionarios creados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php
            include("design/header.php");
            include("php/cuestionariosEditar.php");

            //Llamamos a la función index la cual carga todos los includes que necesitamos
            cuestionariosEditar::detalleEA();

            if(isset($_POST['id_cuestionario'])){
                $idCuestionario = $_POST['id_cuestionario'];
            
            $arrayBloque = cuestionariosEditar_models::detalleCuestionarioBloques($idCuestionario);
            $arrayPregunta = cuestionariosEditar_models::detalleCuestionarioPreguntas($idCuestionario);

            $total = count($arrayBloque);
            $total2 = count($arrayPregunta);
            $pacientes = cuestionariosEditar_models::consultarPacientes();
        ?>
           
        <!-- start: Content -->
        <div id="content" class="article-v1">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                                <form id="<?php echo $arrayBloque[0]['nombre']; ?> method="post" action="#">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12" id="titulo">
                                                <h1 align="center"><?php echo $arrayBloque[0]['nombre']; ?></h1>
                                            </div>
                                        </div>
                                    <?php 
                                        $variable = 0;
                                        for($i=0; $i < $total; $i++){
                                    ?>                               
                                        <div class="row" id="bloque">
                                            <div class="col-sm-12">
                                                    <h3>Sección #<?php echo ($i+1) . " " . $arrayBloque[$i]['instruccion']; ?></h3>
                                             </div>
                                        </div>
                                    <?php
                                        for($j=$variable; $j < $total2; $j++){
                                                if($arrayBloque[$i]['idBloquePregunta'] == $arrayPregunta[$j]['idBloquePregunta']){
                                    ?>      
                                           
                                    <div class="row" id="pregunta">
                                                <div class="col-sm-12">
                                                    <label for="pregunta<?php echo ($j+1); ?>"><?php echo ($j+1). ".- " .$arrayPregunta[$j]['pregunta']; ?></label>
                                                </div>
                                            
                                                    <?php
                                                        for($k = 1; $k<11; $k++){
                                                            if(isset($arrayPregunta[$j]['respuesta'.$k])){
                                                    ?>
                                                                    <div class="col-sm-12">
                                                                        <input id="respuesta<?php echo ($j+1); ?>" name="respuesta<?php echo ($j+1);?>" type="radio">
                                                                        <label for="respuesta<?php echo ($j+1); ?>"><?php echo " " . $arrayPregunta[$j]['respuesta'.$k]; ?></label>
                                                                    </div><!-- /.col-lg-6 -->
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                        </div>                                                           
                                    <?php
                                                }else{
                                                    $variable = $j;
                                                    $j = $total2;
                                                }
                                            }   
                                    ?>
                                    </div>
                                    <?php
                                    }                                    
                                    ?>
                                </form>
                            
                    </div>
                </div>         
            </div>
        </div>
        <?php } ?>
        <!-- end: content -->
        <?php include("design/footer.php");?>
    </body>
</html>