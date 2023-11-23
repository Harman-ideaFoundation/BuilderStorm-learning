<?php

namespace add_user;

use get_Type\user_type;


class user{

    public function add_user($email, $first_name, $last_name, $user_type, $address, $dob, $image,$password){
        $target_dir = "../../../admin/uploads/";
        $target_file = $target_dir . basename($_FILES[$image]["name"]);
       
            if (!(move_uploaded_file($_FILES[$image]["tmp_name"], $target_file))) {
                echo json_encode($success_data = array(
                    'response' => "Sorry, there was an error uploading your file"
                ));
            }
            else{
                $sql = new user_type();
                if($sql->add_user($email, $first_name, $last_name, $user_type, $address, $dob, $target_file,$password)){
                    echo json_encode($success_data = array(
                        'response' => "user created"
                    )); 
            }
           
        }
    }}


?>