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
        
        $permission =array(
            1 =>['add','edit','delete'],
            2 =>['add','edit'],
            3 =>['view_drawing'],
            4 =>['cant_view']
        );
        $alot_permissions = array($permission[$user_type]);
        
        $permission_sql = $this->pdo->prepare("INSERT INTO `permissions`(`permission_name`, `user_id`) VALUES (:permission,:id)");
        foreach ($alot_permissions as $values) {
            foreach($values as $value){
                $permission_sql->bindParam(':permission', $value);
                $permission_sql->bindParam(':id', $last_id);

                // Execute the prepared statement
                $permission_sql->execute();
            }
        }
    }
}

?>