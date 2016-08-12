<!--Vista crear cuestionario-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
        include("design/header.php");
        include("php/cuestionariosEditar.php");
        cuestionariosEditar::cuestionarioEditarAsignarModificar();

        if(isset($_POST['id_cuestionario'])){
            $idCuestionario = $_POST['id_cuestionario'];
        }else{
            $idCuestionario = "";
        }
        echo $idCuestionario;
        //Ejectamos la consulta que nos devuelve todos los bloques del cuestionario seleccionado
        $arrayBloque = cuestionariosEditar_models::detalleCuestionarioBloques($idCuestionario);
        //Ejecutamos la consulta que nos debuelve todos las preguntas del cuestionario seleccionado
        $arrayPregunta = cuestionariosEditar_models::detalleCuestionarioPreguntas($idCuestionario);

        //Contamos el número de bloques(secciones) devueltos
        $total = count($arrayBloque);
        //Contamos el número de preguntas devueltas
        $total2 = count($arrayPregunta);
        echo "<script>numSeccion = $total; </script>";
        ?>
        <!-- start: Content -->
        <!--<div id="content" class="container-fluid">-->
        <div class="form-element">
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel form-element-padding">
                        <div class="panel-heading">
                            <h4>Modificar cuestionario</h4>
                        </div>
                        <div class="panel-body" style="padding-bottom:30px;">
                            <form id="form1" method="post">
                                <div class="form-group">
                                    <div class="col-sm-12" id="Coltitulo">
                                        <div class="col-sm-12 padding-0">
                                            <input value="<?php echo $arrayBloque[0]['nombre']; ?>" id="titulo" name="titulo" type="text" class="form-control" placeholder="Escribe el título del cuestionario">
                                        </div>
                                    </div>
                                </div>
                        <?php 
                                        //Esta variable nos servirá para detener la comparacion de si determinada pregunta pertene a un determinado bloque
                            $variable = 0;
                            $numSeccion = 1;
                            $numPregunta = 1;
                            $numOpcion = 1;
                                        //Iniciamos un ciclo que se repetirá según el número de bloques
                            for($i=0; $i < $total; $i++){
                        ?>  
                        <div class="row" id="filaSeccion<?php echo $numSeccion; ?>">
                                    <div class="col-sm-12" id="columnaSeccion<?php echo $numSeccion; ?>">

                                        <!--Colapse sección 1-->
                                        <?php
                                            if($numSeccion==1){                                            
                                        ?>
                                                <div class="panel-group" id="accordion">
                                        <?php
                                            }else{
                                        ?>
                                                <div class="panel-group" id="accordion<?php echo $numSeccion; ?>">
                                        <?php
                                            }
                                        ?>


                                        
                                            <div class="panel panel-default" id="panelDefaul<?php echo $numSeccion; ?>">
                                                <div class="panel-heading" id="panelHeading<?php echo $numSeccion; ?>"> 
                                                    <h2 class="panel-title" id="panelTitle<?php echo $numSeccion; ?>">
                                                        
                                        
                                                <a data-toggle="collapse" data-parent="#accordion<?php echo $numSeccion; ?>" href="#collapse<?php echo $numSeccion; ?>" id="numSeccion<?php echo $numSeccion; ?>">
                                                            Sección #<?php echo $numSeccion; ?></a>
                                                    </h2>
                                                </div>
                                                <div id="collapse<?php echo $numSeccion; ?>" class="panel-collapse collapse in">

                                                
                                                    <div class="panel-body" id="panelBody<?php echo $numSeccion; ?>">
                                                        <div class="row" id="filaInstruciones<?php echo $numSeccion; ?>">
                                                            <div class="col-md-12" id="columnaInstrucciones<?php echo $numSeccion; ?>">
                                                                <label for="instruccionesSeccion<?php echo $numSeccion; ?>" id="instruccionesSeccion<?php echo $numSeccion; ?>">Escribe las instrucciones de la sección:</label>
                                                                <input readonly="readonly" value="<?php echo $arrayBloque[$i]['instruccion']; ?>" type="text" id="instrucciones<?php echo $numSeccion; ?>" name="instrucciones<?php echo $numSeccion; ?>" class="form-control">
                                                            </div>
                                                        </div>
                            <?php
                                //Iniciamos un ciclo que se repetirá según el número de preguntas
                                for($j=$variable; $j < $total2; $j++){
                                            //Con este if verificamos que si determinada pregunta pertenece al bloque, para imprimirlo dentro de el
                                    if($arrayBloque[$i]['idBloquePregunta'] == $arrayPregunta[$j]['idBloquePregunta']){  
                            ?>
                                                        <div class="panel-group" id="accordion<?php echo $numSeccion.$numPregunta; ?>">
                                                            <div class="panel panel-default" id="panelDefault<?php echo $numSeccion.$numPregunta; ?>">
                                                                <div class="panel-heading" id="panelHeading<?php echo $numSeccion.$numPregunta; ?>">
                                                                    <h4 class="panel-title" id="panelTitle<?php echo $numSeccion.$numPregunta; ?>">
                                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $numSeccion.$numPregunta; ?>" id="acordion<?php echo $numSeccion.$numPregunta; ?>">
                                                                            Pregunta <?php echo $numPregunta; ?></a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse<?php echo $numSeccion.$numPregunta; ?>" class="panel-collapse collapse in">
                                                                    <div class="panel-body" id="panelBody<?php echo $numSeccion.$numPregunta; ?>">

                                                                        <div class="row" id="filaPregunta<?php echo $numSeccion; ?>">
                                                                            <div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta<?php echo $numSeccion; ?>'>
                                                                                <label for="id_instrucciones" id="id_instrucciones">Escribe la pregunta:</label>
                                                                                <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['pregunta']; ?>" type="text" class="form-control" id="pregunta<?php echo $numSeccion.$numPregunta; ?>" name="pregunta<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <span></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id='filaRespuestas<?php echo $numSeccion; ?>'>
                                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaRespuestas<?php echo $numSeccion; ?>">
                                                                                <label for="puntajePregunta<?php echo $numSeccion; ?>" id="puntajePregunta<?php echo $numSeccion; ?>">Puntaje:</label>
                                                                                <select disabled class="form-control" id="puntaje<?php echo $numSeccion.$numPregunta; ?>" name="puntaje<?php echo $numSeccion.$numPregunta; ?>" onchange="valor(this.options[this.selectedIndex].innerHTML);">
                                                                                    <?php
                                                                                        switch ($arrayPregunta[$j]['puntaje']) {
                                                                                            case '1':
                                                                                                echo "<option id='opcion1' value='1' selected>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '2':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2' selected>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '3':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3' selected>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '4':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4' selected>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '5':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5' selected>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '6':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6' selected>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '7':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7' selected>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '8':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8' selected>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '9':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9' selected>9</option>";
                                                                                                echo "<option id='opcion10' value='10'>10</option>";
                                                                                                break;
                                                                                            case '10':
                                                                                                echo "<option id='opcion1' value='1'>1</option>";
                                                                                                echo "<option id='opcion2' value='2'>2</option>";
                                                                                                echo "<option id='opcion3' value='3'>3</option>";
                                                                                                echo "<option id='opcion4' value='4'>4</option>";
                                                                                                echo "<option id='opcion5' value='5'>5</option>";
                                                                                                echo "<option id='opcion6' value='6'>6</option>";
                                                                                                echo "<option id='opcion7' value='7'>7</option>";
                                                                                                echo "<option id='opcion8' value='8'>8</option>";
                                                                                                echo "<option id='opcion9' value='9'>9</option>";
                                                                                                echo "<option id='opcion10' value='10' selected>10</option>";
                                                                                                break;
                                                                                            default:
                                                                                                break;
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top:45px;" id="columnaLabPuntaje<?php echo $numSeccion; ?>">
                                                                                <label id="lblPuntaje<?php echo $numSeccion; ?>">Puntaje de la respuesta correcta.</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id="filaConSelect<?php echo $numSeccion.$numPregunta; ?>">
                                                                            <div class="col-md-8" id="colConSelect<?php echo $numSeccion.$numPregunta; ?>">    
                                                                                <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['puntaje']; ?>" type="hidden" class="form-control" id="conSelect<?php echo $numSeccion.$numPregunta; ?>" name="conSelect<?php echo $numSeccion.$numPregunta; ?>">
                                                                            </div>
                                                                        </div>
                                    <?php
                                                        //Iniciamos un ciclo que se repetirá 10 veces(sólo hay 10 posibles respuestas)
                                                        //eso no implica que tenga 10 respuestas
                                            $numOpcion = 1;
                                            for($k = 1; $k<11; $k++){
                                            
                                                            //Se verifica si la respuesta existe y si no, no la imprimimos
                                                if(isset($arrayPregunta[$j]['respuesta'.$k])){

                                                    //Verificamos que no sean las dos preguntas por defecto
                                                    if($numOpcion < 3){
                                    ?>
                                    
                                    <?php
                                        if($arrayPregunta[$j]['respuesta'.$k]==$arrayPregunta[$j]['respuestaCorrecta']){
                                    ?>  
                                                                        <div class="row" id="opcion<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion<?php echo $numOpcion; ?>">
                                                                                <label for="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" id="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" >Opción <?php echo $numOpcion; ?>:</label>

                                                                                <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['respuesta'.$k]; ?>" type="text" class="form-control" id="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">

                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <div class="radio" id="conRadio<?php echo $numSeccion.$numPregunta; ?>">
                                        <?php
                                            if($numSeccion==1){                                            
                                        ?>
                                                <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>" checked="checked">
                                        <?php
                                            }else{
                                        ?>
                                                <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>" checked="checked">
                                        <?php
                                            }
                                        ?>
                                                                                    
                                                                                    <label id="labelOp<?php echo $numSeccion.$numPregunta; ?>" style="margin-top: 2px; margin-left: -18px;">Respuesta correcta</label>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                    <?php
                                        }else{
                                    ?>
                                                                        <div class="row" id="opcion<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion<?php echo $numOpcion; ?>">
                                                                                <label for="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" id="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" >Opción <?php echo $numOpcion; ?>:</label>

                                                                                <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['respuesta'.$k]; ?>" type="text" class="form-control" id="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">

                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <div class="radio" id="conRadio<?php echo $numSeccion.$numPregunta; ?>">
                                        <?php
                                            if($numSeccion==1){                                            
                                        ?>
                                                <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>">
                                        <?php
                                            }else{
                                        ?>
                                                <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>">
                                        <?php
                                            }
                                        ?>
                                                                                    <label id="labelOp<?php echo $numSeccion.$numPregunta; ?>" style="margin-top: 2px; margin-left: -18px;">Respuesta correcta</label>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                    <?php
                                        }
                                        }else{
                                    ?>

                                    <?php
                                        if($arrayPregunta[$j]['respuesta'.$k]==$arrayPregunta[$j]['respuestaCorrecta']){
                                    ?>  
                                                                        <div class="row" id="opcion<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion<?php echo $numOpcion; ?>">
                                                                                <label for="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" id="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" >Opción <?php echo $numOpcion; ?>:</label>
                                                                                <div class="input-group">
                                                                                    <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['respuesta'.$k]; ?>" class="form-control" id="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" type="text">
                                                                                    <span class="input-group-btn"><button disabled="" onclick="eliminarOpcion(this.id);" id="btn<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" type="button" class="btn btn-danger">
                                                                                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <div class="radio" id="conRadio<?php echo $numSeccion.$numPregunta; ?>">
                                                                                    <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>" checked="checked">
                                                                                    <label id="labelOp<?php echo $numSeccion.$numPregunta; ?>" style="margin-top: 2px; margin-left: -18px;">Respuesta correcta</label>
                                                                                </div>
                                                                            </div> 
                                                                        </div>

                                    <?php
                                        }else{
                                    ?>
                                                                        <div class="row" id="opcion<?php echo $numSeccion.$numPregunta.$numOpcion; ?>">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion<?php echo $numOpcion; ?>">
                                                                                <label for="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" id="label<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" >Opción <?php echo $numOpcion; ?>:</label>

                                                                                <div class="input-group">
                                                                                    <input readonly="readonly" value="<?php echo $arrayPregunta[$j]['respuesta'.$k]; ?>" class="form-control" id="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="op<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" type="text">
                                                                                    <span class="input-group-btn"><button disabled="" onclick="eliminarOpcion(this.id);" id="btn<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" type="button" class="btn btn-danger">
                                                                                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <div class="radio" id="conRadio<?php echo $numSeccion.$numPregunta; ?>">
                                                                                    <input type="radio" value="<?php echo $numOpcion; ?>" id="radioOp<?php echo $numSeccion.$numPregunta.$numOpcion; ?>" name="radioOp<?php echo $numSeccion.$numPregunta; ?>">
                                                                                    <label id="labelOp<?php echo $numSeccion.$numPregunta; ?>" style="margin-top: 2px; margin-left: -18px;">Respuesta correcta</label>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                    <?php
                                        }
                                        }
                                            $numOpcion++;
                                            }

                                        }
                                    ?>
                                
                                                                        <div class="row" id="filaConOpcion<?php echo $numSeccion.$numPregunta; ?>">
                                                                            <div class="col-md-8" id="colConOpcion<?php echo $numSeccion.$numPregunta; ?>">    
                                                                                <input value="<?php echo $numOpcion-1;?>" type="hidden" class="form-control" id="conOpcion<?php echo $numSeccion.$numPregunta; ?>" name="conOpcion<?php echo $numSeccion.$numPregunta; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id="filaBtnAgregar<?php echo $numSeccion.$numPregunta; ?>">

                                        <?php
                                            if($numSeccion==1){                                            
                                        ?>
                                                <div class="col-md-4 col-xs-4 col-xs-push-1" id="agregar1">
                                        <?php
                                            }else{
                                        ?>
                                                <div style="margin-top: 40px;margin-left: -10px;" class="col-md-4 col-xs-4 col-xs-push-1" id="filaBtnAgregar<?php echo $numSeccion; ?>">
                                        <?php
                                            }
                                        ?>
                                                                        
                                                                            
                                                                                <button disabled type="button" class="btn btn-success btn-sm" id="btnAgregar<?php echo $numSeccion.$numPregunta; ?>" onclick="crear(this.id);"><span class="glyphicon glyphicon-plus" id="iconoOp<?php echo $numSeccion.$numPregunta; ?>"></span>Agregar opción</button>
                                                                            </div>
                                                                            <div style="margin-top: 40px;margin-left: -10px;" class="col-md-4 col-xs-4 col-md-offset-0 col-xs-push-1" id="finPregunta<?php echo $numSeccion.$numPregunta; ?>">
                                                                                <button disabled id="btnFinalizar<?php echo $numSeccion.$numPregunta; ?>" type="button" class="btn btn-primary btn-sm" onclick="finalizarPregunta(this.id);">Finalizar pregunta</button>
                                                                            </div>
                                                                            <div style="margin-top: 40px;margin-left: -10px;" class="col-md-4 col-xs-4 col-md-offset-2 col-xs-push-1" id="modificarPregunta11" style="margin-top: 40px;margin-left: -10px;">
                                                                                <button disabled style="visibility: visible;" disabled id="btnModificar<?php echo $numSeccion.$numPregunta; ?>" type="button" class="btn btn-primary btn-sm" onclick="modificarPregunta(this.id);">Modificar Pregunta</button>
                                                                            </div>
                                                                        </div>                                   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                            <?php
                                    $numPregunta++;
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
                                //echo "TOTAL DE PREGUNTAS del bloque: $numPregunta";
                            ?>
                                                            <div class="row" id="antes<?php echo $numSeccion; ?>">
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizar<?php echo $numSeccion; ?>">
                                                                <button disabled type="button" id="btnAgPregunta<?php echo $numSeccion; ?>" class="btn btn-success btn-sm" onclick="agrePregunta(false,this.id);" disabled><span class="glyphicon glyphicon-plus"></span>Agregar Pregunta</button>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizarSec<?php echo $numSeccion; ?>">
                                                                <button disabled type="button" id="btnFinSec<?php echo $numSeccion; ?>" class="btn btn-primary btn-sm" onclick="finSeccion(this.id);" disabled>Finalizar sección</button>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnModSec<?php echo $numSeccion; ?>">
                                                                <button style="visibility: visible;" type="button" id="btnModSec<?php echo $numSeccion; ?>" class="btn btn-primary btn-sm" onclick="modificarCuestionario(this.id);">Modificar sección</button>
                                                            </div>
                                                            <div class="row" id="filaConPregunta<?php echo $numSeccion; ?>">
                                                                <div class="col-md-8" id="colConPregunta<?php echo $numSeccion; ?>">    
                                                                    <input value="<?php echo $numPregunta-1; ?>" type="hidden" class="form-control" id="conPregunta<?php echo $numSeccion; ?>" name="conPregunta<?php echo $numSeccion; ?>">
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                
                        <?php
                                $numPregunta = 1;
                                $numSeccion++;
                            }
                        ?>  
                                <div class="row" id="btnFinales">
                                    <div class="col-md-4">
                                        <input class="submit btn btn-success" type="button" id="btnAgSeccion" value="Agregar sección" onclick="agregarSeccion(false);" disabled>
                                        <input type="hidden" name="submitted" value="TRUE">
                                        <input value="<?php echo $idCuestionario; ?>" type="hidden" name="id_cuestionario">
                                        <input class="submit btn btn-primary" type="submit" id="btnFinCuestionario" name="btnFinCuestionario" value="Finalizar cuestionario">
                                        <input type="hidden" name="submitted" value="TRUE">
                                    </div>
                                    <div class="row" id="filaConSeccion1">
                                        <div class="col-md-8" id="colConSeccion1">    
                                            <input value="<?php echo $total; ?>" type="hidden" class="form-control" id="conSeccion1" name="conSeccion1">
                                        </div>
                                    </div> 
                                </div>  
                                <!-- </div>-->
                                <?php 
                                if(isset($_REQUEST['btnFinCuestionario'])){
                                    $nombreCuestionario = $_POST['titulo'];
                                    $idCuestionario = $_POST['id_cuestionario'];
                                    cuestionariosEditar_models::recuperarDatos($nombreCuestionario,$idCuestionario);
                                    echo "<script> location.href='cuestionarioEditarAsignar.php'; </script>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--</div>-->
        <!-- end: content -->
        <script src="js/elementosEditar.js"></script>
        <?php include("design/footer.php");?>
    </body>
</html>


<!--Input Opciones > id=conOpcion11 name=conOpcion11
Input preguntas > id=conPregunta1 name=conPregunta1
Input secciones > id=conSeccion1 name=conSeccion1-->





