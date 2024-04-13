<?php
// Подключаемся к базе данных
include "../connect.php";

// Получаем данные товара из запроса POST
$id = $_POST['Id_product'];
$name = $_POST['Name'];
$description = $_POST['Description'];
$category_id = $_POST['Category_id'];
$price = $_POST['Price'];
$image = $_FILES['image']['name'];

// Обновляем данные товара в базе данных
$sql = "UPDATE product SET Name = '$name', Description = '$description', Category_id = '$category_id', Price = '$price', Image = '$image' WHERE Id_product = '$id'";
if (mysqli_query($con, $sql)) {
    // Товар успешно обновлен
    echo "Товар успешно обновлен.";
} else {
    // Ошибка при обновлении товара
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($con);
}
header('Location: index.php');
?>
