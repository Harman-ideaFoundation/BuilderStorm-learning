<?php

use login_process\login_processing;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$obj = new login_processing();
if (isset($_GET['assign'])) {
    $user_id = $_GET['assign'];
}

$fetched_ids = $obj->fetch_project_ids($user_id);
$get_ids=array();
foreach ($fetched_ids as $key => $value) {
    foreach($value as $innerkey => $innervalue){
        $get_ids[$key]=$value[$innerkey];
    }
}


$fetched_data = $obj->fetch_projects();

$page_data = $fetched_data[1];
echo $twig->render('assign_project.html.twig', [
    'session' => $_SESSION['username'],
    'data' => $fetched_data,
    'id' => $user_id,
    'page_data' => $page_data,
    'project_ids' => $get_ids
]);
