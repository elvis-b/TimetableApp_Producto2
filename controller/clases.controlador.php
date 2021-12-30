<?php


class ControladorClases
{

    static public function getClassInfo($id)
    {
        $request = ModeloClases::getClassById($id);

        return $request;
    }

    static public function addNewClass(): string
    {
        return ModeloClases::addNewClass();
    }

    static public function deleteClass(): string
    {
        return ModeloClases::deleteClass($_POST["classId"]);
    }

    static public function updateClass(): string
    {
        return ModeloClases::updateClass($_POST['idClassModal']);
    }

    static public function getAllClasses()
    {
        return ModeloClases::getAllClasses();

    }

    static public function showErrorMessage()
    {
        echo '<script>Swal.fire("ERROR!")</script>';
    }


    /*=============================================
    MOSTRAR CLASES
    =============================================*/

    static public function ctrMostrarClases()
    {

        $tabla = "class";

        $respuesta = ModeloClases::mdlMostrarClases($tabla);

        return $respuesta;

    }

    static public function ctrMostrarClases1($item, $valor)
    {

        $tabla = "class";

        $respuesta = ModeloClases::mdlMostrarClases1($tabla, $item, $valor);

        return $respuesta;

    }


    static public function ctrMostrarInfoClases($item, $valor)
    {

        $tabla = "class";

        $respuesta = ModeloClases::mdlMostrarInfoClases($tabla, $item, $valor);

        return $respuesta;

    }


    /*=============================================
    CREAR CLASES
    =============================================*/

    static public function ctrCrearClases($datos)
    {

        if (isset($datos["name"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["name"])) {


                $datos = array(
                    "name" => $datos["name"],
                    "color" => $datos["color"],
                    "id_curso" => $datos["id_curso"],
                    "id_teacher" => $datos["id_teacher"],
                    "id_schedule" => $datos["id_schedule"]

                );

                $respuesta = ModeloClases::mdlIngresarClases("class", $datos);

                return $respuesta;


            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre de las clases no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaClases";

							}
						})

			  	</script>';


            }

        }

    }


    static public function ctrEditarClases($datos)
    {

        if (isset($datos["id"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["name"])) {

                $datos = array("id" => $datos["id"],
                    "name" => $datos["name"],
                    "color" => $datos["color"],
                    "id_curso" => $datos["id_curso"],
                    "id_teacher" => $datos["id_teacher"],
                    "id_schedule" => $datos["id_schedule"]

                );

                $respuesta = ModeloClases::mdlEditarClases("class", $datos);

                return $respuesta;


            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre de las Clases no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaClases";

							}
						})

			  	</script>';


            }

        }


    }


    /*=============================================
    ELIMINAR CLASES
    =============================================*/

    static public function ctrEliminarClases()
    {


        if (isset($_GET["idClases"])) {

            $datos = $_GET["idClases"];

            $respuesta = ModeloClases::mdlEliminarClases("class", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El clases ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "vistaClases";

								}
							})

				</script>';

            }


        }

    }


}