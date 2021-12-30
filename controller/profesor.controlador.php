<?php

Class ControladorProfesores{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function ctrMostrarProfesor(){

		$tabla = "teachers";

		$respuesta = ModeloProfesor::mdlMostrarProfesor($tabla);

		return $respuesta;

	}

	static public function ctrMostrarProfesor1($item, $valor){

		$tabla = "teachers";

		$respuesta = ModeloProfesor::mdlMostrarProfesor1($tabla,$item,$valor);

		return $respuesta;

	}


	

	

}