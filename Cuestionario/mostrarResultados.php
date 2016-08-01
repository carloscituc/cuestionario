<!--Vista detalles cuestionarios creados-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php
            include("design/header.php");
            include("php/cuestionariosPresentar.php");

            //Llamamos a la función detalleEA la cual carga todos los includes que necesitamos
            cuestionariosPresentar::presentarCuestionario();

            //Verificamos si se está recibiendo el id del cuestionario para desplegar su información
            $arrayPregunta = unserialize(stripslashes(base64_decode($_POST['datos'])));
            $total2 = base64_decode($_POST['total_opciones']);
            $idCuestionarioResuelto = base64_decode($_POST['id_cuestionarioresuelto']);
            $puntuacion = cuestionariosPresentar_models::obtenerPuntaje($arrayPregunta,$total2);
            $tiempoInicio = base64_decode($_POST['tiempo_inicio']);
            //Funcion para recuperar la hora de inicio del cuestionario
            date_default_timezone_set('America/Mexico_City');
            $tiempoFin = date('H:i:s');
            $fecha = date('Y-m-d');
            cuestionariosPresentar_models::guardarCuestionarioResuelto($idCuestionarioResuelto, $fecha, $tiempoInicio, $tiempoFin, $puntuacion);
        ?>
        <!-- end: content -->
        <?php include("design/footer.php");?>
    </body>
</html>