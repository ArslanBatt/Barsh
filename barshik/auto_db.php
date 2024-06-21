<?php
session_start();
include "connect.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$result = mysqli_query($con, "SELECT * FROM Users WHERE `Email` = '$email' AND `Password_hash` = '$password'");
$user = mysqli_fetch_array($result);

$user_id = $user["User_id"];
if (isset($user_id)) {
    $_SESSION["User_id"] = $user["User_id"];
    $_SESSION['User_email'] = $email;
    $_SESSION["role"] = $user["role"];
    
    if ($user['role'] == 'user') {
        $_SESSION["message"] = "Вы успешно авторизировались как пользователь";
        header('Location: personal-cab.php');
    } else {
        $_SESSION["message"] = "Вы успешно авторизировались как администратор";
        header('Location:admin/newTovar.php');
    }
} else {
    echo "<script>alert('Данный пользователь не найден!');
    location.href = 'auto.php';</script>";
}
?>
