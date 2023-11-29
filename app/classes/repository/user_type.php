<?php
namespace get_Type;
use connection\DB;
class user_type{
    private $pdo;

    public function __construct()
    {
        $dbConnection = new DB();
        $this->pdo = $dbConnection->connection();
    }

    public function fetch_types()
    {
        $sql = $this->pdo->prepare("select type from user_types");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return ($result);
    }

    public function add_user($email, $first_name, $last_name, $user_type, $address, $dob, $target_file,$password){
        $sql = $this->pdo->prepare("INSERT INTO `users`(`first_name`, `last_name`, `email`, `dob`, `image`, `address`, `type_id`, `password`) VALUES(:f_name,:l_name,:email,:dob,:target_file,:address,:user_type,:password)");

        $sql->bindParam(':f_name', $first_name);
        $sql->bindParam(':l_name', $last_name);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':target_file', $target_file);
        $sql->bindParam(':address', $address);
        $sql->bindParam(':user_type', $user_type);

        $sql->execute();
        return(true);
    }

    public function fetch_id(){
        $lastInsertedId = $this->pdo->lastInsertId();
        return($lastInsertedId);
    }

    public function add_permission($last_id,$user_type){
        if($user_type==4){
            exit();
        }
        else{
            $permission = array(
                1 => ['add', 'edit', 'delete'],
                2 => ['add', 'edit'],
                3 => ['view_drawing'],
            );
            $alot_permissions = array($permission[$user_type]);

            $permission_sql = $this->pdo->prepare("INSERT INTO `permissions`(`permission_name`, `user_id`) VALUES (:permission,:id)");
            foreach ($alot_permissions as $values) {
                foreach ($values as $value) {
                    $permission_sql->bindParam(':permission', $value);
                    $permission_sql->bindParam(':id', $last_id);

                    // Execute the prepared statement
                    $permission_sql->execute();
                }
            } 
        }    
    }

    public function fetch_edit_id($ed){
        $sql_edit = $this->pdo->prepare("select * from users where id=?");
        $sql_edit->bindParam(1, $ed);
        $sql_edit->execute();
        $edit_result = $sql_edit->fetch(\PDO::FETCH_ASSOC);
        return ($edit_result);
    }

    public function edit_user_wtht_image($email, $first_name, $last_name, $user_type, $address, $dob, $id){

        $sql_wtht_img = $this->pdo->prepare("update users set first_name=:f_name, last_name =:l_name, email=:email, dob=:dob, address=:address, type_id=:user_type where id=:id ");

        $sql_wtht_img->bindParam(':f_name', $first_name);
        $sql_wtht_img->bindParam(':l_name', $last_name);
        $sql_wtht_img->bindParam(':email', $email);
        $sql_wtht_img->bindParam(':dob', $dob);
        $sql_wtht_img->bindParam(':address', $address);
        $sql_wtht_img->bindParam(':user_type', $user_type);
        $sql_wtht_img->bindParam(':id', $id);

        if ($sql_wtht_img->execute()) {
            return (true);
        }
    }

    public function edit_user($email, $first_name, $last_name, $user_type, $address, $dob, $id, $target_file)
    {

        $sql_update = $this->pdo->prepare("update users set first_name=:f_name, last_name =:l_name, email=:email, dob=:dob, address=:address, type_id=:user_type,image= :image where id=:id ");

        $sql_update->bindParam(':f_name', $first_name);
        $sql_update->bindParam(':l_name', $last_name);
        $sql_update->bindParam(':email', $email);
        $sql_update->bindParam(':dob', $dob);
        $sql_update->bindParam(':address', $address);
        $sql_update->bindParam(':user_type', $user_type);
        $sql_update->bindParam(':image', $target_file);
        $sql_update->bindParam(':id', $id);

        if($sql_update->execute()){
            return (true);
        }
    }

    public function fetch_image($email){
        $sql_select= $this->pdo->prepare("select image from users where email=?");
        $sql_select->bindParam(1, $email);
        $sql_select->execute();
        $select_result = $sql_select->fetch(\PDO::FETCH_ASSOC);
        return ($select_result);
    }

    public function add_project($project_name, $address, $start_date, $end_date, $target_file)
    {
        $sql_project = $this->pdo->prepare("INSERT INTO `projects`(`name`, `image`, `address`, `start_date`, `end_date`) VALUES (?,?,?,?,?)");

        $sql_project->bindParam(1, $project_name);
        $sql_project->bindParam(2, $target_file);
        $sql_project->bindParam(3, $address);
        $sql_project->bindParam(4, $start_date);
        $sql_project->bindParam(5, $end_date);
        if($sql_project->execute()){
            return (true);
        }
    }

    public function assign_project($user_id, $selected_checkbox){
        $sql_assi_project = $this->pdo->prepare("INSERT INTO `assigned_projects`(`project_id`, `user_id`) VALUES (?,?)");

        $sql_assi_project->bindParam(1, $selected_checkbox);
        $sql_assi_project->bindParam(2, $user_id);
      
        if ($sql_assi_project->execute()) {
            return ($selected_checkbox);
        }
    }
}

?>