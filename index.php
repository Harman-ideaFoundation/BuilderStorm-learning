<?php
session_start();
session_destroy();
require_once 'vendor/autoload.php';
//require_once 'app/classes/service/users.php';
use user_authentication\users;

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);

$user = new users();

if (isset($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->get_values($email,$password);
    exit();
}
echo $twig->render('index.html.twig');
