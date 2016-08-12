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
                            <form id="form1" method="post">
                                <div class="form-group">
                                    <div class="col-sm-12" id="Coltitulo">
                                        <div class="col-sm-12 padding-0">
                                            <input id="titulo" name="titulo" type="text" class="form-control" placeholder="Escribe el título del cuestionario">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="filaSeccion1">
                                    <div class="col-sm-12" id="columnaSeccion1">

                                        <!--Colapse sección 1-->
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default" id="panelDefaul1">
                                                <div class="panel-heading" id="panelHeading1"> 
                                                    <h2 class="panel-title" id="panelTitle1">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" id="numSeccion1">
                                                            Sección #1</a>
                                                    </h2>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body" id="panelBody1">
                                                        <div class="row" id="filaInstruciones1">
                                                            <div class="col-md-12" id="columnaInstrucciones1">
                                                                <label for="instruccionesSeccion1" id="instruccionesSeccion1">Escribe las instrucciones de la sección:</label>
                                                                <input type="text" id="instrucciones1" name="instrucciones1" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!--Colapse pregunta 1-->
                                                        <div class="panel-group" id="accordion11">
                                                            <div class="panel panel-default" id="panelDefault11">
                                                                <div class="panel-heading" id="panelHeading11">
                                                                    <h4 class="panel-title" id="panelTitle11">
                                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse11" id="acordion11">
                                                                            Pregunta 1</a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse11" class="panel-collapse collapse in">
                                                                    <div class="panel-body" id="panelBody11">

                                                                        <div class="row" id="filaPregunta1">
                                                                            <div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
                                                                                <label for="id_instrucciones" id="id_instrucciones">Escribe la pregunta:</label>
                                                                                <input type="text" class="form-control" id="pregunta11" name="pregunta11">
                                                                                <span></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id='filaRespuestas1'>
                                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaRespuestas1">
                                                                                <label for="puntajePregunta1" id="puntajePregunta1">Puntaje:</label>
                                                                                <select class="form-control" id="puntaje11" name="puntaje11" onchange="valor(this.options[this.selectedIndex].innerHTML);">
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
                                                                            <div class="col-md-10" style="margin-top:45px;" id="columnaLabPuntaje1">
                                                                                <label id="lblPuntaje1">Puntaje de la respuesta correcta.</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id="filaConSelect11">
                                                                            <div class="col-md-8" id="colConSelect11">    
                                                                                <input type="hidden" class="form-control" id="conSelect11" name="conSelect11" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id="opcion111">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion1">
                                                                                <label for="label111" id="label111" >Opción 1:</label>

                                                                                <input type="text" class="form-control" id="op111" name="op111">

                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp11">
                                                                                <div class="radio" id="conRadio11">
                                                                                    <input type="radio" value="1" id="radioOp11" name="radioOp11" checked="checked">
                                                                                    <label id="labelOp11" style="margin-top: 2px; margin-left: -18px;">Respuesta correcta</label>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row" id="opcion112">
                                                                            <div class="col-md-8" style="margin-top:15px;" id="filaOpcion2">
                                                                                <label for="label112" id="label112">Opción 2:</label>

                                                                                <input type="text" class="form-control" id="op112" name="op112">

                                                                            </div>
                                                                            <div class="col-md-4" style="margin-top: 33px;" id="colRadioOp11">
                                                                                <div class="radio" id="conRadio11">
                                                                                    <input type="radio" value="2" id="radioOp11" name="radioOp11">Respuesta correcta</label>
                                                                                <label id="labelOp11" style="margin-top: -5px">
                                                                                    </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row" id="filaConOpcion11">
                                                                            <div class="col-md-8" id="colConOpcion11">    
                                                                                <input type="hidden" class="form-control" id="conOpcion11" name="conOpcion11">
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
                                                            </div>
                                                        </div>

                                                        <div class="row" id="antes1">
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizar1">
                                                                <button type="button" id="btnAgPregunta1" class="btn btn-success btn-sm" onclick="agrePregunta(false,this.id);" disabled><span class="glyphicon glyphicon-plus"></span>Agregar Pregunta</button>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizarSec1">
                                                                <button type="button" id="btnFinSec1" class="btn btn-primary btn-sm" onclick="finSeccion(this.id);" disabled>Finalizar sección</button>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:15px;" id="columnaBtnModSec1">
                                                                <button type="button" id="btnModSec1" class="btn btn-primary btn-sm" onclick="modificarCuestionario(this.id);" disabled>Modificar sección</button>
                                                            </div>
                                                            <div class="row" id="filaConPregunta1">
                                                                <div class="col-md-8" id="colConPregunta1">    
                                                                    <input type="hidden" class="form-control" id="conPregunta1" name="conPregunta1">
                                                                </div>
                                                            </div>    
                                                        </div>     
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

                                        <input class="submit btn btn-primary" type="submit" id="btnFinCuestionario" name="btnFinCuestionario" value="Finalizar cuestionario" disabled>
                                        <input type="hidden" name="submitted" value="TRUE">
                                    </div>
                                    <div class="row" id="filaConSeccion1">
                                        <div class="col-md-8" id="colConSeccion1">    
                                            <input type="hidden" class="form-control" id="conSeccion1" name="conSeccion1">
                                        </div>
                                    </div> 
                                </div>
                                <!-- </div>-->
                                <?php 
                                if(isset($_REQUEST['btnFinCuestionario'])){
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


<!--Input Opciones > id=conOpcion11 name=conOpcion11
Input preguntas > id=conPregunta1 name=conPregunta1
Input secciones > id=conSeccion1 name=conSeccion1-->





