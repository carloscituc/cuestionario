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
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 padding-0">
                                                <input type="text" class="form-control" placeholder="Escribe el nombre del título">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-md-12 col-md-offset-0 well">

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="submit btn btn-primary" type="submit" value="Crear cuestionario">
                                        <input type="hidden" name="submitted" value="TRUE">
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