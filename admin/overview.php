<?php
session_start();
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);


echo $twig->render('overview.html.twig', [
    'session' => $_SESSION['username']
]);
