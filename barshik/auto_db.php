<?php
include "connect.php";
session_start();

$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Изменил колонку password на password_hash в запросе
$result = "SELECT * FROM Users WHERE email = '$email' AND password_hash = '$password'";

if ($result) {
    header('Location: personal-cab.php');

    // После успешной авторизации
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_password'] = $_POST['password'];
} else {
    echo 'Неверный логин или пароль';
}
?>