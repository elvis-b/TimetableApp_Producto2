<?php

class ControladorUsuarios
{

    static public function getAllTeachers()
    {
        return ModeloUsuarios::getAllTeachers();
    }

    static public function getTeacherById($id)
    {
        return ModeloUsuarios::getTeacherById($id);
    }

    static public function getTeacherByIdAll($id)
    {
        return ModeloUsuarios::getTeacherByIdAll($id);
    }

    static public function addNewTeacher()
    {
        return ModeloUsuarios::addNewTeacher();
    }

    static public function deleteTeacher()
    {
        return ModeloUsuarios::deleteTeacher($_POST['teacherId']);
    }

    static public function saveTeacherChanges()
    {
        return ModeloUsuarios::saveTeacherChanges();
    }

    static public function getAllStudents()
    {
        return ModeloUsuarios::getAllStudents();
    }

    static public function getStudentById()
    {
        return ModeloUsuarios::getStudentById($_POST['parameter']);
    }

    static public function addNewStudent()
    {
        return ModeloUsuarios::addNewStudent();
    }

    static public function deleteStudent()
    {
        return ModeloUsuarios::deleteStudent($_POST['studentId']);
    }

    static public function saveStudentChanges()
    {
        return ModeloUsuarios::saveStudentChanges();
    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    public function ctrRegistroUsuario()
    {

        if (isset($_POST["username"])) {

            //if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["username"])){


            $datos = array("username" => $_POST["username"],
                "name" => $_POST["nombre"],
                "pass" => $_POST["password"],
                "email" => $_POST["email"],
                "surname" => $_POST["surname"],
                "telephone" => $_POST["tlf"]);

            $respuesta = ModeloUsuarios::registerNewStudent($datos);

            if ($respuesta == "DONE") {

                echo "<script> alert('Usuario registrado'); </script>";
            } else if ($respuesta == "EXISTS") {
                echo "<script> alert('Username no disponible'); </script>";
            } else {
                echo "<script> alert('Error al registrar el usuario, revise los datos'); </script>";
            }
        }


    }

    //}


    public function ctrRegistroUsuarioAdmin()
    {


        if (isset($_POST["tipouser"]) == "ESTUDIANTE") {


            if (isset($_POST["username"])) {


                if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["username"])) {


                    $datos = array("username" => $_POST["username"],
                        "nombre" => $_POST["nombre"],
                        "password" => $_POST["password"],
                        "email" => $_POST["email"],
                        "surname" => $_POST["surname"],
                        "telefono" => $_POST["tlf"],
                        "nif" => $_POST["nif"]);

                    $tabla = "students";


                    $respuesta = ModeloUsuarios::mdlRegistroEstudiante($tabla, $datos);


                    if ($respuesta == "ok") {

                        echo "<script> alert('Usuario registrado'); </script>";
                    } else if ($respuesta == "existe") {
                        echo "<script> alert('Username no disponible'); </script>";
                    } else {
                        echo "<script> alert('Error al registrar el usuario, revise los datos'); </script>";
                    }

                } else {

                    echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

					</script>';

                }

            }
        }


        if (isset($_POST["tipouser"]) == "ADMIN") {


            if (isset($_POST["username"])) {

                if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])) {


                    $datos = array("username" => $_POST["username"],
                        "nombre" => $_POST["nombre"],
                        "surname" => $_POST["surname"],
                        "password" => $_POST["password"],
                        "email" => $_POST["email"]);

                    $tabla = "users_admin";


                    $respuesta = ModeloUsuarios::mdlRegistroAdmin($tabla, $datos);

                    if ($respuesta == "ok") {

                        echo "<script> alert('Usuario registrado'); </script>";
                    } else if ($respuesta == "existe") {
                        echo "<script> alert('Username no disponible'); </script>";
                    } else {
                        echo "<script> alert('Error al registrar el usuario, revise los datos'); </script>";
                    }


                } else {

                    echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

						</script>';

                }

            }

        }

        if (isset($_POST["tipouser"]) == "PROFESOR") {


            if (isset($_POST["username"])) {

                if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])) {


                    $datos = array("username" => $_POST["username"],
                        "nombre" => $_POST["nombre"],
                        "password" => $_POST["password"],
                        "email" => $_POST["email"],
                        "surname" => $_POST["surname"],
                        "telefono" => $_POST["tlf"],
                        "nif" => $_POST["nif"]);

                    $tabla = "teachers";


                    $respuesta = ModeloUsuarios::mdlRegistroTeacher($tabla, $datos);

                    if ($respuesta == "ok") {

                        echo "<script> alert('Usuario registrado'); </script>";
                    } else if ($respuesta == "existe") {
                        echo "<script> alert('Username no disponible'); </script>";
                    } else {
                        echo "<script> alert('Error al registrar el usuario, revise los datos'); </script>";
                    }


                } else {

                    echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

					</script>';

                }

            }
        }


    }


    /*=============================================
MOSTRAR USUARIO: estudiante o profesor
=============================================*/
    static public function ctrMostrarUsuario($item, $valor)
    {


        if (isset($_SESSION["tipo"])) {

            if ($_SESSION["tipo"] == "PROFESOR") {


                $tabla = "teachers";
                $respuesta = ModeloUsuarios::mdlMostrarTeacher($tabla, $item, $valor);
                return $respuesta;

            } else if ($_SESSION["tipo"] == "ESTUDIANTE") {
                $tabla = "students";
                $respuesta = ModeloUsuarios::mdlMostrarEstudiante($tabla, $item, $valor);
                return $respuesta;
            }
        }

    }

    /*=============================================
    MOSTRAR ESTUDIANTE
    =============================================*/

    static public function ctrMostrarEstudiante($item, $valor)
    {


        $tabla = "students";

        $respuesta = ModeloUsuarios::mdlMostrarEstudiante($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR ADMIN
    =============================================*/

    static public function ctrMostrarAdmin($item, $valor)
    {

        $tabla = "users_admin";

        $respuesta = ModeloUsuarios::mdlMostrarAdmin($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR TEACHER
    =============================================*/

    static public function ctrMostrarTeacher($item, $valor)
    {

        $tabla = "teachers";

        $respuesta = ModeloUsuarios::mdlMostrarTeacher($tabla, $item, $valor);

        return $respuesta;

    }


    /*=============================================
    INGRESO DE USUARIO
    =============================================*/

    public function ctrIngresoUsuario()
    {

        echo 'Ingreso de usuarios';
        if (isset($_POST["username"])) {
            $item = "username";
            $valor = $_POST["username"];

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {
                $tabla = "students";
                $respuesta = ModeloUsuarios::mdlMostrarEstudiante($tabla, $item, $valor);

                echo "Consulta estudiantes<b>";
                echo $respuesta["username"] . "--" . $respuesta["pass"] . "<b>";

                if ($respuesta["username"] == $_POST["username"] && $respuesta["pass"] == $_POST["password"]) {
                    echo "Login como estudiante";
                    $_SESSION["tipo"] = "ESTUDIANTE";
                    $_SESSION["nombre"] = $respuesta["name"];
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["username"] = $respuesta["username"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["password"] = $respuesta["password"];

                    /*$_SESSION["validarSesion"] = "ok";
                    $_SESSION["apellido"] = $respuesta["surname"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["password"] = $respuesta["password"];

                    $_SESSION["telefono"] = $respuesta["telephone"];
                    $_SESSION["nif"] = $respuesta["nif"]; */


                    echo '<script>				
                            window.location = "vistaMisCursos";
			</script>';

                } else {

                    echo "Consulta profesores<b>";
                    $tabla = "teachers";

                    $respuesta = ModeloUsuarios::mdlMostrarTeacher($tabla, $item, $valor);

                    if ($respuesta["username"] == $_POST["username"] && $respuesta["password"] == $_POST["password"]) {

                        $_SESSION["tipo"] = "PROFESOR";
                        $_SESSION["nombre"] = $respuesta["name"];
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["username"] = $respuesta["username"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["password"] = $respuesta["password"];

                        /*$_SESSION["validarSesion"] = "ok";
                        $_SESSION["apellido"] = $respuesta["surname"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["username"] = $respuesta["username"];
                        $_SESSION["telefono"] = $respuesta["telephone"];
                        $_SESSION["nif"] = $respuesta["nif"];*/

                        echo '<script>			
                                    window.location = "vistaMisCursos";
				</script>';

                    } else {

                        echo "Login como admin";

                        $tabla = "users_admin";

                        $respuesta = ModeloUsuarios::mdlMostrarAdmin($tabla, $item, $valor);
                        if ($respuesta["username"] == $_POST["username"] && $respuesta["password"] == $_POST["password"]) {

                            $_SESSION["tipo"] = "ADMIN";
                            $_SESSION["nombre"] = $respuesta["name"];
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["username"] = $respuesta["username"];

                            /*$_SESSION["validarSesion"] = "ok";
                            $_SESSION["apellido"] = $respuesta["surname"];
                            $_SESSION["email"] = $respuesta["email"];
                            $_SESSION["password"] = $respuesta["password"];
                            $_SESSION["username"] = $respuesta["username"];
                            $_SESSION["telefono"] = $respuesta["telephone"];
                            $_SESSION["nif"] = $respuesta["nif"]; */

                            echo '<script>			
                                        window.location = "vistaCursosAdmin";
                                    </script>';
                        } else {
                            echo '<script>
						swal({
                                                    title: "¡ERROR AL INGRESAR!",
                                                    text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
                                                    confirmButtonText: "Cerrar",
                                                    closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm) {	   
								window.location = localStorage.getItem("rutaActual");
							} 
						});

                                            </script>';
                        }

                    }
                }
            }
        }
    }


    /*=============================================
    OLVIDO DE CONTRASEÑA
    =============================================*/

    public function ctrOlvidoPassword()
    {

        if (isset($_POST["passEmail"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])) {

                /*=============================================
                GENERAR CONTRASEÑA ALEATORIA
                =============================================*/

                function generarPassword($longitud)
                {

                    $key = "";
                    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

                    $max = strlen($pattern) - 1;

                    for ($i = 0; $i < $longitud; $i++) {

                        //$key .= $pattern{mt_rand(0,$max)};

                    }

                    return $key;

                }

                $nuevaPassword = generarPassword(11);

                $encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $item1 = "email";
                $valor1 = $_POST["passEmail"];

                $respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

                if ($respuesta1) {

                    $id = $respuesta1["id"];
                    $item2 = "password";
                    $valor2 = $encriptar;

                    $respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

                    if ($respuesta2 == "ok") {

                        /*=============================================
                        CAMBIO DE CONTRASEÑA
                        =============================================*/

                        date_default_timezone_set("America/Bogota");

                        $url = Ruta::ctrRuta();

                        $mail = new PHPMailer;

                        $mail->CharSet = 'UTF-8';

                        $mail->isMail();

                        $mail->setFrom('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                        $mail->addReplyTo('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                        $mail->Subject = "Solicitud de nueva contraseña";

                        $mail->addAddress($_POST["passEmail"]);

                        $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
								<center>
									
									<img style="padding:20px; width:10%" src="http://www.tutorialesatualcance.com/tienda/logo.png">

								</center>

								<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
								
									<center>
									
									<img style="padding:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-pass.png">

									<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

									<hr style="border:1px solid #ccc; width:80%">

									<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>' . $nuevaPassword . '</h4>

									<a href="' . $url . '" target="_blank" style="text-decoration:none">

									<div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

									</a>

									<br>

									<hr style="border:1px solid #ccc; width:80%">

									<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

									</center>

								</div>

							</div>');

                        $envio = $mail->Send();

                        if (!$envio) {

                            echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema enviando cambio de contraseña a ' . $_POST["passEmail"] . $mail->ErrorInfo . '!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

                        } else {

                            echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["passEmail"] . ' para su cambio de contraseña!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

                        }

                    }

                } else {

                    echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico no existe en el sistema!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

					</script>';


                }

            } else {

                echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al enviar el correo electrónico, está mal escrito!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

            }

        }

    }


    /*=============================================
    ACTUALIZAR PERFIL
    =============================================*/

    public function ctrActualizarPerfil()
    {

        $datos = array();

        if (isset($_POST["username"]) && !empty(($_POST["username"]))) {
            $datos['username'] = $_POST["username"];
            print_r($datos);
        }

        if (isset($_POST["password"]) && !empty(($_POST["password"]))) {
            $datos['password'] = $_POST["password"];
            print_r($datos);
        }

        if (isset($_POST["email"]) && !empty(($_POST["email"]))) {
            $datos['email'] = $_POST["email"];
            print_r($datos);
        }

        //$datos['email'] = $_POST["email"];

        if (sizeof($datos) == 0) {
            echo "<script> alert('No se han seleccionado datos para modificar'); </script>";
        }

        //
        if (isset($_SESSION["tipo"])) {

            if ($_SESSION["tipo"] == "PROFESOR") {
                $tabla = "teachers";
            } else if ($_SESSION["tipo"] == "ESTUDIANTE") {
                $tabla = "students";
            }

            $respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

            if ($respuesta == "ok") {
                //$_SESSION["username"] = $respuesta["username"];
                echo "<script> alert('Usuario actualizado'); 
                                   window.location.replace('vistaMisCursos'); 
                          </script>";


            } else if ($respuesta == "existe") {
                echo "<script> alert('El usuername seleccionado ya existe, no se ha podido modificar'); </script>";
            } else {
                echo "<script> alert('No se ha podido actualizar el usuario'); </script>";
            }
        }


        // Comprobamos que se modifica el username
        /*if(isset($_POST["username"])){
                    echo "Se modifica user"; 
               // }

        if($_POST["password"] == ""){

                $password = $_POST["passUsuario"];

            }else{

                $password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            }

            $datos = array("nombre" => $_POST["editarNombre"],
                           "email" => $_POST["editarEmail"],
                           "password" => $password,
                           );

            $tabla = "usuarios";

            $respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

            if($respuesta == "ok"){


                           $_SESSION["username"] = $respuesta["username"];


                $_SESSION["validarSesion"] = "ok";
                $_SESSION["id"] = $datos["id"];
                $_SESSION["nombre"] = $datos["nombre"];
                $_SESSION["foto"] = $datos["foto"];
                $_SESSION["email"] = $datos["email"];
                $_SESSION["password"] = $datos["password"];
                $_SESSION["modo"] = $_POST["modoUsuario"];


                echo "<script> alert('Usuario actualizado'); </script>";


            } else {

                            echo "<script> alert('No se ha podido actualizar el usuario'); </script>";
                        }

        }*/

    }


    /*=============================================
    ELIMINAR USUARIO
    =============================================*/

    public function ctrEliminarUsuario()
    {

        if (isset($_GET["id"])) {

            $tabla1 = "usuarios";
            $tabla2 = "comentarios";
            $tabla3 = "compras";
            $tabla4 = "deseos";

            $id = $_GET["id"];

            if ($_GET["foto"] != "") {

                unlink($_GET["foto"]);
                rmdir('vistas/img/usuarios/' . $_GET["id"]);

            }

            $respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla1, $id);

            ModeloUsuarios::mdlEliminarComentarios($tabla2, $id);

            ModeloUsuarios::mdlEliminarCompras($tabla3, $id);

            ModeloUsuarios::mdlEliminarListaDeseos($tabla4, $id);

            if ($respuesta == "ok") {

                $url = Ruta::ctrRuta();

                echo '<script>

						swal({
							  title: "¡SU CUENTA HA SIDO BORRADA!",
							  text: "¡Debe registrarse nuevamente si desea ingresar!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								   window.location = "' . $url . 'salir";
								  } 
						});

					  </script>';

            }

        }

    }

}