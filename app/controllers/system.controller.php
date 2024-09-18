<?php 
require_once('../models/system.model.php');

class systemController {

    public static function ctrLoadSystemInformation(){
        // Elimina la información del sistema almacenada en la sesión para cargar datos frescos.
        unset($_SESSION['system']);
        // Carga la información del sistema desde el modelo y la devuelve.
        $data = systemModel::mdlLoadSystemInformation();
        return $data;
    }

    /** 
     * Inserta o actualiza la información del sistema en la base de datos.
     * 
     * @param array $data - Un array que contiene pares clave-valor de la información del sistema.
     * @return bool - Devuelve true si se realizó la inserción o actualización correctamente, false en caso contrario.
     */
    public static function ctrInsertUpdateSystemInformation($data):bool
    {
        // Verifica que el array de datos no esté vacío.
        if(!empty($data)){
            // Itera sobre cada par clave-valor en el array de datos.
            foreach($data as $key => $value){
                // Ignora la clave 'opcion'.
                if($key === 'opcion'){
                    continue;
                }
                // Escapa comillas simples en el valor.
                $value = str_replace("'", "&apos;", $value);
                // Verifica si el registro ya existe en la base de datos.
                if(systemModel::mdlrecordSystemInformationExists($key)){
                    // Si existe, intenta actualizar el registro.
                    if(!systemModel::mdlUpdateSystemInformation($value, $key)){
                        return false;
                    }
                } else {
                    // Si no existe, intenta insertar un nuevo registro.
                    if(!systemModel::mdlInsertSystemInformation($value, $key)){
                        return false;
                    }
                }
            }

            // Maneja la subida de la imagen 'logo' si se ha proporcionado.
            if(isset($_FILES['img'])){
                $response = systemModel::mdlprocessImagesSystemInformation($_FILES['img'], 'logo');
                if ($response['success']) {
                    // Si la imagen se subió correctamente, actualiza o inserta la información del logo.
                    if (systemModel::mdlRecordSystemInformationExists('logo')) {
                        $oldImagePath = base_ap . systemModel::mdlGetSystemInformation('logo');
                        systemModel::mdlUpdateSystemInformation($response['filename'], 'logo');
                        // Elimina la imagen anterior si existe.
                        if (is_file($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    } else {
                        // Inserta el nuevo logo si no existía antes.
                        systemModel::mdlInsertSystemInformation($response['filename'], 'logo');
                    }
                } else {
                    // Guarda el mensaje de error en la sesión si la subida falla.
                    $_SESSION['error'] = $response['msg'];
                }                
            }

            // Maneja la subida de la imagen 'cover' si se ha proporcionado.
            if (isset($_FILES['cover'])) {
                $response = systemModel::mdlprocessImagesSystemInformation($_FILES['cover'], 'cover');
                if ($response['success']) {
                    // Si la imagen se subió correctamente, actualiza o inserta la información de la portada.
                    if (systemModel::mdlRecordSystemInformationExists('cover')) {
                        $oldImagePath = base_ap . systemModel::mdlGetSystemInformation('cover');                        
                        systemModel::mdlUpdateSystemInformation($response['filename'], 'cover');
                        // Elimina la imagen anterior si existe.
                        if (is_file($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    } else {
                        // Inserta la nueva portada si no existía antes.
                        systemModel::mdlInsertSystemInformation($response['filename'], 'cover');
                    }
                } else {
                    // Guarda el mensaje de error en la sesión si la subida falla.
                    $_SESSION['error'] = $response['msg'];
                }
            }
            // Establece un mensaje de éxito en la sesión.
            $flash = Settings::set_flashdata('success', 'Configuración del sistema actualizada correctamente');

            return $flash;
        }
        return false;
    }
}
?>