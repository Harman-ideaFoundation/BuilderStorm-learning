<?php
require_once '../vendor/autoload.php';

use add_user\user;
use get_Type\user_type;

$add_user = new user();
$type = new user_type();

if (isset($_POST['update_user'])) {
    
    $u_id = $_POST['id'];
    $u_email = $_POST['email'];
    $ufirst_name = $_POST['first_name'];
    $ulast_name = $_POST['last_name'];
    $user_type = $_POST['user_type'];
    $u_address = $_POST['address'];
    $dob = $_POST['dob'];
    if (empty($_FILES['image']['name'])) {
        $get_image = $type->edit_user_wtht_image($u_email, $ufirst_name, $ulast_name, $user_type, $u_address, $dob, $u_id);

        if ($get_image) {
            echo "<script>window.alert('User Updated');window.location='overview.php';</script>";
            
        }
    } else {
        $image = $_FILES['image'];
        $img_name = $image['name'];
        $img_tmp_name = $image['tmp_name'];
        $response = $add_user->edit_user($u_email, $ufirst_name, $ulast_name, $user_type, $u_address, $dob, $u_id, $img_name, $img_tmp_name);
    }
    
   
}


if (isset($_POST['assign_projects'])) {
    $user_id = $_POST['user_id'];
    foreach ($_POST['checkboxes'] as $selectedCheckbox) {
        $add_user->assign_project($user_id, $selectedCheckbox);
    }
    echo "<script>window.location='overview.php';</script>";
    
}
?>