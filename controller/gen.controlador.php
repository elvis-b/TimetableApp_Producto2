<?php

class ControladorGeneral
{

    static public function postAndReturn($className, $functionName, $returnPath, $entity, $verificationField)
    {
        $registro = new $className();
        if (isset($_POST[$verificationField])) {
            if (!empty($_POST[$verificationField])) {
                $requestStatus = $registro->$functionName();
                switch ($requestStatus) {
                    case "DONE":
                        echo '<script>alertOkAndNavigateTo("' + $returnPath + '","' + $entity + ' saved!");</script>';
                        break;
                    case "EXISTS":
                        echo '<script>alertWarning("'+$entity+' already exists!");</script>';
                        break;
                    case "ERROR":
                        echo '<script>alertError("Problem occured!");</script>';
                        break;
                }
            } else {
                $registro->showErrorMessage();
            }
        }
    }

}