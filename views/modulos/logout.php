<?php
session_start();
unset($_SESSION["tipo"]);
unset($_SESSION["nombre"]);
unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("Location:../../index.php");
//$url = Ruta::ctrRuta();
