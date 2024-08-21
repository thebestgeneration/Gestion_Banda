<?php
require_once '../../config/config.php';
class login extends dbconecction{
    private $settings;
    public function __construct(){
        global $_settings;
        $this->settings=$_settings;
        parent::__construct();
        ini_set('display_error',1);
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function login(){
        extract($_POST);

        $qry = $this -> conn -> query("SELECT * FROM partners WHERE partner_code = '$username' AND password = '$password'");

        if ($qry -> num_rose > 0){
            foreach($qry -> fetch_array() as $k => $v){
                if(!is_numeric($k) && $k != 'password'){
                    $this->settings -> set_userdata($k,$v);
                }
            }
        return json_encode(array('status' => 'success'));
        }
        else{
            return json_encode(array('status' => 'incorrect','last_qry'=>"SELECT * FROM partners WHERE partner_code = '$username' AND password = '$password'"));
        }
    }
}
$action=!isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new login();
switch ($action){
    case 'login':
        echo $auth ->login();
        break;
    default :
        echo "Bienvenida Andrea";
        break;
}
?>