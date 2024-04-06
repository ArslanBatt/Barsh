<?php 
include "connect.php"; 
session_start(); 
$email = trim($_POST['email']); 
$password = trim( $_POST['password']); 
$result = "SELECT * FROM Users WHERE email = $email and password_hash = $password "; 
 
 
 
// $query = mysqli_query($con, $result ); 
// $user = mysqli_fetch_assoc($query); 
// if(is_null ($user) ){//is_null — Проверяет, равно ли значение переменной null 
//  echo "Такой пользователь не найден."; 
//  exit(); 
// } 
// else if(count($user) == 1){ 
//  echo "Логин или пароль введены неверно"; 
//  exit(); 
// } 
 
// $_SESSION["user"]= $user['user_id'];//наименование, значение, срок действия, путь к дирректории 
 
header('Location: personal-cab.php'); 
 
// После успешной авторизации 
$_SESSION['user_email'] = $_POST['email']; 
$_SESSION['user_password'] = $_POST['password']; 
?>