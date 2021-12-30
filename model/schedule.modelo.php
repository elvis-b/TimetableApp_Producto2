<?php

require_once "conexion.php";

class ModeloSchedule
{

    static public function clearScheduleForClass($idCourse)
    {
        $stmtDelete = Conexion::conectar()->prepare("DELETE FROM enroll where id_course =:idCourse");
        $stmtDelete->bindParam(":idCourse", $idCourse, PDO::PARAM_INT);
        $stmtDelete->execute();
    }

    static public function addNewSchedule($idCourse, $idStudent)
    {


        $stmt = Conexion::conectar()->prepare("INSERT INTO enroll (id_student, id_course) VALUES (:idStudent,:idCourse)");
        $stmt->bindParam(":idStudent", $idStudent, PDO::PARAM_INT);
        $stmt->bindParam(":idCourse", $idCourse, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "DONE";
        } else {
            $stmt->close();
            $stmt = null;
            return "ERROR";
        }
    }

    static public function deleteSchedule()
    {

    }

    /*=============================================
    MOSTRAR NOTIFICACIONES
    =============================================*/

    static public function mdlMostrarSchedule($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function mdlMostrarSchedule1($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_schedule DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;


    }


}