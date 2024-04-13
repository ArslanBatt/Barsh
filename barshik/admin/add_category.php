<?php
include "../connect.php";

$name = $_POST['Name'];

// Проверяем, существует ли уже категория с таким названием
$category_check = "SELECT * FROM Category WHERE Name = '$name'";
$result = mysqli_query($con, $category_check);

if (mysqli_num_rows($result) > 0) {
    echo "Категория с названием '$name' уже существует.";
} else {
    // Вставляем новую категорию в таблицу
    $sql = "INSERT INTO Category (Name) VALUES ('$name')";
    if (mysqli_query($con, $sql)) {
        echo "Категория успешно добавлена.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($con);
    }
}
header('Location: index.php');
?>