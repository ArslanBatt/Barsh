<?php 
session_start();

include "connect.php";

$email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES); // Удаляет все лишнее и записываем значение в переменную //$login
$password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES); 
if (mb_strlen($password) < 5 || mb_strlen($password) > 100) { // mb_strlen — Получает длину строки
    echo "Недопустимая длина пароля";
    exit();
}

$result1 = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'");
$result2 = mysqli_query($con, "SELECT * FROM `users` WHERE `password_hash` = '$password'");
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
$user2 = mysqli_fetch_assoc($result2); // Конвертируем в массив

if (!empty($user1)) { // empty — Проверяет, пуста ли переменная
    echo "<script>alert('Данная почта уже используется'); window.location.href = 'reg.php';</script>";
    exit();
}

if (!empty($user2)) { // empty — Проверяет, пуста ли переменная
    echo "<script>alert('Данный пароль уже используется'); window.location.href = 'reg.php';</script>";
    exit();
}

$insert = mysqli_query($con, "INSERT INTO `users` (`email`, `password_hash`, `Bonus_points`, `role`) VALUES ('$email', '$password', '1', 'user')");
if ($insert) {
    echo "<script>alert('Регистрация успешно завершена'); window.location.href = 'auto.php';</script>";
} else {
    echo "<script>alert('Ошибка при регистрации');</script>";
}
?>
