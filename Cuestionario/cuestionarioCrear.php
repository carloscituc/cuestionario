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
                                <form method="post" action="#">

                                    <div class="form-group">
                                        <div class="col-sm-12" id="titulo">
                                            <div class="col-sm-12 padding-0">
                                                <input type="text" class="form-control" placeholder="Escribe el título del cuestionario">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="col-md-12 col-md-offset-0 well" id="bloque">
                                                    <h3>Sección #1</h3>
                                                    <div class="col-md-12">
                                                        <label for="id_instrucciones">Escribe las instrucciones del bloque:</label>
                                                        <input type="text" id="instrucciones" class="form-control" placeholder="">
                                                        <div class="col-md-12" id="pregunta">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-top: 15px;">
                                                                    <label for="id_instrucciones">Escribe la pregunta:</label>
                                                                    <input type="text" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1" style="margin-top:15px;">
                                                                    <label for="id_puntaje">Puntaje:</label>
                                                                    <select class="form-control" id="puntaje">
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8" style="margin-top:15px;">
                                                                    <label for="id_opcion1">Opción 1:</label>
                                                                    <input type="text" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8" style="margin-top:15px; margin-bottom:15px;">
                                                                    <label for="id_opcion2">Opción 2:</label>
                                                                    <input type="text" class="form-control" placeholder="">
                                                                </div>
                                                                <div class="col-md-2" id="mas">
                                                                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
                                                                </div>
                                                                <div class="col-md-2" id="finPregunta" style="margin-left:-10px">
                                                                    <button type="button" class="btn btn-primary">Finalizar pregunta</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input class="submit btn btn-success" type="submit" value="Agregar sección">
                                            <input type="hidden" name="submitted" value="TRUE">

                                            <input class="submit btn btn-primary" type="submit" value="Finalizar cuestionario">
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









