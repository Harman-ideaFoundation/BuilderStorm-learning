<?php
namespace user_authentication;
use login_process\login_processing;
//require_once "app/classes/repository/login_processing.php";
session_set_cookie_params(3600);
session_start();
class users
{
    public function get_values($email,$password){
        $email = $email;
        $plain_password = $password;
        $hashed_password = md5($plain_password);

        $loginHandler = new login_processing();
        $output = $loginHandler->check_credentials($email, $hashed_password);

        if (empty($output)) {
            echo json_encode($success_data = array(
                'response' => "invalid"
            ));
        } else if ($output['is_block'] == 0) {
            $_SESSION['username'] = $output['first_name'];
            echo json_encode($success_data = array(
                'response' => "valid"
            ));
        } else {
            echo json_encode($success_data = array(
                'response' => "blocked"
            ));
        }
    }
   
    
}
