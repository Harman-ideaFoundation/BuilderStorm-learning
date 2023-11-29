<?php

use project_update\project_updation;
use project\project_processing;


session_start();

if (!isset($_GET['ed'])) {
    header("Location: ../index.php");
} else {
    $edit_id = $_GET['ed'];
}
require_once '../vendor/autoload.php';
$edit_id = $_GET['ed'];

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);
$add = new project_updation();
$obj = new project_processing();

$edit_data = $obj->fetch_edit_id($edit_id);

echo $twig->render('edit_project.html.twig', [
    'data' => $edit_data
]);
