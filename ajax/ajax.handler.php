<?php

require_once '../controller/cursos.controlador.php';
require_once '../controller/clases.controlador.php';
require_once '../controller/usuarios.controlador.php';
require_once '../model/curso.modelo.php';
require_once '../model/clases.modelo.php';
require_once '../model/usuarios.modelo.php';

if (isset($_POST['class'])) {
    $function = $_POST['function'];
    $className = $_POST['class'];
    $parameter = $_POST['parameter'];
    $class = new $className();
    $result = $class->$function($parameter);
    if(is_array($result))
    {
        print_r(json_encode($result));
    }
    elseif(is_string($result) && is_array(json_decode($result , true)))
    {
        print_r(json_decode($string, true));
    }
    else
    {
        echo $result;
    }

}
