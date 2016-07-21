<!--Vista detalles cuestionarios creados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php
            include("design/header.php");
            include("php/cuestionariosEditar.php");

            //Llamamos a la función detalleEA la cual carga todos los includes que necesitamos
            cuestionariosEditar::detalleEA();

            //Verificamos si se está recibiendo el id del cuestionario para desplegar su información
            if(isset($_POST['id_cuestionario'])){
                $idCuestionario = $_POST['id_cuestionario'];
                //Ejectamos la consulta que nos devuelve todos los bloques del cuestionario seleccionado
                $arrayBloque = cuestionariosEditar_models::detalleCuestionarioBloques($idCuestionario);
                //Ejecutamos la consulta que nos debuelve todos las preguntas del cuestionario seleccionado
                $arrayPregunta = cuestionariosEditar_models::detalleCuestionarioPreguntas($idCuestionario);
            //Contamos el número de bloques(secciones) devueltos
            $total = count($arrayBloque);
            //Contamos el número de preguntas devueltas
            $total2 = count($arrayPregunta);
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
                                        //Esta variable nos servirá para detener la comparacion de si determinada pregunta pertene a un determinado bloque
                                        $variable = 0;
                                        //Iniciamos un ciclo que se repetirá según el número de bloques
                                        for($i=0; $i < $total; $i++){
                                    ?>                               
                                        <div class="row" id="bloque">
                                            <div class="col-sm-12">
                                                    <h3>Sección #<?php echo ($i+1) . " " . $arrayBloque[$i]['instruccion']; ?></h3>
                                             </div>
                                        </div>
                                    <?php
                                        //Iniciamos un ciclo que se repetirá según el número de preguntas
                                        for($j=$variable; $j < $total2; $j++){
                                            //Con este if verificamos que si determinada pregunta pertenece al bloque, para imprimirlo dentro de el
                                            if($arrayBloque[$i]['idBloquePregunta'] == $arrayPregunta[$j]['idBloquePregunta']){
                                    ?>      
                                           
                                    <div class="row" id="pregunta">
                                                <div class="col-sm-12">
                                                    <label for="pregunta<?php echo ($j+1); ?>"><?php echo ($j+1). ".- " .$arrayPregunta[$j]['pregunta']; ?></label>
                                                </div>
                                            
                                                    <?php
                                                        //Iniciamos un ciclo que se repetirá 10 veces(sólo hay 10 posibles respuestas)
                                                        //eso no implica que tenga 10 respuestas
                                                        for($k = 1; $k<11; $k++){
                                                            //Se verifica si la respuesta existe y si no, no la imprimimos
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
                                                    //En dado caso que se llegue al número máximo de respuestas para el bloque
                                                    //almacenamos el número de la pregunta del arrayPreguntas
                                                    $variable = $j;

                                                    //Alteramos la variable que controla la impresión de preguntas para terminar su impresión
                                                    //para cada bloque
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