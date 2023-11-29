<?php

use get_Type\user_type;

session_start();

if (!isset( $_GET['ed'])) {
    header("Location: ../index.php");
}
else{
    $edit_id = $_GET['ed'];
}
require_once '../vendor/autoload.php';
$edit_id = $_GET['ed'];

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);


$type = new user_type();
$output = $type->fetch_types();
$edit_data = $type->fetch_edit_id($edit_id);

echo $twig->render('edit_user.html.twig', [
    'data' => $edit_data,
    'types' => $output
]);
