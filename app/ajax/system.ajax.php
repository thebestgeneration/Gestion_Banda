<?php
require_once('../controllers/system.controller.php');
require_once('../models/system.model.php');

    // Establece el código de respuesta HTTP a 400 (Solicitud incorrecta).
    http_response_code(400);

    // Verifica si se ha enviado la opción a través de POST.
    if (isset($_POST["opcion"])) {
        // Utiliza un switch para manejar diferentes opciones de operación.
        switch ($_POST["opcion"]) {
            case "loadSystem": {
                // Carga la información del sistema utilizando el controlador.
                $data = systemController::ctrLoadSystemInformation();
                // Establece el código de respuesta HTTP a 200 (Éxito).
                http_response_code(200);
                // Devuelve la información del sistema en formato JSON.
                echo json_encode($data);
                break;
            }
            case "checkIfEmpty": {
                // Establece el código de respuesta HTTP a 200 (Éxito).
                http_response_code(200);
                // Verifica si la información del sistema está vacía y almacena el resultado.
                $result = systemModel::mdlCheckIfSystemInformationIsEmpty();
                // Devuelve el resultado en formato JSON.
                echo json_encode($result);
                break;
            }
            case "insertUpdateSystem": {
                // Intenta insertar o actualizar la información del sistema utilizando el controlador.
                if (($respuesta = SystemController::ctrInsertUpdateSystemInformation($_POST)) !== null) {
                    // Establece el código de respuesta HTTP a 200 (Éxito).
                    http_response_code(200);
                    // Devuelve la respuesta de la operación en formato JSON.
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
            default: {
                // Manejo de casos no definidos; no se realiza ninguna acción.
                break;
            }
        }
    }
?>