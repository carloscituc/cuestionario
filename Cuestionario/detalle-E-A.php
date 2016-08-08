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
        
        <div class="container">
            <div class="panel">
                <div class="panel-heading">
                    <h2><strong><?php echo $arrayBloque[0]['nombre']; ?></strong></h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="<?php echo $arrayBloque[0]['nombre']; ?> method="post" action="#">
                        <?php 
                                        //Esta variable nos servirá para detener la comparacion de si determinada pregunta pertene a un determinado bloque
                            $variable = 0;
                                        //Iniciamos un ciclo que se repetirá según el número de bloques
                            for($i=0; $i < $total; $i++){
                        ?>  
                        <div class="bloque">
                            <h3 class="titulo_bloque"><strong>Sección #<?php echo ($i+1) . "</strong><br> Instucciones: " . $arrayBloque[$i]['instruccion']; ?></h3>
                            <?php
                                //Iniciamos un ciclo que se repetirá según el número de preguntas
                                for($j=$variable; $j < $total2; $j++){
                                            //Con este if verificamos que si determinada pregunta pertenece al bloque, para imprimirlo dentro de el
                                    if($arrayBloque[$i]['idBloquePregunta'] == $arrayPregunta[$j]['idBloquePregunta']){  
                            ?>
                                <div class="form-group pregunta">
                                    <label class="col-xs-12 titulo_pregunta"><?php echo ($j+1). ".- " .$arrayPregunta[$j]['pregunta']; ?></label>
                                    <?php
                                                        //Iniciamos un ciclo que se repetirá 10 veces(sólo hay 10 posibles respuestas)
                                                        //eso no implica que tenga 10 respuestas
                                            for($k = 1; $k<11; $k++){
                                                            //Se verifica si la respuesta existe y si no, no la imprimimos
                                                if(isset($arrayPregunta[$j]['respuesta'.$k])){
                                    ?>
                                    
                                    <?php
                                        if($arrayPregunta[$j]['respuesta'.$k]==$arrayPregunta[$j]['respuestaCorrecta']){
                                    ?>  
                                    <div class="col-xs-12 radio_correcto">
                                        <label class="radio_opcion radio-inline">
                                            <input type="radio" checked name="<?php echo $j; ?>"><strong><?php echo " " . $arrayPregunta[$j]['respuesta'.$k]; ?></strong>
                                        </label>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <div class="col-xs-12">
                                        <label class="radio_opcion radio-inline">
                                            <input type="radio" name="<?php echo $j; ?>"><?php echo " " . $arrayPregunta[$j]['respuesta'.$k]; ?>
                                    </label>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                        
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
                                    /*
                                    echo "TOtal 2: $total2<br>";
                                    echo "variable: $variable<br>";
                                    echo "j: $j<br>";*/
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
        <?php 
        }
        ?>
        <!-- end: content -->
        <?php include("design/footer.php");?>
    </body>
</html>