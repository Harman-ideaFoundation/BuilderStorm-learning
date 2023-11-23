<?php

namespace add_user;

use get_Type\user_type;


class user{
    public function add_user($email, $first_name, $last_name, $user_type, $address, $dob, $img_name, $img_tmp_name,$password){
        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;
       
            if (!(move_uploaded_file($img_tmp_name, $target_file))) {
                echo json_encode($success_data = array(
                    'response' => "not_uploaded"
                ));
            }
            else{
                $sql = new user_type();
                if($result=$sql->add_user($email, $first_name, $last_name, $user_type, $address, $dob, $target_file,$password)){
                    $last_id=$sql->fetch_id();
                        $sql->add_permission($last_id,$user_type);
                    if($result){
                        echo json_encode($success_data = array(
                            'response' => "user_created"
                        ));
                    } 
            }
           
        }

    }}


?>