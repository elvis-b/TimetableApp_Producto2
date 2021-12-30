<?php

class ControladorCursos
{
    static public function getCourseInfo($id)
    {
        $request = ModeloCursos::getCourseById($id);

        return $request;
    }

    static public function addNewCourse(): string
    {
        return ModeloCursos::addNewCourse();
    }

    static public function deleteCourse(): string
    {
        return ModeloCursos::deleteCourse($_POST["courseId"]);
    }

    static public function updateCourse($courseId): string
    {
        return ModeloCursos::updateCourse($courseId);
    }

    static public function getAllCourses()
    {
        return ModeloCursos::getAllCourses();

    }

    /*=============================================
    MOSTRAR NOTIFICACIONES
    =============================================*/

    static public function ctrMostrarCursos()
    {

        $tabla = "courses";

        $respuesta = ModeloCursos::mdlMostrarMisCursos($tabla);

        return $respuesta;

    }

    /**
     * Funcion que muestra los cursos del usuario identificado
     * @param type $item
     * @param type $valor
     * @return type
     */
    static public function ctrMostrarMisCursos()
    {

        $tabla = "courses";

        $respuesta = ModeloCursos::mdlMostrarMisCursos();

        return $respuesta;

    }


    static public function ctrMostrarCursos1($item, $valor)
    {

        $tabla = "courses";

        $respuesta = ModeloCursos::mdlMostrarCursos1($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    CREAR CURSOS
    =============================================*/

    /*
    static public function ctrCrearCurso($datos){

        if(isset($datos["name"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["name"])){



                    $datos = array(
                           "name"=>$datos["name"],
                           "descripcion"=>$datos["descripcion"],
                           "inicio"=>$datos["inicio"],
                           "final"=>$datos["final"]

                       );

                $respuesta = ModeloCursos::mdlIngresarCurso("courses", $datos);

                return $respuesta;


            }else{

                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡El nombre del curso  no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "vistaCursos";

                            }
                        })

                  </script>';



            }

        }

    }
    */


    static public function showErrorMessage()
    {
        ?>
        <script>
            Swal.fire(
                '',
                'Please complete all the fields!',
                'error'
            )
        </script>
        <?php
    }


    static public function ctrEditarCurso($datos)
    {

        if (isset($datos["id"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["notificacion"])) {

                $datos = array("id" => $datos["id"],
                    "name" => $datos["name"],
                    "descripcion" => $datos["descripcion"],
                    "inicio" => $datos["inicio"],
                    "final" => $datos["final"]

                );

                $respuesta = ModeloCursos::mdlEditarCurso("courses", $datos);

                return $respuesta;


            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaCursos";

							}
						})

			  	</script>';


            }

        }


    }


    /*=============================================
    ELIMINAR CURSO
    =============================================*/

    static public function ctrEliminarCurso()
    {
        $varids = $_POST["courseId"];
        echo '<script>alert("WORKS "' . $varids . ')</script>';

        if (isset($_GET["idCurso"])) {

            $datos = $_GET["idCurso"];

            $respuesta = ModeloCursos::mdlEliminarCurso("courses", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El curso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "vistaCursos";

								}
							})

				</script>';

            }


        }

    }


}