<?php

use project\project_processing;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$obj = new project_processing();
if (isset($_GET['dl'])) {
    $del_user = $_GET['dl'];
    $obj->del_record($del_user);
}

$fetched_data = $obj->fetch_records();
$page_data = $fetched_data[1];
echo $twig->render('all_projects.html.twig', [
    'session' => $_SESSION['username'],
    'data' => $fetched_data,
    'page_data' => $page_data
]);
?>