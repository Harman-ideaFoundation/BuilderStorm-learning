<?php

namespace project_update;

use get_Type\user_type;
use project\project_processing;

class project_updation
{
   
    public function add_project($project_name, $address, $img_name, $img_tmp_name, $start_date, $end_date)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;

        if (!(move_uploaded_file($img_tmp_name, $target_file))) {
            echo json_encode($success_data = array(
                'response' => "not_uploaded"
            ));
        } else {
            $sql = new project_processing();
            if ($result = $sql->add_project($project_name, $address, $start_date, $end_date, $target_file)) {
                echo json_encode($success_data = array(
                    'response' => "project_created"
                ));
            }
        }
    }

    public function edit_project($project_name, $address, $start_date, $end_date, $img_name, $img_tmp_name, $edit_id)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;

        if (!(move_uploaded_file($img_tmp_name, $target_file))) {
            echo json_encode($success_data = array(
                'response' => "not_uploaded"
            ));
        } else {
            $sql = new project_processing();
            if ($result = $sql->update_project($project_name, $address, $start_date, $end_date, $target_file, $edit_id)) {
                
                if ($result) {
                    echo json_encode($success_data = array(
                        'response' => "project_updated"
                    ));
                }
            }
        }
    }

}
