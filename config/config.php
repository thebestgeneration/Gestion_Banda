<?php
ob_start();
ini_set('date.timezone','America/Lima');
date_default_timezone_set('America/Lima');
session_start();

require_once('initialize.php');
require_once(base_app . '../app/database/DBConnection.php');
require_once(base_app . '../app/database/Settings.php');
$db = new DBConnection;
$conn = $db -> conn;

/**
 * función para redirigir al usuario a otra página
 * utilizando javascript
 */
function redirect($url=''){
    if(!empty($url))
    header('Location: ' .base_url . $url);
    exit();
}

function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android'  
    );

    foreach ($aMobileUA as $sMobileKey => $sMobileOS){
        if (preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }
    }

    return false;
}
ob_end_flush();

?>