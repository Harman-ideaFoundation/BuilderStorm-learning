<?php

namespace project;

use connection\DB;

//require_once 'config/DB.php';
//require_once 'app/classes/service/users.php';

class project_processing
{


    private $pdo;
    private $login;

    public function __construct()
    {
        $dbConnection = new DB();
        $this->pdo = $dbConnection->connection();
    }

   
    public function fetch_records()
    {
        $row_per_page = 7;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * 7;
        $sql_data1 = $this->pdo->prepare("select * from projects");
        $sql_data1->execute();

        $sql_data = $this->pdo->prepare("select * from projects limit $start_from,$row_per_page");

        $sql_data->execute();
        $result_data = $sql_data->fetchAll(\PDO::FETCH_ASSOC);
        $rowCount = $sql_data1->rowCount();
        $total_pages = ceil($rowCount / $row_per_page);

        return [$result_data, $total_pages];
    }

    public function add_project($project_name, $address, $start_date, $end_date, $target_file)
    {
        $sql = $this->pdo->prepare("INSERT INTO `projects`(`name`, `address`, `image`, `start_date`, `end_date`) VALUES(?,?,?,?,?)");

        $sql->bindParam(1, $project_name);
        $sql->bindParam(2, $address);
        $sql->bindParam(3, $target_file);
        $sql->bindParam(4, $start_date);
        $sql->bindParam(5, $end_date);

        $sql->execute();
        return (true);
    }

    public function del_record($del)
    {
        $sql_delete = $this->pdo->prepare("delete from projects where id = ?");
        $sql_delete->bindParam(1, $del);

        if ($sql_delete->execute()) {
            echo "<script>window.alert('Project Deleted');window.location='all_projects.php'</script>";
        }
    }

    public function fetch_edit_id($ed)
    {
        $sql_edit = $this->pdo->prepare("select * from projects where id=?");
        $sql_edit->bindParam(1, $ed);
        $sql_edit->execute();
        $edit_result = $sql_edit->fetch(\PDO::FETCH_ASSOC);
        return ($edit_result);
    }



    public function edit_wtht_image($project_name, $address, $start_date, $end_date, $edit_id)
    {
        $sql_wtht_img = $this->pdo->prepare("update projects set name=?,address=?,start_date=?,end_date=? where id=?");
        $sql_wtht_img->bindParam(1, $project_name);
        $sql_wtht_img->bindParam(2, $address);
        $sql_wtht_img->bindParam(3, $start_date);
        $sql_wtht_img->bindParam(4, $end_date);
        $sql_wtht_img->bindParam(5, $edit_id);
        if ($sql_wtht_img->execute()) {
            return (true);
        }
    }

    public function update_project($project_name, $address, $start_date, $end_date, $target_file, $edit_id){
        $sql_update = $this->pdo->prepare("update projects set name=?,address=?, image=?,start_date=?,end_date=? where id=?");
        $sql_update->bindParam(1, $project_name);
        $sql_update->bindParam(2, $address);
        $sql_update->bindParam(3, $target_file);
        $sql_update->bindParam(4, $start_date);
        $sql_update->bindParam(5, $end_date);
        $sql_update->bindParam(6, $edit_id);
        if($sql_update->execute()){
            return (true);
        }
       
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
