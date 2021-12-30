<?php

Class ControladorSchedule{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function mdlMostrarSchedule(){

		$tabla = "schedule";

		$respuesta = ModeloSchedule::mdlMostrarSchedule($tabla);

		return $respuesta;

	}

	static public function ctrMostrarSchedule1($item, $valor){

		$tabla = "schedule";

		$respuesta = ModeloSchedule::mdlMostrarSchedule1($tabla,$item,$valor);

		return $respuesta;

	}

}