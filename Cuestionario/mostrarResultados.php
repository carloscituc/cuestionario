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
            $total2 = $_POST['total_opciones'];
            echo "<pre>";
            $arrayPregunta = cuestionariosPresentar_models::recibirResultados($arrayPregunta,$total2);

            print_r($arrayPregunta);  
            echo "</pre>";
        ?>
        <!-- end: content -->
        <?php include("design/footer.php");?>
    </body>
</html>