<?php
require_once '../vendor/autoload.php';

use project_update\project_updation;
use project\project_processing;




$add = new project_updation();
$obj = new project_processing();


       
        if (isset($_POST['update_project'])) {
            $project_name = $_POST['project_name'];
            $id = $_POST['id'];
            $address = $_POST['address'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            
            if (empty($_FILES['image']['name'])) {
                $get_image = $obj->edit_wtht_image($project_name, $address, $start_date, $end_date, $id);

                if ($get_image) {
                    echo json_encode($success_data = array(
                        'response' => "project_updated"
                    ));
                    exit();
                }
            } else {
                $image = $_FILES['image'];  
            }
            $img_name = $image['name'];
            $img_tmp_name = $image['tmp_name'];
            $response = $add->edit_project($project_name, $address, $start_date, $end_date, $img_name, $img_tmp_name, $id);
            exit();
        }

  
?>