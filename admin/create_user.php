<?php

use get_Type\user_type;
use add_user\user;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);
$add = new user();
if (isset($_POST['submit_user'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $image = $_FILES['file'];
    $img_name = $image['name'];
    $img_tmp_name = $image['tmp_name'];
    $password = md5($_POST['password']);
    $response = $add->add_user($email, $first_name, $last_name, $user_type, $address, $dob, $img_name, $img_tmp_name, $password);
    exit();
}
$type = new user_type();
$output = $type->fetch_types();


echo $twig->render('create_user.html.twig', [
    'session' => $_SESSION['username'],
    'types' =>$output
]);
