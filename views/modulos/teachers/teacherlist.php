<?php //$url = Ruta::ctrRuta(); ?>

<!-- Begin page content -->
<div class="container">

    <div class="container">

        <h1 align="center"><u>Teachers</u></h1>

        <form action="addoreditteacher">
            <button type="submit" class="btn btn-primary">Alta Teacher</button>
            <br><br>
        </form>

        <div class="row form-group product-chooser">

            <br>
            <?php

            echo 'PHP version: ' . phpversion();

            $usarios = ControladorUsuarios::getAllTeachers();

            echo "<table class=\"table table-striped\">";
            echo "<thead>";
            echo " <tr>";
            echo "<th scope=\"col\">Id</th>";
            echo "<th scope=\"col\">Username</th>";
            echo "<th scope=\"col\">Nombre</th>";
            echo "<th scope=\"col\">surname</th>";
            echo "<th scope=\"col\">telephone</th>";
            echo "<th scope=\"col\">email</th>";
            echo "<th scope=\"col\">Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($usarios as $key => $value) {

                echo "<tr>";
                echo "<td>" . $value['id'] . "</td>";
                echo "<td>" . $value['username'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['surname'] . "</td>";
                echo "<td>" . $value['telephone'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";

                echo '<td id="divCursos" style="display: flex">
                                   <button 
                                   class="btn btn-warning btnEditarCurso" 
                                   style="margin-right: 5px" 
                                   onclick="retrieveUser(' . $value["id"] . ',\'teacher\')"
                                   data-toggle="modal" 
                                   data-target="#modalEditarCurso">
                                   <i class="fa fa-file la-3x"></i>
                                   </button>
                                   <form id="teacher' . $value["id"] . '" method="POST"> 
                                        <button 
                                        class="btn btn-danger btnEliminarCurso" 
                                        onclick="askIfSure(\'teacher\',' . $value["id"] . ',\'teacherId\')" 
                                        type="button">
                                            <i class="fa fa-times la-3x"></i>
                                        </button>';
                ?>
                <?php
                ControladorPlantilla::postAndReturn(
                    'ControladorUsuarios',
                    'deleteTeacher',
                    'teacherlist',
                    'Teacher',
                    'teacherId',
                    "Teacher deleted!");
                ?>
                <?php
                echo '</form>   
                          </td>';
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            if (sizeof($usarios) == 0) {
                echo "<h2 style=\"color:red;\"> No hay usarios dados de alta </h2>";
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
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Username</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="username"
                                           placeholder="Ingresar Username" id="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Name</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="modalName"
                                           placeholder="Ingresar Name" id="modalName">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Surname</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="surname"
                                           placeholder="Ingresar Surname" id="surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Telephone</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="telephone"
                                           placeholder="Ingresar telephone" id="telephone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product"></i>Email</span>
                                    <input type="text" class="form-control input-lg validarCurso nombreEditar"
                                           name="email"
                                           placeholder="Ingresar email" id="email">
                                </div>
                            </div>
                            <input type="hidden" class="idCurso" id="idTeacherModal" name="idTeacherModal">
                            <?php
                            ControladorPlantilla::postAndReturn(
                                'ControladorUsuarios',
                                'saveTeacherChanges',
                                'teacherlist',
                                'Teacher',
                                'idTeacherModal',
                                "Teacher updated!");
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

