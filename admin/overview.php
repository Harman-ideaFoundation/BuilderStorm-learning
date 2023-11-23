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
$fetched_data=$obj->fetch_records();
echo $twig->render('overview.html.twig', [
    'session' => $_SESSION['username'],
    'data' => $fetched_data
]);

