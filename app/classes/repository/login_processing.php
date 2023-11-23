<?php
namespace login_process;
use connection\DB;

//require_once 'config/DB.php';
//require_once 'app/classes/service/users.php';

class login_processing{

    
    private $pdo;
    private $login;

    public function __construct()
    {
        $dbConnection = new DB();
        $this->pdo = $dbConnection->connection();
    }

    public function check_credentials($email, $hashed_password){
        $sql = $this->pdo->prepare("select * from users where email = ? and password = ?");
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $hashed_password);
        $sql->execute();
        $result = $sql->fetch();
        return($result);
    }

    public function fetch_records(){
        $sql_data = $this->pdo->prepare("select * from users ");

        $sql_data->execute();
        $result_data = $sql_data->fetchAll(\PDO::FETCH_ASSOC);
        return ($result_data);
        
        
    }

    // public function check_isblock($email){
    //     $sql_block = $this->pdo->prepare("select is_block from users where email = ?");
    //     $sql_block->bindParam(1, $email);
    //     $sql_block->execute();
    //     $result_block = $sql_block->fetch();

    //     $this->login->check_block($result_block);
    // }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $hashedPassword = md5($password);
//     $block = 0;
    // $sql = $pdo->prepare("select * from users where email = ? and password = ?");
    // $sql->bindParam(1, $email);
    // $sql->bindParam(2, $hashedPassword);
    // $sql->execute();
//     $result = $sql->fetch();

    // if (empty($result)) {
    //     echo json_encode($success_data = array(
    //         'response' => "invalid" 
    //     ));
    // } else {
    //     $sql_block = $pdo->prepare("select is_block from users where email = ?");
    //     $sql_block->bindParam(1, $email);
    //     $sql_block->execute();
    //     $result_block = $sql_block->fetch();
    //     if($result_block['is_block']==0){
    //         session_set_cookie_params(3600);
    //         session_start();
    //         $_SESSION['username'] = $result['first_name'];
    //         echo json_encode($success_data = array(
    //             'response' => "valid"
    //         ));
    //         exit;
    //     }
    //     else{
    //         echo json_encode($success_data = array(
    //             'response' => "blocked"
    //         )); 
    //     }
    // }
// }
