<!--Vista detalles cuestionarios creados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body onload="nobackbutton();">
        <?php
            include("design/header.php");
            include("php/cuestionariosPresentar.php");

            //Llamamos a la función presentarCuestionario la cual carga todos los includes que necesitamos
            cuestionariosPresentar::presentarCuestionario();

            //Verificamos si se están recibiendo todos los datos necesarios y correctos para hacer la inserción            
            if(isset($_POST['datos']) && isset($_POST['total_opciones']) && isset($_POST['id_cuestionarioresuelto']) && isset($_POST['tiempo_inicio'])){
                //Esta función sirve para determinar si el arrayPregunta se está recibiendo correctamente o no
                function isSerialized($str) {
                    return ($str == serialize(false) || @unserialize($str) !== false);
                }
                $str = stripslashes(base64_decode($_POST['datos']));

                //Verificamos que los datos recuperados decodificados si son correctos (existen en el alfabeto de base64_decode)
                if(isSerialized($str) && base64_decode($_POST['total_opciones']) && base64_decode($_POST['id_cuestionarioresuelto']) && base64_decode($_POST['tiempo_inicio'])){
                    //Almacenamos el arrayPregunta recibido
                    $arrayPregunta = unserialize(stripslashes(base64_decode($_POST['datos'])));
                    //Almacenamos el total de preguntas
                    $total2 = base64_decode($_POST['total_opciones']);
                    //Almacenamos el id de la relación paciente-cuestionario
                    $idCuestionarioResuelto = base64_decode($_POST['id_cuestionarioresuelto']);
                    //Ejecutamos la función y almacenamos un array con el puntaje total y el puntaje obtenido
                    $puntuacion = cuestionariosPresentar_models::obtenerPuntaje($arrayPregunta,$total2);
                    //Almacenamos el tiempo de inicio de presentación del cuestionario
                    $tiempoInicio = base64_decode($_POST['tiempo_inicio']);
                    //Funcion para recuperar la fecha y hora de inicio del cuestionario
                    date_default_timezone_set('America/Mexico_City');
                    $tiempoFin = date('H:i:s');
                    $fecha = date('Y-m-d');
                    //Hacemos la inserción de datos a la base de datos en la tabla cuestionariosResueltos
                    cuestionariosPresentar_models::guardarCuestionarioResuelto($idCuestionarioResuelto, $fecha, $tiempoInicio, $tiempoFin, $puntuacion['puntajeObtenido']);

        ?>
        <!-- start: Content -->
        <div id="content" class="article-v1">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>
                                    <?php echo "¡Felicidades has finalizado el cuestionario!"; ?>
                                </h1>
                                <h3>
                                    <?php
                                    echo "Puntaje obtenido: ".$puntuacion['puntajeObtenido']."<br>Puntaje total del cuestionario: ".$puntuacion['puntajeTotal']; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
        <!-- end: content -->
        <?php
                }
            }
            
        ?>
        <!-- end: content -->
        <script>
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