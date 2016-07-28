<!--Vista crear cuestionario-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php 
        include("design/header.php");
        include("php/cuestionariosCrear.php");
        cuestionariosCrear::cuestionarioCrear();
        ?>
        <!-- start: Content -->
        <!--<div id="content" class="container-fluid">-->
            <div class="form-element">
                <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                        <div class="panel form-element-padding">
                            <div class="panel-heading">
                                <h4>Crear nuevo cuestionario</h4>
                            </div>
                            <div class="panel-body" style="padding-bottom:30px;">
                                <form id="form1" method="post" action="#">
                                    <div class="form-group">
                                        <div class="col-sm-12" id="titulo">
                                            <div class="col-sm-12 padding-0">
                                                <input id="titulo" type="text" class="form-control" placeholder="Escribe el título del cuestionario">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="seccion1">
                                        <div class="row" id="filaSeccion1">
                                            <div class="col-sm-12" id="columnaSeccion1">
                                                <div class="col-md-12 col-md-offset-0 well" id="bloque1">
                                                    <h3 id="numSeccion1">Sección #1</h3>
                                                    <div class="row" id="filaInstruciones1">
                                                        <div class="col-md-12" id="columnaInstrucciones1">
                                                            <label for="instruccionesSeccion1" id="instruccionesSeccion1">Escribe las instrucciones de la sección:</label>
                                                            <input type="text" id="instrucciones1" name="instrucciones1" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row" id="Pregunta11">
                                                        <div class="col-md-12" id="divInstrucciones1">
                                                            <div class="row" id="filaPregunta1">
                                                                <div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
                                                                    <label for="id_instrucciones" id="id_instrucciones">Escribe la pregunta:</label>
                                                                    <input type="text" class="form-control" id="pregunta11" name="pregunta11">
                                                                </div>
                                                            </div>
                                                            <div class="row" id='filaRespuestas1'>
                                                                <div class="col-md-1" style="margin-top:15px;" id="columnaRespuestas1">
                                                                    <label for="puntajePregunta1" id="puntajePregunta1">Puntaje:</label>
                                                                    <select class="form-control" id="puntaje11" name="puntaje11">
                                                                        <option id="opcion1" value="1">1</option>
                                                                        <option id="opcion2" value="2">2</option>
                                                                        <option id="opcion3" value="3">3</option>
                                                                        <option id="opcion4" value="4">4</option>
                                                                        <option id="opcion5" value="5">5</option>
                                                                        <option id="opcion6" value="6">6</option>
                                                                        <option id="opcion7" value="7">7</option>
                                                                        <option id="opcion8" value="8">8</option>
                                                                        <option id="opcion9" value="9">9</option>
                                                                        <option id="opcion10" value="10">10</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="opcion111">
                                                                <div class="col-md-8" style="margin-top:15px;" id="filaOpcion1">
                                                                    <label for="label111" id="label111" >Opción 1:</label>
                                                                    <!--<div class="input-group">-->
                                                                    <input type="text" class="form-control" id="op111" name="op111">
                                                                    <!--<span class="input-group-btn">
<button class="btn btn-danger" type="button" id="btn1" onClick="eliminarPregunta(this.id);"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
</span>-->
                                                                    <!--</div>-->
                                                                </div>
                                                            </div>
                                                            <div class="row" id="opcion112">
                                                                <div class="col-md-8" style="margin-top:15px;" id="filaOpcion2">
                                                                    <label for="label112" id="label112">Opción 2:</label>
                                                                    <!--<div class="input-group">-->
                                                                    <input type="text" class="form-control" id="op112" name="op112">
                                                                    <!-- <span class="input-group-btn">
<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
</span>-->
                                                                    <!--</div>-->
                                                                </div>
                                                            </div>

                                                            <div class="row" id="filaBtnAgregar11">
                                                                <div class="col-md-4 col-xs-4 col-xs-push-1" id="agregar1">
                                                                    <button type="button" class="btn btn-success btn-sm" id="btnAgregar11" onclick="crear(this.id);"><span class="glyphicon glyphicon-plus" id="iconoOp11"></span>Agregar opción</button>
                                                                </div>
                                                                <div class="col-md-4 col-xs-4 col-md-offset-0 col-xs-push-1" id="finPregunta11">
                                                                    <button id="btnFinalizar11" type="button" class="btn btn-primary btn-sm" onclick="finalizarPregunta(this.id);">Finalizar pregunta</button>
                                                                </div>
                                                                <div class="col-md-4 col-xs-4 col-md-offset-2 col-xs-push-1" id="modificarPregunta11" style="margin-top: 40px;margin-left: -10px;">
                                                                    <button id="btnModificar11" type="button" class="btn btn-primary btn-sm" onclick="modificarPregunta(this.id);">Modificar Pregunta</button>
                                                                </div>
                                                            </div>                                   
                                                        </div>
                                                    </div>
                                                    <div class="row" id="antes1">
                                                        <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizar1">
                                                            <button type="button" id="btnAgPregunta1" class="btn btn-success btn-sm" onclick="agrePregunta(false,this.id);" disabled><span class="glyphicon glyphicon-plus"></span>Agregar Pregunta</button>
                                                        </div>
                                                        <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizarSec1">
                                                            <button type="button" id="btnFinSec1" class="btn btn-primary btn-sm" onclick="finSeccion(this.id);" >Finalizar sección</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row" id="btnFinales">
                                            <div class="col-md-4">
                                                <input class="submit btn btn-success" type="button" id="btnAgSeccion" value="Agregar sección" onclick="agregarSeccion(false);" disabled>
                                                <input type="hidden" name="submitted" value="TRUE">

                                                <input class="submit btn btn-primary" type="submit" id="btnFinCuestionario" value="Finalizar cuestionario" onclick="finalizarCuestionario();">
                                                <input type="hidden" name="submitted" value="TRUE">
                                            </div>
                                        </div>
                                   <!-- </div>-->
                                   <?php 
                                        if(isset($_REQUEST['enviar'])){
                                            $nombreCuestionario = $_POST['titulo'];

                                            cuestionariosCrear_models::recuperarDatos($nombreCuestionario);
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

        <?php include("design/footer.php");?>
    </body>
</html>








