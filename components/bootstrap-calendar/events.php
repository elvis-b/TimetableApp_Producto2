<?php require "Model/config.php";

$eventos = new calendario();
$eventos -> listado($db_connect);