<?php 
if(!class_exists('DBConnection')){
    require_once('config/config.php');
    require_once('DBConnection.php');
}

class Settings extends DBConnection{

    public function __construct()
    {
        parent::__construct();
    }

    function check_connection()
    {
        return($this->conn);
    }

    function userdata($field = ''){
        if (!empty($field)){
            if (isset($_SESSION['userdata'][$field]))
                return $_SESSION['userdata'][$field];
            else
                return null;
        } else {
            return false;
        }
    }

    function set_userdata($field = '', $value = ''){
        if (!empty($field) && !empty($value)){
            $_SESSION['userdata'][$field] = $value;
        }
    }

    function sess_des(){
        if(isset($_SESSION['userdata'])){
            unset($_SESSION['userdata']);
            return true;
        }
    }
}

$_settings = new Settings();
?>