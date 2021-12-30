<!-- Begin page content -->
<div class="container" style="margin-top:50px">

    <div class="col-md-3 col-lg-3">
    </div>

    <div class="col-md-6 col-lg-6">

        <center><h1>REGISTRO DE ASIGNATURA</h1></center>

        <form method="POST" id="classPost">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="nombre" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label ">Profesor</label>
                <select name="idTeacher" class="form-control" id="idTeacher">
                    <?php
                    $teachers = ControladorUsuarios::getAllTeachers();
                    foreach ($teachers as $key => $value) {
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label ">Curso</label>
                <select name="idCourse" class="form-control" id="idTeacher">
                    <?php
                    $cursos = ControladorCursos::getAllCourses();
                    foreach ($cursos as $key => $value) {
                        echo '<option value="' . $value["id_course"] . '">' . $value["name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="date_start" class="form-label passConfirm">Incio</label>
                <input name="date_start" type="time" class="form-control" id="date_start">
            </div>

            <div class="mb-3">
                <label for="date_end" class="form-label">Fin</label>
                <input name="date_end" type="time" class="form-control" id="date_end">
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <div id="cp2" class="input-group colorpicker-component">
                    <input type="text" value="#00AABB" class="form-control" name="color"/>
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div>
            <ul class="hidden-users">
                <?php
                $students = ControladorUsuarios::getAllStudents();
                foreach ($students as $key => $value) {
                    echo '<li id="' . $value["id"] . '" name="' . $value["name"] . '"></li>';
                }
                ?>
            </ul>
            <input hidden name="commaSeparatedIds" id="commaSeparatedIds" value="empty">
            <div class="mb-3">
                <label for="description" class="form-label ">Students</label>
                <div id="cp2" class="input-group">
                    <select name="studentSelection" class="form-control" id="studentSelection"></select>
                    <span class="input-group-addon">
                        <a onclick="addStudentToSelectedList()" class="addon-button">Adauga</a>
                    </span>
                </div>
            </div>
            <div class="mb-3">
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
            $registro = new ControladorClases();
            if (isset($_POST['name'])) {
                if (!empty($_POST['name'])) {
                    $requestStatus = $registro->addNewClass();
                    switch ($requestStatus) {
                        case "DONE":
                            echo '<script>alertOkAndNavigateTo("vistaAsignaturaAdmin","Class added succesfully!");</script>';
                            break;
                    }
                } else {
                    $registro->showErrorMessage();
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Borrar</button>
        </form>
    </div>

    <?php
    if (isset($_SESSION['admin1'])) {

        echo "<br><br><h1>" . $_SESSION['admin1'] . "</h1>";

    }
    if (isset($_SESSION['error_register'])) {
        echo "<h2>Error:";
        echo var_dump($_SESSION['error_register']);
        echo "</h2>";
    }
    ?>

</div>

<script>
    $(document).ready(function () {
        buildInitialStudentList();
        setSelectionData();
        $('#cp2').colorpicker();
    })
</script>
