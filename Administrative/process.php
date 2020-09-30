<?php
session_start();
include ('./class/config.php');
require_once './User/user.php';

if (isset($_POST['userName']) && empty($_POST['userName']) && isset($_POST['password']) && empty($_POST['password'])) {
    header('location: login.php');
    exit();
}

$userName = addslashes($_POST['userName']);
$password = addslashes($_POST['password']);

$user = new User();

if($user->checkUser($userName, $password)){
    if(isset($_SESSION['userId'])){
        header('location: index.php');
    }else{
        header('location: login.php');
    }
}else
    header('location: login.php');

?>
