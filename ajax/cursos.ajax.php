<?php

require_once "../controller/cursos.controlador.php";
require_once "../model/curso.modelo.php";


Class AjaxCurso{

    public $item;
    public $valor;
	public $name;
	public $descripcion;
	public $fecinicio;
	public $fecfinal;
	public $idCurso;
	public $id;


	/*=============================================
	CREAR CURSOS
	=============================================*/


	public function  ajaxCrearCurso(){

		$datos = array(
			"name"=>$this->name,
			"descripcion"=>$this->descripcion,
			"inicio"=>$this->fecinicio,
			"final"=>$this->fecfinal
		
		    );
		
		$respuesta = controladorCursos::ctrCrearCurso($datos);

		echo $respuesta;

	}



	public function ajaxTraerCurso(){

		$item = "id_course";
		$valor = $this->idCurso;

		$respuesta = ControladorCursos::ctrMostrarCurso1($item, $valor);

		echo json_encode($respuesta);

	}


	public function  ajaxEditarCurso(){

		$datos = array(
			"id"=>$this->id,
			"name"=>$this->name,
			"descripcion"=>$this->descripcion,
			"inicio"=>$this->fecinicio,
			"final"=>$this->fecfinal	
			);

		$respuesta = controladorCursos::ctrEditarCurso($datos);

	
		echo $respuesta;

	}

 
	
}




/*=============================================
CREAR CURSO
=============================================*/
if(isset($_POST["name"])){

	$traerCurso = new AjaxCurso();
	$traerCurso -> name = $_POST["name"];
	$traerCurso -> descripcion = $_POST["descripcion"];
	$traerCurso -> fecinicio = $_POST["inicio"];
	$traerCurso -> fecfinal = $_POST["final"];
	$traerCurso -> ajaxCrearCurso();

}



/*=============================================
TRAER CURSO
=============================================*/
if(isset($_POST["idCurso"])){

	$traerCurso = new AjaxCurso();
	$traerCurso  -> idCurso = $_POST["idCurso"];
	$traerCurso -> ajaxTraerCurso();

}


/*=============================================
EDITAR CURSO
=============================================*/
if(isset($_POST["id"])){

	$editarCurso = new AjaxCurso();
	$editarCurso -> id = $_POST["id"];
    $editarCurso -> name = $_POST["name"];
	$editarCurso -> descripcion = $_POST["descripcion"];
	$editarCurso -> fecinicio = $_POST["inicio"];
	$editarCurso -> fecfinal = $_POST["final"];


	$editarCurso -> ajaxEditarCurso();

}



