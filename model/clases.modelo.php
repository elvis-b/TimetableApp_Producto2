<?php

require_once "conexion.php";

class ModeloClases
{
    static public function getClassById($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_teacher, id_course,name,color,date_start,date_end FROM class where id_class=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $arrResults = $stmt->fetchAll();
        $studentsStmt = Conexion::conectar()->prepare("SELECT id_student FROM enroll where id_course=:id");
        $studentsStmt->bindParam(":id", $id, PDO::PARAM_INT);
        $studentsStmt->execute();
        $allStudentsInvolved = $studentsStmt->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        foreach ($allStudentsInvolved as $studentIdObj) {
            array_push($ids, $studentIdObj['id_student']);
        }
        $studentList = ModeloUsuarios::getAllStudentsWithIds($ids);
        $finalResults = [
            "classInfo" => $arrResults[0],
            "students" => $studentList
        ];
        return $finalResults;
        $stmt->close();
        $stmt = null;
    }

    static public function addNewClass(): string
    {
//        $dateInicio = date_format(date_create($_POST['date_start']), "Y-m-d H:i");
        $dateInicio = $_POST['date_start'];
        $dateEnd = $_POST['date_end'];
//        $dateEnd = date_format(date_create($_POST['date_end']), "Y-m-d H:i");

        $studentIds = explode(",", $_POST['commaSeparatedIds']);

        $db = Conexion::conectar();
        $stmt = $db->prepare(
            "INSERT INTO class (id_teacher,id_course,name,color,date_start,date_end) VALUES (:idTeacher,:idCourse,:name,:color,:dateStart,:dateEnd)"
        );

        $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindParam(":idTeacher", $_POST["idTeacher"], PDO::PARAM_INT);
        $stmt->bindParam(":idCourse", $_POST["idCourse"], PDO::PARAM_INT);
        $stmt->bindParam(":dateStart", $dateInicio, PDO::PARAM_STR);
        $stmt->bindParam(":dateEnd", $dateEnd, PDO::PARAM_STR);
        $stmt->bindParam(":color", $_POST["color"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $lastClassId = $db->lastInsertId();
            for ($i = 0; $i < count($studentIds) - 1; $i++) {
                ModeloSchedule::addNewSchedule(intval($lastClassId), intval($studentIds[$i]));
            }
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function deleteClass($classId): string
    {
        ModeloSchedule::clearScheduleForClass($classId);
        $stmt = Conexion::conectar()->prepare("DELETE FROM class WHERE id_class = :id");
        $stmt->bindParam(":id", $classId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function updateClass($classId): string
    {

        $studentIds = explode(",", $_POST['commaSeparatedIds']);
        $dateInicio = $_POST['inicioModal'];

        $dateEnd = $_POST['finalModal'];

        $db = Conexion::conectar();
        $stmt = $db->prepare("UPDATE class SET name = :name, id_teacher = :idTeacher,  id_course = :idCourse,date_start = :dateStart , date_end = :dateEnd, color = :color WHERE id_class = :id");
        $stmt->bindParam(":id", $classId, PDO::PARAM_INT);
        $stmt->bindParam(":name", $_POST["modalName"], PDO::PARAM_STR);
        $stmt->bindParam(":idTeacher", $_POST["idTeacher"], PDO::PARAM_INT);
        $stmt->bindParam(":idCourse", $_POST["idCourse"], PDO::PARAM_INT);
        $stmt->bindParam(":dateStart", $dateInicio, PDO::PARAM_STR);
        $stmt->bindParam(":dateEnd", $dateEnd, PDO::PARAM_STR);
        $stmt->bindParam(":color", $_POST["color"], PDO::PARAM_STR);
        $returnValue = "";
        if ($stmt->execute()) {
            ModeloSchedule::clearScheduleForClass($classId);
            for ($i = 0; $i < count($studentIds) - 1; $i++) {
                ModeloSchedule::addNewSchedule(intval($classId), intval($studentIds[$i]));
            }
            $returnValue = "DONE";
        } else {
            $returnValue = "FAIL";
            $stmt->close();
            $stmt = null;
        }

        return $returnValue;
    }

    static public function getAllClasses()
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_class, id_teacher, id_course,name,color,date_start,date_end FROM class");
        $stmt->execute();
        $allCourses = $stmt->fetchAll();
        return $allCourses;
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR NOTIFICACIONES
    =============================================*/

    static public function mdlMostrarClases($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function mdlMostrarClases1($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_class DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;


    }


    /*=============================================
    CREAR CLASES
    =============================================*/

    static public function mdlIngresarClases($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_teacher, id_course, id_schedule, name, color) VALUES (:id_teacher, :id_course, :id_schedule, :name, :color)");

        $stmt->bindParam(":id_teacher", $datos["id_teacher"], PDO::PARAM_INT);
        $stmt->bindParam(":id_course", $datos["id_curso"], PDO::PARAM_INT);
        $stmt->bindParam(":id_schedule", $datos["id_schedule"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }


    /*=============================================
    EDITAR CLASES
    =============================================*/

    static public function mdlEditarClases($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_teacher = :id_teacher,  id_course = :id_course,  id_schedule = :id_schudule, name = :name, color = :color WHERE id_class = :id");

        $stmt->bindParam(":id_teacher", $datos["id_teacher"], PDO::PARAM_STR);
        $stmt->bindParam(":id_course", $datos["id_curso"], PDO::PARAM_STR);
        $stmt->bindParam(":id_schedule", $datos["id_schedule"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
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
    ELIMINAR CLASES
    =============================================*/

    static public function mdlEliminarClases($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_class = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }


    /*=============================================
    ACTUALIZAR CLASES
    =============================================*/

    static public function mdlActualizarClases($tabla, $item, $valor)
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