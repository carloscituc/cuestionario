<!--Vista detalles cuestionarios creados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body onload="nobackbutton();">
        <?php
            include("php/cuestionariosPresentar.php");
            
            //Llamamos a la función detalleEA la cual carga todos los includes que necesitamos
            cuestionariosPresentar::presentarCuestionario();

            //Verificamos si se está recibiendo el id del cuestionario y el id de la asignación para desplegar su información
            if(isset($_POST['id_cuestionario']) AND isset($_POST['id_cuestionarioresuelto'])){
                //Recuperamos el id del cuestionario a presentar
                $idCuestionario = $_POST['id_cuestionario'];
                //Recuperamos el id de la asignación paciente-cuestionario
                $idCuestionarioResuelto = $_POST['id_cuestionarioresuelto'];

                if(cuestionariosPresentar_models::consultarCuestionarioPresentado($idCuestionarioResuelto)){
                //Recuperamos la fecha y hora en que el paciente da inicio a presentar el cuestionario
                date_default_timezone_set('America/Mexico_City');
                $tiempoInicio = date('H:i:s');

                $fecha = date('Y-m-d');

                //Actualizamos el estatus del cuestionario ha presentado
                cuestionariosPresentar_models::presentar($idCuestionarioResuelto,$fecha);
                //Ejectamos la consulta que nos devuelve todos los bloques del cuestionario seleccionado
                $arrayBloque = cuestionariosPresentar_models::detalleCuestionarioBloques($idCuestionario);
                //Ejecutamos la consulta que nos debuelve todos las preguntas del cuestionario seleccionado
                $arrayPregunta = cuestionariosPresentar_models::detalleCuestionarioPreguntas($idCuestionario);
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
                    <form name="cuestionario" id="cuestionario" class="form-horizontal" method="post" action="mostrarResultados.php" onsubmit="return validarRadio(<?php echo $total2;?>);">
                        
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
                                    <label id="<?php echo "pregunta".$j; ?>" class="col-xs-12 titulo_pregunta"><?php echo ($j+1). ".- " .$arrayPregunta[$j]['pregunta']; ?></label>
                                    <?php
                                                        //Iniciamos un ciclo que se repetirá 10 veces(sólo hay 10 posibles respuestas)
                                                        //eso no implica que tenga 10 respuestas
                                            for($k = 1; $k<11; $k++){
                                                            //Se verifica si la respuesta existe y si no, no la imprimimos
                                                if(isset($arrayPregunta[$j]['respuesta'.$k])){
                                    ?>
                                    <div class="col-xs-12">
                                        <label class="radio_opcion radio-inline">
                                            <input type="radio" name="<?php echo "opcion".$j; ?>" value="<?php echo $arrayPregunta[$j]['respuesta'.$k]; ?>"><?php echo " " . $arrayPregunta[$j]['respuesta'.$k]; ?>
                                        </label>
                                    </div>
                                    <?php
                                            }
                                        }
                                    ?>
                                    <div id="<?php echo "opcion".$j; ?>" class="alert alert-danger hide"><strong>Selecciona una opción</strong></div>
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
                        <?php //Con este input pasaremos el arrayPregunta al de mostrar resultados ?>
                        <input type="hidden" name="datos" value='<?php echo base64_encode(serialize($arrayPregunta)); ?>'>
                        <?php //Con este input pasaremos el total de preguntas del arrayPregunta ?>
                        <input type="hidden" name="total_opciones" value='<?php echo base64_encode($total2); ?>'>
                        <?php //Con este input pasaremos el id de la asignación paciente-cuestionario para poder guardar el resultado obtenido en la relación correspondiente ?>
                        <input type="hidden" name="id_cuestionarioresuelto" value="<?php echo base64_encode($idCuestionarioResuelto); ?>">
                        <?php //Con este input pasamos el tiempo en el que inició el paciente a presentar el cuestionario ?>
                        <input type="hidden" name="tiempo_inicio" value="<?php echo base64_encode($tiempoInicio); ?>">
                        <button type="submit" id="finalizar" name="finalizar" class="btn btn-primary">Finalizar</button>
                    </form>                    
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
        <!-- end: content -->
        <script>
            // function validarRadio(totalInputs){
                
            //     for(cont = 0;cont<totalInputs;cont++){                    
            //         booleano = false;
            //         var radioElements = document.getElementsByName("opcion"+cont);
            //         document.getElementById("opcion"+cont).className = "alert alert-danger hide";
            //         for (i=0;i<radioElements.length;i++){
            //             if (radioElements[i].checked){
            //                 booleano = true;
            //                 break;
            //             }
            //             if (booleano == false && i == (radioElements.length-1)){
            //                 document.getElementById("opcion"+cont).className = "alert alert-danger";
            //                 return false;
            //             }
            //         }
            //     }
            //     return booleano;
            // }
            //Esta función se utiliza para verificar que en todas la preguntas se ha seleccionado alguna opción
            function validarRadio(totalInputs){
                boolGeneral = true;
                orden = 0;
                pregunta = 0;
                for(cont = 0;cont<totalInputs;cont++){
                    booleano = false;
                    var radioElements = document.getElementsByName("opcion"+cont);
                    document.getElementById("opcion"+cont).className = "alert alert-danger hide";
                    for (i=0;i<radioElements.length;i++){
                        if (radioElements[i].checked){
                            booleano = true;
                            break;
                        }
                        if (booleano == false && i == (radioElements.length-1)){
                            document.getElementById("opcion"+cont).className = "alert alert-danger";
                            booleano = false;
                            if(orden == 0){
                                pregunta = cont;
                                orden++;
                            }
                        }
                    }
                    if(boolGeneral && booleano){
                        boolGeneral = true;
                    }else{
                        boolGeneral = false;
                    }
                }
                if(orden!=0){
                    document.getElementById("pregunta"+pregunta).scrollIntoView();
                }
                return boolGeneral;
            }
            //Esta función sirve para deshabilitar el botón de regresar a página anterior que incluyen todos los navegadores
            function nobackbutton(){
                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button"
                window.onhashchange=function(){window.location.hash="no-back-button";}
            }
        </script>
        <?php include("design/footer.php");?>
    </body>
</html>