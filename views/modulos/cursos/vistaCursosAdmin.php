<?php //$url = Ruta::ctrRuta(); ?>

<!-- Begin page content -->
<div class="container">

    <div class="container">

        <h1 align="center"><u>Curso dados de alta </u></h1>

        <form action="vistaAltaCurso">
            <button type="submit" class="btn btn-primary">Alta curso</button>
            <br><br>
        </form>

        <div class="row form-group product-chooser">

            <br>
            <?php

            echo 'PHP version: ' . phpversion();

            $cursos = ControladorCursos::getAllCourses();

            echo "<table class=\"table table-striped\">";
            echo "<thead>";
            echo " <tr>";
            echo "<th scope=\"col\">Id Cursos</th>";
            echo "<th scope=\"col\">Nombre</th>";
            echo "<th scope=\"col\">Descripcion</th>";
            echo "<th scope=\"col\">Inicio</th>";
            echo "<th scope=\"col\">Fin</th>";
            echo "<th scope=\"col\">Activo</th>";
            echo "<th scope=\"col\">Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($cursos as $key => $value) {

                echo "<tr>";
                echo "<td>" . $value['id_course'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['description'] . "</td>";
                echo "<td>" . $value['date_start'] . "</td>";
                echo "<td>" . $value['date_end'] . "</td>";

                if ($value['active'] == 1) {
                    echo "<td>Si</td>";
                } else {
                    echo "<td>No</td>";
                };
                echo '<td id="divCursos" style="display: flex">
                                   <button 
                                   class="btn btn-warning btnEditarCurso" 
                                   style="margin-right: 5px" 
                                   onclick="retrieveCourse(' . $value["id_course"] . ')"
                                   data-toggle="modal" 
                                   data-target="#modalEditarCurso">
                                   <i class="fa fa-file la-3x"></i>
                                   </button>
                                   <form id="course' . $value["id_course"] . '" method="POST"> 
                                        <button 
                                        class="btn btn-danger btnEliminarCurso" 
                                        onclick="askIfSure(\'course\',' . $value["id_course"] . ',\'courseId\')" 
                                        type="button">
                                            <i class="fa fa-times la-3x"></i>
                                        </button>';
                ?>
                <?php
                $eliminarCurso = new ControladorCursos();
                if (isset($_POST['courseId'])) {
                    $requestStatus = $eliminarCurso->deleteCourse();
                    switch ($requestStatus) {
                        case "DONE":
                            echo '<script>alertOkAndNavigateTo("vistaCursosAdmin","The course was deleted!");</script>';
                            break;
                    }
                }
                ?>
                <?php
                echo '</form>   
                          </td>';
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            if (sizeof($cursos) == 0) {
                echo "<h2 style=\"color:red;\"> No hay cursos dados de alta </h2>";
            }
            ?>


        </div>


    </div>


    <!--=====================================
    MODAL EDITAR CURSO
    ======================================-->

    <div id="modalEditarCurso" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                <!--=====================================
               CABEZA DEL MODAL
               ======================================-->
                <div class="modal-header" style="background:#C6C0BF; color:white; text-align: center;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center><h4 class="modal-title">Editar Cursos</h4></center>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!--=====================================
                        ENTRADA PARA EL TÍTULO
                        ======================================-->
                        <form method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Nombre</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="modalName"
                                           placeholder="Ingresar Nombre Curso" id="nombre">
                                </div>
                            </div>
                            <input type="hidden" class="idCurso" id="idCursoModal" name="idCursoModal">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <span class="input-group-addon">Descripcion</span>
                                    <textarea id="descripcion" name="descripcionModal"
                                              class="md-textarea form-control descripcionEditar"
                                              placeholder="Ingrese Descripción del curso"
                                              rows="3"></textarea>
                                    <label for="form10"></label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product"></i>Inicio</span>

                                    <input type="datetime-local" class="form-control input-lg inicioEditar"
                                           name="inicioModal"
                                           placeholder="Ingresar título producto" id="dateStart">

                                </div>

                            </div>
                            <div class="form-group">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product"></i>Final</span>

                                    <input type="datetime-local" class="form-control input-lg finalEditar"
                                           name="finalModal"
                                           placeholder="Ingresar título producto" id="dateEnd">

                                </div>

                            </div>

                            <?php
                            $editCourse = new ControladorCursos();
                            if (isset($_POST['idCursoModal'])) {
                                if (!empty($_POST['idCursoModal'])) {
                                    $requestStatus = $editCourse->updateCourse($_POST['idCursoModal']);
                                    switch ($requestStatus) {
                                        case "DONE":
                                            echo '<script>alertOkAndNavigateTo("vistaCursosAdmin","The course was updated!");</script>';
                                            break;
                                    }
                                } else {
                                    $editCourse->showErrorMessage();
                                }
                            }
                            ?>
                    </div>


                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-primary EditarCurso">Save</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

