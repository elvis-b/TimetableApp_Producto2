<?php

session_start();

$url = Ruta::ctrRuta();

$rutas = array();

if (isset($_GET["ruta"])) {

    $rutas = explode("/", $_GET["ruta"]);

    $ruta = $rutas[0];

} else {

    $ruta = "inicio";

}

include "modulos/common/head.php";
include "modulos/common/menu.php";

/*=============================================
 RUTAS 
=============================================*/

if (isset($_GET["ruta"])) {

    /*=============================================
     LATERAL
     =============================================*/

    switch ($rutas[0]) {
        case "vistaLogin":
            echo "<br><br>";
            include "modulos/vistaLogin.php";
            break;
        case "vistaRegistro":
            include "modulos/vistaRegistro.php";
            break;
        case "inicio":
            include "modulos/inicio.php";
            break;
        case "vistaPerfil":
            include "modulos/vistaPerfil.php";
            break;
        case "vistaCursos":
            include "modulos/cursos/vistaCursos.php";
            break;
        case "vistaMisCursos":
            include "modulos/vistaMisCursos.php";
            break;
        case "vistaCalendario":
            include "modulos/calendario/index.php";
            break;
        case "vistaAsignaturas":
            include "modulos/asignaturas/vistaAsignaturas.php";
            break;
        case "vistaAsignaturaAdmin":
            include "modulos/asignaturas/vistaAsignaturaAdmin.php";
            break;
        case "vistaAltaAsignatura":
            include "modulos/asignaturas/vistaAltaAsignatura.php";
            break;
        case "vistaCursosAdmin":
            include "modulos/cursos/vistaCursosAdmin.php";
            break;
        case "vistaEliminarUsuario":
            include "modulos/vistaEliminarUsuario.php";
            break;
        case "vistaModificarUsuariosAdmin":
            include "modulos/vistaModificarUsuariosAdmin.php";
            break;
        case "vistaAltaUsuario":
            include "modulos/vistaAltaUsuario.php";
            break;
        case "userlist":
            include "modulos/usarios/userlist.php";
            break;
        case "addoredituser":
            include "modulos/usarios/addoredituser.php";
            break;
        case "teacherlist":
            include "modulos/teachers/teacherlist.php";
            break;
        case "addoreditteacher":
            include "modulos/teachers/addoreditteacher.php";
            break;
        case "vistaAltaCurso":
            if (($_SESSION["tipo"] == "ADMIN")) {
                include "modulos/cursos/vistaAltaCurso.php";
            }
            break;
    }

    if (isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok") {
        if (isset($_GET["ruta"])) {
            if ($rutas[0] == "calendario" || $rutas[0] == "calendariouser" || $rutas[0] == "vistaAdmin" || $rutas[0] == "logout" || $rutas[0] == "vistaCursos" || $rutas[0] == "vistaClases" || $rutas[0] == "vistaProfesores") {
                echo "<div class='container'>";
                include "modulos/" . $rutas[0] . ".php";
            } else {
                include "modulos/calendariouser.php";
            }
        }


    }

} else {
    include "modulos/inicio.php";
}
include "modulos/common/footer.php";
?>