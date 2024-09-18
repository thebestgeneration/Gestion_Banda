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

    public static function set_flashdata($flash='',$value=''){
		if(!empty($flash) && !empty($value)){
			$_SESSION['flashdata'][$flash]= $value;
		return true;
		}
	}

	public static function chk_flashdata($flash = ''){
		if(isset($_SESSION['flashdata'][$flash])){
			return true;
		}else{
			return false;
		}
	}

	public static function flashdata($flash = ''){
		if(!empty($flash)){
			$_tmp = $_SESSION['flashdata'][$flash];
			unset($_SESSION['flashdata']);
			return $_tmp;
		}else{
			return false;
		}
	}

}

$_settings = new Settings();
?>