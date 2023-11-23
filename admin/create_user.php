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

$type = new user_type();
$output = $type->fetch_types();
echo $twig->render('create_user.html.twig', [
    'session' => $_SESSION['username'],
    'types' =>$output
]);
$add = new user();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $image = $_FILES['file'];
    print_r($_POST);
    die();
    $password = md5($_POST['password']);
    $add->add_user($email, $first_name, $last_name, $user_type, $address, $dob, $image,$password);
    exit();
}
