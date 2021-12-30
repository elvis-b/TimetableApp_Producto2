<?php

require_once "../controller/clases.controlador.php";
require_once "../model/clases.modelo.php";


Class AjaxClases{

    public $item;
    public $valor;
	public $name;
	public $descripcion;
	public $id_course;
	public $id_schedule;
	public $id_teacher;
	public $idClases;
	public $id;


	/*=============================================
	CREAR CLASES
	=============================================*/


	public function  ajaxCrearClases(){

		$datos = array(
			"name"=>$this->name,
			"color"=>$this->color,
			"id_curso"=>$this->id_course,
			"id_teacher"=>$this->id_teacher,
			"id_schedule"=>$this->id_schedule
		
		    );
		
		$respuesta = controladorClases::ctrCrearClases($datos);

		echo $respuesta;

	}



	public function ajaxTraerClases(){

		$item = "id_class";
		$valor = $this->idClases;

		$respuesta = ControladorClases::ctrMostrarClases1($item, $valor);

		echo json_encode($respuesta);

	}


	public function  ajaxEditarClases(){

		$datos = array(
			"id"=>$this->id,
			"name"=>$this->name,
			"color"=>$this->color,
			"id_curso"=>$this->id_course,
			"id_teacher"=>$this->id_teacher,
			"id_schedule"=>$this->id_schedule	
			);

		$respuesta = controladorClases::ctrEditarClases($datos);

	
		echo $respuesta;

	}

 
	
}




/*=============================================
CREAR CLASES
=============================================*/
if(isset($_POST["name"])){

	$traerClases = new AjaxClases();
	$traerClases -> name = $_POST["name"];
	$traerClases -> descripcion = $_POST["descripcion"];
	$traerClases -> color = $_POST["color"];
	$traerClases -> id_teacher = $_POST["id_teacher"];
	$traerClases -> id_course = $_POST["id_course"];
	$traerClases -> id_schedule = $_POST["id_schedule"];
	$traerClases -> ajaxCrearClases();

}



/*=============================================
TRAER CLASES
=============================================*/
if(isset($_POST["idClases"])){

	$traerClases = new AjaxClases();
	$traerClases  -> idClases = $_POST["idClases"];
	$traerClases -> ajaxTraerClases();

}


/*=============================================
EDITAR CLASES
=============================================*/
if(isset($_POST["id"])){

	$editarClases = new AjaxClases();
	$editarClases -> id = $_POST["id"];
    $editarClases -> name = $_POST["nameEditar"];
	$editarClases -> descripcion = $_POST["descripcionEditar"];
	$editarClases -> color = $_POST["colorEditar"];
	$editarClases -> id_teacher = $_POST["idTeacher"];
	$editarClases -> id_course = $_POST["idCurso"];
	$editarClases -> id_schedule = $_POST["idSchedule"];
	$editarClases -> ajaxEditarClases();

}



