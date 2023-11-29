<?php

use add_user\user;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);
$add = new user();

if (isset($_POST['submit_project'])) {
    $project_name = $_POST['project_name'];
    $address = $_POST['address'];
    $image = $_FILES['image'];
    $img_name = $image['name'];
    $img_tmp_name = $image['tmp_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    // echo json_encode($success_data = array(
    //     'response' => "project_created"
    // ));
    $response = $add->add_project($project_name,$address, $img_name, $img_tmp_name,$start_date,$end_date);
    exit();
}

echo $twig->render('create_project.html.twig', [
    'session' => $_SESSION['username']
]);
?>