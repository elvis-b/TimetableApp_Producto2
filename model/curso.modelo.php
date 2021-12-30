<?php

require_once "conexion.php";

class ModeloCursos
{
    static public function getCourseById($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_course, name, description, date_start, date_end, active FROM courses where id_course=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $arrResults = $stmt->fetchAll();
        return $arrResults[0];
        $stmt->close();
        $stmt = null;
    }

    static public function addNewCourse(): string
    {
        $dateInicio = $_POST['date_start'];
        $dateInicio = date_format(date_create($dateInicio), "Y-m-d H:i");
        $dateEnd = $_POST['date_end'];
        $dateEnd = date_format(date_create($dateEnd), "Y-m-d H:i");
        $active = isset($_POST['active']) ? 1 : 0;


        $stmt = Conexion::conectar()->prepare("INSERT INTO courses (name, description, date_start, date_end,active) VALUES (:nombre, :description, :inicio, :final,:active)");

        $stmt->bindParam(":nombre", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
        $stmt->bindParam(":inicio", $dateInicio, PDO::PARAM_STR);
        $stmt->bindParam(":final", $dateEnd, PDO::PARAM_STR);
        $stmt->bindParam(":active", $active, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function deleteCourse($courseId): string
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM courses WHERE id_course = :id");
        $stmt->bindParam(":id", $courseId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function updateCourse($courseId): string
    {
        $dateInicio = $_POST['inicioModal'];
        $dateInicio = date_format(date_create($dateInicio), "Y-m-d H:i");
        $dateEnd = $_POST['finalModal'];
        $dateEnd = date_format(date_create($dateEnd), "Y-m-d H:i");
        $stmt = Conexion::conectar()->prepare("UPDATE courses SET name = :nombre, description = :descripcion,  date_start = :inicio,  date_end = :final WHERE id_course = :id");
        $stmt->bindParam(":nombre", $_POST["modalName"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $_POST["descripcionModal"], PDO::PARAM_STR);
        $stmt->bindParam(":inicio", $dateInicio, PDO::PARAM_STR);
        $stmt->bindParam(":final", $dateEnd, PDO::PARAM_STR);
        $stmt->bindParam(":id", $courseId, PDO::PARAM_INT);
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

    static public function getAllCourses()
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_course, name, description, date_start, date_end, active FROM courses");
        $stmt->execute();
        $allCourses = $stmt->fetchAll();
        return $allCourses;
        $stmt->close();
        $stmt = null;
    }


    /*=============================================
    MOSTRAR NOTIFICACIONES
    =============================================*/

    static public function mdlMostrarCursos($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }


    static public function mdlMostrarMisCursos()
    {


        switch ($_SESSION['tipo']) {
            case "PROFESOR":
                $stmt = Conexion::conectar()->prepare("SELECT id_class, name, date_start, date_end FROM class where id_teacher=:id");
                break;
            case "ESTUDIANTE":
                $stmt = Conexion::conectar()->prepare("SELECT class.id_class, name,  date_start, date_end FROM class JOIN enroll ON class.id_class = enroll.id_course WHERE enroll.id_student=:id");
                break;
        }

        $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_STR);

        $stmt->execute();

        //return $stmt -> fetch();


        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_course DESC");

        //$stmt -> execute();

        return $stmt->fetchAll();


        $stmt->close();

        $stmt = null;
    }


    static public function mdlMostrarCursos1($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_course DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;


    }


    /*=============================================
    CREAR CURSO
    =============================================*/


    /*=============================================
    EDITAR CURSO
    =============================================*/

    static public function mdlEditarCurso($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :nombre, description = :descripcion,  inicio = :inicio,  final = :final WHERE id_course = :id");

        $stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":inicio", $datos["inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":final", $datos["final"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    ELIMINAR CURSO
    =============================================*/


    /*=============================================
    ACTUALIZAR Curso
    =============================================*/

    static public function mdlCursoAliado($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}


	

