<?php
require_once ('../../config/config.php');
class Login extends DBConnection {
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

        $qry = $this -> conn -> prepare("SELECT * FROM partners WHERE partner_code = ? AND password = ?");
        $qry -> bind_param("ss", $username, $password);
        $qry -> execute();
        $result = $qry -> get_result();

        if ($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                foreach($row as $k => $v){
                    if(!is_numeric($k) && $k != 'password'){
                        $this->settings -> set_userdata($k,$v);
                    }
                }
                
            }
            return json_encode(array('status' => 'success'));
        }
        else{
            return json_encode(array('status' => 'incorrect'));
        }
    }
}
$action=!isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action){
    case 'login':
        echo $auth ->login();
        break;
    default :
        echo "Bienvenida Andrea";
        break;
}
?>