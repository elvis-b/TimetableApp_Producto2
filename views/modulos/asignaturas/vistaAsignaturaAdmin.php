<?php //$url = Ruta::ctrRuta(); ?>

<!-- Begin page content -->
<div class="container">

    <div class="container">

        <h1 align="center"><u>Asignaturas dados de alta </u></h1>

        <form action="vistaAltaAsignatura">
            <button type="submit" class="btn btn-primary">Alta asignatura</button>
            <br><br>
        </form>

        <div class="row form-group product-chooser">

            <br>
            <?php

            echo 'PHP version: ' . phpversion();

            $classes = ControladorClases::getAllClasses();

            echo "<table class=\"table table-striped\">";
            echo "<thead>";
            echo " <tr>";
            echo "<th scope=\"col\">Id ASignatura</th>";
            echo "<th scope=\"col\">Nombre</th>";
            echo "<th scope=\"col\">Profesor</th>";
            echo "<th scope=\"col\">Course</th>";
            echo "<th scope=\"col\">Inicio</th>";
            echo "<th scope=\"col\">Fin</th>";
            echo "<th scope=\"col\">Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($classes as $key => $value) {

                echo "<tr>";
                echo "<td>" . $value['id_class'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . ControladorUsuarios::getTeacherById($value['id_teacher']) . "</td>";
                echo "<td>" . ControladorCursos::getCourseInfo($value['id_course'])["name"] . "</td>";
                echo "<td>" . $value['date_start'] . "</td>";
                echo "<td>" . $value['date_end'] . "</td>";

                echo '<td id="divCursos" style="display: flex">
                                   <button 
                                   class="btn btn-warning btnEditarCurso" 
                                   style="margin-right: 5px" 
                                   onclick="retrieveClass(' . $value["id_class"] . ')"
                                   data-toggle="modal" 
                                   data-target="#modalEditarCurso">
                                   <i class="fa fa-file la-3x"></i>
                                   </button>
                                   <form id="class' . $value["id_class"] . '" method="POST"> 
                                        <button 
                                        class="btn btn-danger btnEliminarCurso" 
                                        onclick="askIfSure(\'class\',' . $value["id_class"] . ',\'classId\')" 
                                        type="button">
                                            <i class="fa fa-times la-3x"></i>
                                        </button>';
                ?>
                <?php
                ControladorPlantilla::postAndReturn(
                    'ControladorClases',
                    'deleteClass',
                    'vistaAsignaturaAdmin',
                    'Asignatura',
                    'classId',
                    "The class was deleted!");
                ?>
                <?php
                echo '</form>   
                          </td>';
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            if (sizeof($classes) == 0) {
                echo "<h2 style=\"color:red;\"> No hay asignaturas dados de alta </h2>";
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
                        <ul class="hidden-users">
                            <?php
                            $students = ControladorUsuarios::getAllStudents();
                            foreach ($students as $key => $value) {
                                echo '<li id="' . $value["id"] . '" name="' . $value["name"] . '"></li>';
                            }
                            ?>
                        </ul>
                        <!--=====================================
                        ENTRADA PARA EL TÍTULO
                        ======================================-->
                        <form method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Nombre</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="modalName"
                                           placeholder="Ingresar Nombre Curso" id="classNombre">
                                </div>
                            </div>
                            <input type="hidden" class="idCurso" id="idClassModal" name="idClassModal">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Profesor</span>
                                    <select name="idTeacher" class="form-control" id="idTeacher">
                                        <?php
                                        $teachers = ControladorUsuarios::getAllTeachers();
                                        foreach ($teachers as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Course</span>
                                    <select name="idCourse" class="form-control" id="idCourse">
                                        <?php
                                        $cursos = ControladorCursos::getAllCourses();
                                        foreach ($cursos as $key => $value) {
                                            echo '<option value="' . $value["id_course"] . '">' . $value["name"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product"></i>Inicio</span>

                                    <input type="time" class="form-control input-lg inicioEditar"
                                           name="inicioModal"
                                           placeholder="Ingresar título producto" id="dateStart">

                                </div>

                            </div>
                            <div class="form-group">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product"></i>Final</span>

                                    <input type="time" class="form-control input-lg finalEditar"
                                           name="finalModal"
                                           placeholder="Ingresar título producto" id="dateEnd">

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Color</label>
                                <div id="cp2" class="input-group colorpicker-component">
                                    <input type="text" class="form-control" name="color" id="color"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <input hidden name="commaSeparatedIds" id="commaSeparatedIds" value="empty">
                            <div class="form-group">
                                <label for="description" class="form-label ">Students</label>
                                <div id="cp2" class="input-group">
                                    <select name="studentSelection" class="form-control" id="studentSelection"></select>
                                    <span class="input-group-addon">
                        <a onclick="addStudentToSelectedList()" class="addon-button">Adauga</a>
                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="selected-students-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody id="selectedStudents">
                                    <tr>
                                        <td colspan="100%" id="noUsersYet">No Users Added</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            ControladorPlantilla::postAndReturn(
                                'ControladorClases',
                                'updateClass',
                                'vistaAsignaturaAdmin',
                                'Asignatura',
                                'idClassModal',
                                "The course was updated!");
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

<script>
    $(document).ready(function () {
        buildInitialStudentList();
        setSelectionData();
    })
</script>