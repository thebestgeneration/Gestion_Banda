<?php
    if(!class_exists('DBConnection')){
        require_once('../../config/config.php');
        require_once('../database/dbconnection.php');
    }

    class systemModel {

        /** Carga toda la información del sistema desde la base de datos y la devuelve en un array asociativo. */
        public static function mdlLoadSystemInformation(){
            $db = new DBConnection;
            $sql = "SELECT * FROM `system`";
            $qry = $db -> conn -> query($sql);

            $data = [];

            while($row = $qry -> fetch_assoc()){
                $data[$row['meta_field']] = $row['meta_value'];
            }

            return $data;
        }

        /** 
         * Registra un nuevo registro de información del sistema en la base de datos.
         * 
         * @param string $value - El valor de la meta información.
         * @param string $key - El campo de meta información.
         * @return bool - Devuelve true si se insertó correctamente, false en caso contrario.
         */
        public static function mdlInsertSystemInformation($value, $key){
            $db = new DBConnection();

            $sql = "INSERT INTO `system` (meta_value, meta_field) VALUES (?, ?)";
            $stmt = $db -> conn -> prepare($sql);
            $stmt -> bind_param("ss", $value, $key);

            return $stmt -> execute();
        }

        /** 
         * Actualiza un registro existente de información del sistema en la base de datos.
         * 
         * @param string $value - El nuevo valor de la meta información.
         * @param string $key - El campo de meta información que se va a actualizar.
         * @return bool - Devuelve true si se actualizó correctamente, false en caso contrario.
         */
        public static function mdlUpdateSystemInformation($value, $key){
            $db = new DBConnection();

            $sql = "UPDATE `system` SET `meta_value` = ? WHERE `meta_field` = ?";
            $stmt = $db -> conn -> prepare($sql);
            $stmt -> bind_param("ss", $value, $key);

            return $stmt -> execute();
        }

        /** 
         * Verifica si un registro específico de información del sistema ya existe en la base de datos.
         * 
         * @param string $key - El campo de meta información que se desea verificar.
         * @return bool - Devuelve true si el registro existe, false en caso contrario.
         */
        public static function mdlrecordSystemInformationExists($key) {
            $db = new DBConnection();

            $sql = "SELECT COUNT(*) AS count FROM `system` WHERE `meta_field` = ?";
            $stmt = $db -> conn -> prepare($sql);
            $stmt -> bind_param("s", $key);
            $stmt -> execute();

            $result = $stmt -> get_result();
            $row = $result -> fetch_assoc();
            return $row['count'] > 0;
        }

        /** 
         * Verifica si la tabla de información del sistema está vacía.
         * 
         * @return bool - Devuelve true si la tabla está vacía, false en caso contrario.
         */
        public static function mdlCheckIfSystemInformationIsEmpty(){
            $db = new DBConnection();

            $sql = "SELECT COUNT(*) AS count FROM `system`";
            $stmt = $db -> conn -> prepare($sql);
            $stmt -> execute();

            $result = $stmt -> get_result() -> fetch_assoc();
            // $row = $result -> fetch_assoc();
            return $result['count'] == 0;
        }

        /** 
         * Obtiene el valor de un campo específico de información del sistema.
         * 
         * @param string $key - El campo de meta información que se desea obtener.
         * @return string - Devuelve el valor de la meta información, o una cadena vacía si no existe.
         */
        public static function mdlGetSystemInformation($key){
            $db = new DBConnection();
            
            $sql = "SELECT meta_value FROM `system` WHERE meta_field = ?";
            $stmt = $db -> conn -> prepare($sql);
            $stmt -> bind_param("s", $key);
            $stmt -> execute();

            $result = $stmt -> get_result();
            $row = $result -> fetch_assoc();
            return $row ? $row['meta_value'] : '';
        }

        /** 
         * Procesa y guarda una imagen del sistema, asegurando que sea del tipo permitido y redimensionándola.
         * 
         * @param array $file - El archivo de la imagen a procesar.
         * @param string $type - El tipo de información para nombrar el archivo.
         * @return array - Devuelve un array con el resultado de la operación (éxito, mensaje y nombre del archivo).
         */
        public static function mdlprocessImagesSystemInformation($file, $type){
            $allowed = ['image/png', 'image/jpeg'];
            $response = ['success' => false, 'msg' => '', 'filename' => ''];
    
            if ($file['tmp_name'] != '') {
                $fname = "{$type}-" . time() . '.png';
                $file_path = 'assets/images/' . $fname;
                $dir_path = base_ap . $file_path;
                $upload = $file['tmp_name'];
                $type = mime_content_type($upload);
        
                if (!in_array($type, $allowed)) {
                    $response['msg'] = "El tipo de archivo no es válido.";
                } else {
                    $new_height = $type == 'image/png' ? 200 : 720;
                    $new_width = $type == 'image/png' ? 200 : 1280;
        
                    list($width, $height) = getimagesize($upload);
                    $t_image = imagecreatetruecolor($new_width, $new_height);
                    imagealphablending($t_image, false);
                    imagesavealpha($t_image, true);
        
                    $gdImg = ($type == 'image/png') ? imagecreatefrompng($upload) : imagecreatefromjpeg($upload);
                    imagecopyresampled($t_image, $gdImg, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
                    if ($gdImg) {
                        $uploaded_img = imagepng($t_image, $dir_path);
                        imagedestroy($gdImg);
                        imagedestroy($t_image);
                        $response['success'] = $uploaded_img;
                        $response['filename'] = $file_path;
                    } else {
                        $response['msg'] = "Error desconocido al subir la imagen.";
                    }
                }
            }
            return $response;            
        }

    }
?>
