<?php 
    if(!class_exists('DBConnection')){
        require_once('../../config/config.php');
        require_once('../database/dbconnection.php');
    }

    class systemModel extends DBConnection{

        /** Se encarga de mostrar la información almacenada en la tabla system */
        function load_system(){
            $sql = "SELECT * FROM system";
            $qry = "";
        }
    }
?>