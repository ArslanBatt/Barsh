<?php
include "connect.php";
$email = trim($_POST['email']);
$password = trim( $_POST['password']);
$result = "SELECT * FROM Users WHERE `email` = $email and `password_hash` = $password ";

header('Location: personal-cab.php');
?>