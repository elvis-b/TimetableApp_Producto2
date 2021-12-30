<?php

require_once "conexion.php";

class ModeloUsuarios
{

    static public function cerrarSesion()
    {
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
    }


    static public function checkIfUserExists($userName): bool
    {
        $sql = Conexion::conectar()->prepare(
            "SELECT * FROM students,teachers,users_admin  WHERE students.username= \"" . $userName . "\""
            . "                         or teachers.username= \"" . $userName . "\" or users_admin.username= \"" . $userName . "\"");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        }
        return false;
    }


    static public function getAllTeachers()
    {
        $sql = Conexion::conectar()->prepare("SELECT username,id,name,surname,email,telephone FROM teachers");
        $sql->execute();
        $allTeachers = $sql->fetchAll();
        return $allTeachers;
        $stmt->close();
        $stmt = null;
    }

    static public function getTeacherById($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT id,name FROM teachers where id=:id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        $sql->execute();
        $allTeachers = $sql->fetchAll()[0];
        return $allTeachers["name"];
        $stmt->close();
        $stmt = null;
    }

    static public function getTeacherByIdAll($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT username,id,name,surname,email,telephone FROM teachers where id=:id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        $sql->execute();
        $allTeachers = $sql->fetchAll()[0];
        return $allTeachers;
        $stmt->close();
        $stmt = null;
    }


    static public function addNewTeacher(): string
    {
        if (self::checkIfUserExists($_POST['username'])) {
            return "EXISTS";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO  teachers (username, password, email, name, surname, telephone) VALUES (:username, :password, :email, :name, :surname, :telephone)");

        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $_POST["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $_POST["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":telephone", $_POST["telephone"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function deleteTeacher($teacherId): string
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM teachers WHERE id = :id");
        $stmt->bindParam(":id", $teacherId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function saveTeacherChanges()
    {
        $stmt = Conexion::conectar()->prepare("UPDATE teachers SET username = :username, name = :name,  surname = :surname,  telephone = :telephone,email = :email WHERE id = :id");
        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $_POST["modalName"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $_POST["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":telephone", $_POST["telephone"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $_POST["idTeacherModal"], PDO::PARAM_INT);
        $returnValue = "";
        if ($stmt->execute()) {
            $returnValue = "DONE";
        } else {
            $returnValue = "FAIL";
            $stmt->close();
            $stmt = null;
        }

        return $returnValue;
    }


    static public function getAllStudents()
    {
        $sql = Conexion::conectar()->prepare("SELECT username,id,name,surname,email,telephone FROM students");
        $sql->execute();
        $allTeachers = $sql->fetchAll();
        return $allTeachers;
        $stmt->close();
        $stmt = null;
    }

    static public function getAllStudentsWithIds($array)
    {
        $sql = Conexion::conectar()->prepare("SELECT username,id,name,surname,email,telephone FROM students where id in (".implode(',',$array).")");
        $sql->execute();
        $allTeachers = $sql->fetchAll();
        return $allTeachers;
        $stmt->close();
        $stmt = null;
    }

    static public function getStudentById($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT id,name,surname,telephone,email,username FROM students where id=:id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        $sql->execute();
        $allTeachers = $sql->fetchAll()[0];
        return $allTeachers;
        $stmt->close();
        $stmt = null;
    }

    static public function addNewStudent(): string
    {
        if (self::checkIfUserExists($_POST['username'])) {
            return "EXISTS";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO  students (username, pass, email, name, surname, telephone) VALUES (:username, :password, :email, :name, :surname, :telephone)");

        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $_POST["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $_POST["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":telephone", $_POST["telephone"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }


    static public function registerNewStudent($datos): string
    {
        if (self::checkIfUserExists($_POST['username'])) {
            return "EXISTS";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO  students (username, pass, email, name, surname, telephone) VALUES (:username, :password, :email, :name, :surname, :telephone)");

        $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":telephone", $datos["telephone"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function deleteStudent($studentId): string
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(":id", $studentId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function saveStudentChanges()
    {
        $stmt = Conexion::conectar()->prepare("UPDATE students SET username = :username, name = :name,  surname = :surname,  telephone = :telephone,email = :email WHERE id = :id");
        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $_POST["modalName"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $_POST["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":telephone", $_POST["telephone"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $_POST["idStudentModal"], PDO::PARAM_INT);
        $returnValue = "";
        if ($stmt->execute()) {
            $returnValue = "DONE";
        } else {
            $returnValue = "FAIL";
            $stmt->close();
            $stmt = null;
        }

        return $returnValue;
    }

    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/


    /*=============================================
    REGISTRO DE ADMIN
    =============================================*/

    static public function mdlRegistroAdmin($tabla, $datos)
    {


        $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"" . $datos["username"] . "\""
            . "                         or teachers.username= \"" . $datos["username"] . "\" or users_admin.username= \"" . $datos["username"] . "\"");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return "existe";
        } else {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(username, password, email, name, surname) VALUES (:username, :password, :email, :nombre, :surname)");

            $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);

            if ($stmt->execute()) {

                return "ok";

            } else {

                return "error";

            }

            $stmt->close();
            $stmt = null;

        }

    }

    /*=============================================
        REGISTRO DE TEACHER
        =============================================*/

    static public function mdlRegistroTeacher($tabla, $datos)
    {


        $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"" . $datos["username"] . "\""
            . "                         or teachers.username= \"" . $datos["username"] . "\" or users_admin.username= \"" . $datos["username"] . "\"");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return "existe";
        } else {


            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(username, password, email, name, surname, telephone, nif) VALUES (:username, :password, :email, :nombre, :surname, :telefono, :nif)");

            $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":nif", $datos["nif"], PDO::PARAM_STR);


            if ($stmt->execute()) {

                return "ok";

            } else {

                return "error";

            }

            $stmt->close();
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR Estudiante
    =============================================*/

    static public function mdlMostrarEstudiante($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function mdlMostrarAdmin($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function mdlActualizarPerfil($tabla, $datos)
    {

        switch ($_SESSION['tipo']) {
            case "PROFESOR":
                $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password=:password, username=:username ,email=:email WHERE username=\"" . $_SESSION["username"] . "\"");
                break;
            case "ESTUDIANTE":
                $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pass=:password, username=:username ,email=:email WHERE username=\"" . $_SESSION["username"] . "\"");
                break;
        }


        if (isset($datos['username'])) {
            // Comprobamos que no exista un usuario con el mismo username
            $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"" . $datos["username"] . "\""
                . "                         or teachers.username= \"" . $datos["username"] . "\" or users_admin.username= \"" . $datos["username"] . "\"");
            $sql->execute();


            if ($sql->rowCount() > 0) {
                return "existe";
            }

            $username = $datos['username'];

        } else {
            $username = $_SESSION["username"];
        }

        echo "Nombre de usuario " . $username;

        if (isset($datos['password'])) {
            $password = $datos["password"];
        } else {
            $password = $_SESSION["password"];
        }

        if (isset($datos['email'])) {
            $email = $datos["email"];
        } else {
            $email = $_SESSION["email"];
        }
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);


        $stmt->bindParam(":password", $password, PDO::PARAM_STR);


        if ($stmt->execute()) {
            // Modificar variables de sesion
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            $_SESSION["username"] = $username;
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    static public function mdlMostrarTeacher($tabla, $item, $valor)
    {

        //if($item != null){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        //}else{

        //	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_usuario DESC");

        //	$stmt -> execute();

        //	return $stmt -> fetchAll();

        //}

        $stmt->close();

        $stmt = null;

    }


}