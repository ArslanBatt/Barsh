<?php 
include "connect.php";

$email = htmlspecialchars(trim($_POST['email']),ENT_QUOTES); // Удаляет все лишнее и записываем значение в переменную //$login
$password = htmlspecialchars(trim($_POST['password']),ENT_QUOTES); 
if(mb_strlen($password) < 5 || mb_strlen($password) > 100){//mb_strlen — Получает длину строки
	echo "Недопустимая длина пароля";
	exit();
}
$result1 = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
$result2 = mysqli_query($con,"SELECT * FROM `users` WHERE `password_hash` = '$password'");
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
$user2 = mysqli_fetch_assoc($result2); // Конвертируем в массив
if(!empty($user1)){//empty — Проверяет, пуста ли переменная
	echo "Данная почта уже используется!";
	exit();
}
if(!empty($user2)){//empty — Проверяет, пуста ли переменная
	echo "Данный  уже используется!";
	exit();
}
$insert = mysqli_query($con,"INSERT INTO `users` (  `email`,`password_hash`, `Bonus_points`)VALUES( '$email','$password', '1' )");
// $_SESSION["user_id"] = mysqli_insert_id($con);
header('Location: personal-cab.php');
