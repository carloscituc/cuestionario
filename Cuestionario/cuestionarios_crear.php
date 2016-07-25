<!--Vista crear cuestionario-->
<!DOCTYPE html>
<html lang="es">
    <?php include("design/head.php"); ?>
    <body>
        <?php include("design/header.php"); ?>
        <!-- start: Content -->
        <div id="content">
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
                                                <input type="text" class="form-control" placeholder="Escribe el título del cuestionario">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="seccion1">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-md-12 col-md-offset-0 well" id="bloque">
                                                    <h3>Sección #1</h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="id_instrucciones">Escribe las instrucciones del bloque:</label>
                                                            <input type="text" id="instrucciones" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row" id="pregunta1">
                                                        <div class="col-md-12" id="instrucciones1">
                                                            <div class="row" id="filaPregunta1">
                                                                <div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
                                                                    <label for="id_instrucciones" id="id_instrucciones">Escribe la pregunta:</label>
                                                                    <input type="text" class="form-control" id="pregunta11" name="pregunta11">
                                                                </div>
                                                            </div>
                                                            <div class="row" id='filaRespuestas1'>
                                                                <div class="col-md-1" style="margin-top:15px;" id="columnaRespuestas1">
                                                                    <label for="id_puntaje" id="puntajePregunta1">Puntaje:</label>
                                                                    <select class="form-control" id="puntaje11">
                                                                        <option id="opcion1">1</option>
                                                                        <option id="opcion2">2</option>
                                                                        <option id="opcion3">3</option>
                                                                        <option id="opcion4">4</option>
                                                                        <option id="opcion5">5</option>
                                                                        <option id="opcion6">6</option>
                                                                        <option id="opcion7">7</option>
                                                                        <option id="opcion8">8</option>
                                                                        <option id="opcion9">9</option>
                                                                        <option id="opcion10">10</option>
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
                                                                    <label for="opcion112" id="label112" name="opcion2">Opción 2:</label>
                                                                    <!--<div class="input-group">-->
                                                                        <input type="text" class="form-control" id="op112" name="op112">
                                                                       <!-- <span class="input-group-btn">
                                                                            <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                        </span>-->
                                                                    <!--</div>-->
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row" id="filaBtnAgregar1">
                                                                <div class="col-md-4 col-xs-4 col-xs-push-1" id="mas">
                                                                    <button type="button" class="btn btn-success btn-sm" onclick="crear(this)" id="agregar"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
                                                                </div>
                                                                <div class="col-md-4 col-xs-4 col-md-offset-0 col-xs-push-1" id="finPregunta" style="margin-left:-10px">
                                                                    <button id="finalizar" type="button" class="btn btn-primary btn-sm" onclick="finalizarPregunta()">Finalizar pregunta</button>
                                                                </div>
                                                                <div class="col-md-4 col-xs-4 col-md-offset-2 col-xs-push-1" id="finPregunta" style="margin-left:-10px">
                                                                    <button id="modificar" type="button" class="btn btn-primary btn-sm" onclick="modificarPregunta();">Modificar</button>
                                                                </div>
                                                            </div>                                   
                                                        </div>
                                                    </div>
                                                    <div class="row" id="antes">
                                                    <div class="col-md-4" style="margin-top:15px;">
                                                    <button type="button" id="agregarPregunta" class="btn btn-success btn-sm" onclick="agrePregunta(false);" ><span class="glyphicon glyphicon-plus"></span>Agregar Pregunta</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input class="submit btn btn-success" type="submit" value="Agregar sección">
                                                <input type="hidden" name="submitted" value="TRUE">

                                                <input class="submit btn btn-primary" type="submit" value="Finalizar cuestionario" onclick="finalizarCuestionario()">
                                                <input type="hidden" name="submitted" value="TRUE">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: content -->
        <?php include("design/footer.php");?>
    </body>
</html>








