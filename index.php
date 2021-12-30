<?php

require_once "Controller/cursos.controlador.php";
require_once "Controller/plantilla.controlador.php";
require_once "Controller/usuarios.controlador.php";
require_once "Controller/clases.controlador.php";
require_once "Controller/profesor.controlador.php";
require_once "Controller/schedule.controlador.php";


require_once "model/usuarios.modelo.php";
require_once "model/clases.modelo.php";
require_once "model/curso.modelo.php";
require_once "model/profesor.modelo.php";
require_once "model/schedule.modelo.php";
//require_once "Model/config.php";


require_once "model/rutas.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();