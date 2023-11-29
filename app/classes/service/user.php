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

    }


    public function edit_user($email, $first_name, $last_name, $user_type, $address, $dob, $id, $img_name, $img_tmp_name)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;
        
        if (!(move_uploaded_file($img_tmp_name, $target_file))) {
                echo "<script>window.alert('Cannot Upload Image');window.location='edit_user.php';</script>";
            
        } else {
            $sql = new user_type();
            if ($result = $sql->edit_user($email, $first_name, $last_name, $user_type, $address, $dob, $id, $target_file)) {
                echo "<script>window.alert('User Updated');window.location='overview.php';</script>";
            }
        }
        }
    public function add_project($project_name, $address, $img_name, $img_tmp_name, $start_date, $end_date)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;

        if (!(move_uploaded_file($img_tmp_name, $target_file))) {
            echo json_encode($success_data = array(
                'response' => "not_uploaded"
            ));
        } else {
            $sql = new user_type();
            if ($result = $sql->add_project($project_name, $address, $start_date, $end_date, $target_file)) {
                echo json_encode($success_data = array(
                    'response' => "project_created"
                ));
            }
        }
    }

    public function assign_project($user_id,$selected_checkbox){
        $sql = new user_type();
         $assignment_done=$sql->assign_project($user_id, $selected_checkbox);
        echo "<script>window.alert('Project no.'+$assignment_done+' alloted');</script>";
    }

    }

   


?>