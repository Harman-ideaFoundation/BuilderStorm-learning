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
        $row_per_page = 7;
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }
        else{
            $page=1;
        }
        $start_from = ($page-1)*7;
        $sql_data1= $this->pdo->prepare("select * from users");
        $sql_data1->execute();

        $sql_data = $this->pdo->prepare("select * from users limit $start_from,$row_per_page");

        $sql_data->execute();
        $result_data = $sql_data->fetchAll(\PDO::FETCH_ASSOC);
        $rowCount = $sql_data1->rowCount();
        $total_pages = ceil($rowCount/$row_per_page);

        return [$result_data,$total_pages]; 
    }

    public function del_record($del){
        $sql_delete = $this->pdo->prepare("delete from users where id = ?") ;
        $sql_delete->bindParam(1, $del);

        $sql_del_permission = $this->pdo->prepare("delete from permissions where user_id = ?");
        $sql_del_permission->bindParam(1, $del);
        if( $sql_del_permission->execute() && $sql_delete->execute() ){
            echo "<script>window.alert('Record Deleted');window.location='overview.php'</script>";
        }
    }

    public function block_record($bl)
    {
        $sql_block = $this->pdo->prepare("select is_block from users where id = ?");
        $sql_block->bindParam(1, $bl);
        $sql_block->execute();
        $result_block = $sql_block->fetch(\PDO::FETCH_ASSOC);
      
        if($result_block['is_block']==0){
            $sql_block = $this->pdo->prepare("update users set is_block=1 where id =?");
            $sql_block->bindParam(1, $bl);
            $sql_block->execute();
            echo "<script>window.alert('User Blocked');window.location='overview.php'</script>";
        }
        else{
            $sql_block = $this->pdo->prepare("update users set is_block=0 where id =?");
            $sql_block->bindParam(1, $bl);
            $sql_block->execute();
            echo "<script>window.alert('User UnBlocked');window.location='overview.php'</script>";
        }
    }

    public function fetch_projects()
    {
        $row_per_page = 7;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * 7;
        $sql_assign = $this->pdo->prepare("select * from projects");
        $sql_assign->execute();

        $sql_assign1 = $this->pdo->prepare("select * from projects limit $start_from,$row_per_page");

        $sql_assign1->execute();
        $result_data = $sql_assign1->fetchAll(\PDO::FETCH_ASSOC);
        $rowCount = $sql_assign->rowCount();
        $total_pages = ceil($rowCount / $row_per_page);

        return [$result_data, $total_pages];
    }

    // public function pagination($d){
    //      for($i=1;$i<=$d;$i++){
    //         return $i;
    //         // "<a href='../admin/overview.php?page=".$i."'>".$i."</a>";
    //     }
    // }

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
