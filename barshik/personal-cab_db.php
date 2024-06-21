<?php
session_start();
include "connect.php"; 

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$queryUpdate = mysqli_query($con, "UPDATE Users SET Email='$email',name='$name' WHERE User_id = $id");

$queryUser=mysqli_query($con,"SELECT * FROM `Users`");
$queryUserInfo= mysqli_fetch_all($queryUser);
if(isset($_SESSION['user_id'])) { 
    session_start();
    $user = $_SESSION['user_id']; 
    $queryUser = mysqli_query($con, "SELECT * FROM Users WHERE id_user = $user");  
    $queryUserInfo = mysqli_fetch_all($queryUser);  
}
if ($queryUpdate) {
    echo "<script>alert(\"Данные обновлены!\");
    location.href = 'personal-cab.php';
    </script>";
} else {
    echo "Ошибка при обновлении данных: " . mysqli_error($con);
}
?>