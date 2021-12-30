<?php

class ControladorPlantilla
{

    /*=============================================
    LLAMAMOS LA PLANTILLA
    =============================================*/

    public function plantilla()
    {

        include "views/plantilla.php";

    }

    static public function postAndReturn($className, $functionName, $returnPath, $entity, $verificationField, $message)
    {
        $registro = new $className();
        if (isset($_POST[$verificationField])) {
            if (!empty($_POST[$verificationField])) {
                $requestStatus = $registro->$functionName();
                switch ($requestStatus) {
                    case "DONE":
                        echo '<script>alertOkAndNavigateTo("' . $returnPath . '","' . $message . '");</script>';
                        break;
                    case "EXISTS":
                        echo '<script>alertWarning("' . $entity . ' already exists!");</script>';
                        break;
                    case "ERROR":
                        echo '<script>alertError("Problem occured!");</script>';
                        break;
                }
            } else {
                self::showErrorMessage();
            }
        }
    }

    static public function showErrorMessage()
    {
        echo '<script>Swal.fire("ERROR!")</script>';
    }


}