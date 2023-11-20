<?php
//require_once "app/classes/repository/login_processing.php";
use login_process\login_processing;
use user_authentication\users;

class login_check
{
    private $loginHandler;
    private $email;
    private $plain_password;
    private $hashed_password;

    public function __construct($email,$password)
    {
       
            $this->email = $email;
            $this->plain_password = $password;
            $this->hashed_password = md5($this->plain_password);

            $this->loginHandler = new login_processing();
            $this->loginHandler->get_values($this->email, $this->hashed_password);
        
    }
    public function check($result)
    {
        if (empty($result)) {
            echo json_encode($success_data = array(
                'response' => "invalid"
            ));
        } else {
            $loginHandler2 = new login_processing();
            $loginHandler2->check_block($this->email);
        }
    }
    public function check_block($result_block)
    {
        if ($result_block['is_block'] == 0) {
            session_set_cookie_params(3600);
            session_start();
            $_SESSION['username'] = $result_block['first_name'];
            echo json_encode($success_data = array(
                'response' => "valid"
            ));
            exit;
        } else {
            echo json_encode($success_data = array(
                'response' => "blocked"
            ));
        }
    }
}

?>