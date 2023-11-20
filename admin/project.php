<?php
include '../templates/header.php';
include '../templates/sidebar.php';
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);


echo $twig->render('project.html.twig', [
    'session' => $_SESSION['username']
]);

include '../templates/footer.php';
